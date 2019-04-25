window.onload = function () {
    function showBig() {
        var smallPic = document.getElementById("thumbnails").getElementsByTagName("img");
        for(var i=0;i<smallPic.length;i++){
            smallPic[i].onclick = function () {
                document.getElementById("bigPic").src = this.src.replace("small","medium");
                document.getElementById("bigPic").title = this.title;
                document.getElementById("fig").innerHTML = this.title;
            }
        }
    }

    var bigPic = document.getElementById("bigPic");
    var fig = document.getElementById("fig");
    var timer = null;
    var alpha = 0;

    function setAlpha(iTarget){
        clearInterval(timer);
        timer = setInterval(function(){
            var iSpeed;
            if(alpha < iTarget) {
                iSpeed=10;
            }
            else {
                iSpeed=-10;
            }
            if(alpha==iTarget) {
                clearInterval(timer);
            }
            else {
                alpha += iSpeed;
                fig.style.opacity=alpha/100;
                fig.style.filter='alpha(opacity:'+alpha+')'
            }
        },125);
    };
    function showFig() {
        bigPic.onmouseover = function () {
            setAlpha(80)
        };
        bigPic.onmouseout = function () {
            setAlpha(0)
        };
    }

    showBig();
    showFig();
};