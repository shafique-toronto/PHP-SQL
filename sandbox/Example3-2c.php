<?php
$name = cleanInput($_POST['name']);
$age = $_POST['age'];
echo "Name: $name <br>";
echo "Age: $age";

function cleanInput($data)
{
    // Allowed - Alpha and Numbers, ‘ – ‘
    if (!preg_match('/^[a-zA-Z0-9\s\-]{1,50}$/', $data)) {
        // Show error message when any other char entered
        echo "Only Alphabets or Numbers ‘-‘  allowed. ";
    }
    return trim($data);
}
?>