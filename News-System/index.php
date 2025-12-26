<?php
include "includes/config.php";

$result = mysqli_query($conn, "SELECT * FROM articles ORDER BY created_at DESC");
?>

<h1>Latest News</h1>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>{$row['title']}</h2>";
    echo "<a href='single.php?id={$row['id']}'>Read More</a>";
    echo "<hr>";
}
?>