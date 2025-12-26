<?php
$numbers = array(10, 20, 30);

echo count($numbers) . "<br>";   // Count elements
array_push($numbers, 40);

foreach ($numbers as $num) {
    echo $num . "<br>"; // print on screen with line break
}
?>