<?php
include "../includes/auth.php";
include "../includes/config.php";
include "../includes/header.php";
?>

<h2>Admin Dashboard</h2>

<p>Welcome! You can manage your website content from here.</p>

<hr>

<!-- ADMIN NAVIGATION -->
<nav>
    Post |<a href="add-post.php"> Add</a> |
    <a href="categories.php">Manage Categories</a> |
    <a href="../index.php" target="_blank">View Website</a> |
    <a href="logout.php">Logout</a>
</nav>

<hr>

<!-- DASHBOARD STATS -->
<h3>Quick Overview</h3>

<?php
$postCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM posts"));
$catCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM categories"));
$comCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM comments"));
?>

<ul>
    <li>Total Posts: <strong><?php echo $postCount; ?></strong></li>
    <li>Total Categories: <strong><?php echo $catCount; ?></strong></li>
    <li>Total Comments: <strong><?php echo $comCount; ?></strong></li>
</ul>

<hr>

<!-- POST MANAGEMENT TABLE -->
<h3>Manage Posts</h3>

<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>

    <?php
    $sql = "SELECT posts.id, posts.title, posts.created_at, categories.name
        FROM posts
        LEFT JOIN categories ON posts.category_id = categories.id
        ORDER BY posts.created_at DESC";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "<tr><td colspan='5'>No posts found.</td></tr>";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td>{$row['name']}</td>
                <td>{$row['created_at']}</td>
                <td>
                    <a href='edit-post.php?id={$row['id']}'>Edit</a> |
                    <a href='delete-post.php?id={$row['id']}' 
                       onclick=\"return confirm('Are you sure?')\">
                       Delete
                    </a>
                </td>
              </tr>";
        }
    }
    ?>
</table>

<?php
include "../includes/footer.php";
?>