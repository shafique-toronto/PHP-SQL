<?php
include "includes/header.php";
include "includes/config.php";

$result = mysqli_query(
    $conn,
    "SELECT posts.id, posts.title, categories.name
     FROM posts
     JOIN categories ON posts.category_id = categories.id"
);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>{$row['title']}</h2>";
    echo "<p>Category: {$row['name']}</p>";
    echo "<a href='post.php?id={$row['id']}'>Read More</a><hr>";
}

include "includes/footer.php";
?>