<?php
include "includes/config.php";

$id = $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM articles WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("News not found");
}
?>

<h1><?php echo $data['title']; ?></h1>
<p><?php echo $data['content']; ?></p>