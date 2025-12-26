<?php
include "../includes/auth.php";
include "../includes/config.php";

$id = $_GET['id'];

$stmt = mysqli_prepare($conn, "DELETE FROM articles WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: dashboard.php");
exit;
?>