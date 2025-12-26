<!DOCTYPE html>
<html>

<body>
    <h2>Registration Form</h2>
    <form method="post" action="">
        Name: <input type="text" name="name"><br><br>
        Email: <input type="text" name="email"><br><br>
        Age: <input type="number" name="age"><br><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>

</html>

// Coding is continue : here is PHP Validation & Processing
<?php
if (isset($_POST['register'])) {

    function clean($data)
    {
        return htmlspecialchars(trim($data));
    }

    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $age = clean($_POST['age']);

    if (empty($name) || empty($email) || empty($age)) {
        echo "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
    } elseif ($age < 18) {
        echo "Age must be 18 or above.";
    } else {
        echo "Registration Successful! <br>";
        echo "Welcome, $name";
    }
}
?>