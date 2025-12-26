<?php
function formatName($name)
{
    return strtoupper($name);
}

function calculateArea($length, $width)
{
    return $length * $width;
}

echo formatName("shafique");
echo "<br>";
echo "Area: " . calculateArea(10, 5);
?>