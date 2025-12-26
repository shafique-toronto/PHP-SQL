<?php  // (Example 3-3-3:)
$age = $_POST['age'];

if ($age < 18 || $age > 60) {
    echo "Age must be between 18 and 60.";
}
?>