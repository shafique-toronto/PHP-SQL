<?php
//include "includes/config.php";
$conn = mysqli_connect("localhost", "root", "", "cms_db");

if (!$conn) {
    die("Database connection failed");
}
$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password)
        VALUES ('$username', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "Admin user created successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>