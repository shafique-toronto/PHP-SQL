<?php
include "../includes/auth.php";
include "../includes/config.php";
include "../includes/header.php";

$id = $_GET['id'];

$post = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM posts WHERE id=$id")
);

if (isset($_POST['update'])) {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    mysqli_query(
        $conn,
        "UPDATE posts SET title='$title', content='$content' WHERE id=$id"
    );

    header("Location: dashboard.php");
}
?>

<h2>Edit Post</h2>

<form method="post">
    Title:<br>
    <input type="text" name="title" value="<?php echo $post['title']; ?>"><br><br>

    Content:<br>
    <textarea name="content" rows="6"><?php echo $post['content']; ?></textarea><br><br>

    <input type="submit" name="update" value="Update Post">
</form>