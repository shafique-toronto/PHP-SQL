<?php
$conn = mysqli_connect("localhost", "root", "", "news_system");
if (!$conn) {
    die("Database connection failed");
}

$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT);

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO users (username, password) VALUES (?, ?)"
);
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);

echo "Admin created successfully";
?>