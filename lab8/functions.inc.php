<?php

function outputOrderRow($file, $title, $quantity, $price)
{
    $formatPrice = number_format($price, 2);
    $amount = $quantity * $price;
    $formatAmount = number_format($amount,2);
    echo "<tr>";
    echo "<td><img src='images/books/tinysquare/$file' /></td>";
    echo "<td>$title</td>";
    echo "<td>$quantity</td>";
    echo "<td>$$formatPrice</td>";
    echo "<td>$$formatAmount</td>";
    echo "</tr>";
}
