<?php
$name = "PHP Learner";

function showName()
{
    global $name;
    echo $name;
}

showName();
?>