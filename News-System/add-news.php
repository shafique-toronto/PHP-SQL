<?php
include "../includes/auth.php";
include "../includes/config.php";

if (isset($_POST['submit'])) {

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO articles (title, content) VALUES (?, ?)"
    );
    mysqli_stmt_bind_param($stmt, "ss", $title, $content);
    mysqli_stmt_execute($stmt);

    header("Location: dashboard.php");
    exit;
}
?>

<form method="post">
    Title:<br>
    <input type="text" name="title" required><br><br>

    Content:<br>
    <textarea name="content" required></textarea><br><br>

    <input type="submit" name="submit" value="Publish">
</form>