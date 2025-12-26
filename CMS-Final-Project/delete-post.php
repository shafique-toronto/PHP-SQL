<?php
include "../includes/auth.php";
include "../includes/config.php";
include "../includes/header.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM posts WHERE id=$id");

header("Location: dashboard.php");
