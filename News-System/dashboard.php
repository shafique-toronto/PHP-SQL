<?php
include "../includes/auth.php";
include "../includes/config.php";

$result = mysqli_query($conn, "SELECT * FROM articles");
?>

<h2>Admin Dashboard</h2>
<a href="add-news.php">Add News</a> |
<a href="logout.php">Logout</a>
<hr>

<?php
if (mysqli_num_rows($result) == 0) {
    echo "No news found.";
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "<h3>{$row['title']}</h3>";
    echo "<a href='edit-news.php?id={$row['id']}'>Edit</a> | ";
    echo "<a href='delete-news.php?id={$row['id']}'>Delete</a>";
    echo "<hr>";
}
?>