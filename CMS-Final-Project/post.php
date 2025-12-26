<?php
include "includes/config.php";

$id = $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM posts WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$post = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($post);

echo "<h1>{$data['title']}</h1>";
echo "<p>{$data['content']}</p>";

//Display comments
$comments = mysqli_query(
    $conn,
    "SELECT * FROM comments WHERE post_id=$id"
);

while ($row = mysqli_fetch_assoc($comments)) {
    echo "<strong>{$row['name']}:</strong> {$row['comment']}<br>";
}

//Add Comments
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars($_POST['comment']);

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO comments (post_id, name, comment) VALUES (?, ?, ?)"
    );
    mysqli_stmt_bind_param($stmt, "iss", $id, $name, $comment);
    mysqli_stmt_execute($stmt);
}


?>