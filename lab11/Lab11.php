<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here
if (isset($_GET['submit'])) {
  $continent = $_GET['continent'];
  $country = $_GET['country'];
  $title = $_GET['title'];
}

$db = new mysqli('localhost', 'root', 'acoolgirl.', 'travel');
if (mysqli_connect_errno()) {
  echo '<p>Error: Could not connect to database.</br>Please try again later.</p>';
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Lab11</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="css/bootstrap.min.css" />



  <link rel="stylesheet" href="css/captions.css" />
  <link rel="stylesheet" href="css/bootstrap-theme.css" />

</head>

<body>
  <?php include 'header.inc.php'; ?>



  <!-- Page Content -->
  <main class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Filters</div>
      <div class="panel-body">
        <form action="Lab11.php" method="get" class="form-horizontal">
          <div class="form-inline">
            <select name="continent" class="form-control">
              <option value="0">Select Continent</option>
              <?php
              //Fill this place

              //****** Hint ******
              //display the list of continents
              $query = "SELECT * From continents ";
              $result = $db->query($query);
              while ($row = $result->fetch_assoc()) {
                echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
              }

              ?>
            </select>

            <select name="country" class="form-control">
              <option value="0">Select Country</option>
              <?php
              //Fill this place

              //****** Hint ******
              /* display list of countries */
              $query = "SELECT * From countries ";
              $result = $db->query($query);
              while ($row = $result->fetch_assoc()) {
                echo '<option value=' . $row['ISO'] . '>' . $row['CountryName'] . '</option>';
              }
              ?>
            </select>
            <input type="text" placeholder="Search title" class="form-control" name="title">
            <button type="submit" name="submit" class="btn btn-primary">Filter</button>
          </div>
        </form>

      </div>
    </div>


    <ul class="caption-style-2">
      <?php
      function findByCountry($country, $db)
      {
        $query = "SELECT * From imagedetails WHERE CountryCodeISO = '$country' ";
        $result = $db->query($query);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div>";
          echo "</div>";
          echo "</a>";
          echo "</li>";
        }
      }
      function findByContinent($continent, $db)
      {
        $query = "SELECT * From imagedetails WHERE ContinentCode = '$continent' ";
        $result = $db->query($query);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div>";
          echo "</div>";
          echo "</a>";
          echo "</li>";
        }
      }
      function findByContinentAndCountry($continent, $country, $db)
      {
        $query = "SELECT * From imagedetails WHERE ContinentCode = '$continent' AND CountryCodeISO = '$country'";
        $result = $db->query($query);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div>";
          echo "</div>";
          echo "</a>";
          echo "</li>";
        }
      }
      function findByTitle($title, $db)
      {
        $query = "SELECT * From imagedetails WHERE Title LIKE '%$title%' ";
        $result = $db->query($query);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div>";
          echo "</div>";
          echo "</a>";
          echo "</li>";
        }
      }
      function findByThree($title, $continent, $country, $db)
      {
        $query = "SELECT * From imagedetails WHERE Title LIKE '%$title%' AND ContinentCode = '$continent' AND CountryCodeISO = '$country'";
        $result = $db->query($query);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div>";
          echo "</div>";
          echo "</a>";
          echo "</li>";
        }
      }
      function findByContinentAndTitle($title, $continent, $db)
      {
        $query = "SELECT * From imagedetails WHERE Title LIKE '%$title%' AND ContinentCode = '$continent' ";
        $result = $db->query($query);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div>";
          echo "</div>";
          echo "</a>";
          echo "</li>";
        }
      }
      function findByCountryAndTitle($title, $country, $db)
      {
        $query = "SELECT * From imagedetails WHERE Title LIKE '%$title%' AND CountryCodeISO = '$country' ";
        $result = $db->query($query);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div>";
          echo "</div>";
          echo "</a>";
          echo "</li>";
        }
      }
      function find($db)
      {
        $query = "SELECT * From imagedetails ";
        $result = $db->query($query);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div>";
          echo "</div>";
          echo "</a>";
          echo "</li>";
        }
      }
      //Fill this place

      //****** Hint ******
      /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data
            <li>
              <a href="detail.php?id=????" class="img-responsive">
                <img src="images/square-medium/????" alt="????">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <p>????</p>
                  </div>
                </div>
              </a>
            </li>        
            */

      if (isset($_GET['submit'])) {
        if (!empty($title) && !empty($continent) && !empty($country)) {
          findByThree($title, $continent, $country, $db);
        } else if (!empty($continent) && !empty($country)) {
          findByContinentAndCountry($continent, $country, $db);
        } else if (!empty($continent) && !empty($title)) {
          findByContinentAndTitle($title, $continent, $db);
        } else if (!empty($title) && !empty($country)) {
          findByCountryAndTitle($title, $country, $db);
        } else if (!empty($title)) {
          findByTitle($title, $db);
        } else if (!empty($country)) {
          findByCountry($country, $db);
        } else if (!empty($continent)) {
          findByContinent($continent, $db);
        } else {
          find($db);
        }
      }
      ?>
    </ul>


  </main>

  <footer>
    <div class="container-fluid">
      <div class="row final">
        <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
        <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
      </div>
    </div>


  </footer>


  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>