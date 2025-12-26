<?php
session_start();
include "includes/config.php";

/* If admin already logged in, redirect */
if (isset($_SESSION['admin_id'])) {
    header("Location: admin/dashboard.php");
    exit;
}

$error = "";

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    /* Prepared statement for security */
    $stmt = mysqli_prepare(
        $conn,
        "SELECT id, password FROM users WHERE username = ?"
    );

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {

        /* Verify hashed password */
        if (password_verify($password, $user['password'])) {

            $_SESSION['admin_id'] = $user['id'];
            header("Location: admin/dashboard.php");
            exit;

        } else {
            $error = "Invalid username or password";
        }

    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="/CMS-Final-Project/style.css?v=1">
    <title>Admin Login</title>
</head>

<body>

    <h2>Admin Login</h2>

    <?php
    if (!empty($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>

    <form method="post">
        <label>Username</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="login" value="Login">
    </form>

</body>

</html>