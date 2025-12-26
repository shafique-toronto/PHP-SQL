<?php
include "../includes/auth.php";
include "../includes/config.php";

$id = $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM articles WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE articles SET title=?, content=? WHERE id=?"
    );
    mysqli_stmt_bind_param($stmt, "ssi", $title, $content, $id);
    mysqli_stmt_execute($stmt);

    header("Location: dashboard.php");
    exit;
}
?>

<form method="post">
    Title:<br>
    <input type="text" name="title" value="<?php echo $data['title']; ?>"><br><br>

    Content:<br>
    <textarea name="content"><?php echo $data['content']; ?></textarea><br><br>

    <input type="submit" name="update" value="Update">
</form>