<?php
include "includes/header.php";
include "includes/config.php";

/* Check if search keyword exists */
if (!isset($_GET['search']) || trim($_GET['search']) == "") {
    echo "<p>Please enter a search keyword.</p>";
    include "includes/footer.php";
    exit;
}

$keyword = "%" . trim($_GET['search']) . "%";

/* Prepared statement to prevent SQL Injection */
$stmt = mysqli_prepare(
    $conn,
    "SELECT id, title FROM posts WHERE title LIKE ? OR content LIKE ?"
);

mysqli_stmt_bind_param($stmt, "ss", $keyword, $keyword);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

echo "<h2>Search Results</h2>";

if (mysqli_num_rows($result) == 0) {
    echo "<p>No results found.</p>";
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<h3>{$row['title']}</h3>";
        echo "<a href='post.php?id={$row['id']}'>Read More</a>";
        echo "<hr>";
    }
}

include "includes/footer.php";
?>