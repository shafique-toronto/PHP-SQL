<?php
include "../includes/auth.php";
include "../includes/config.php";
include "../includes/header.php";

if (isset($_POST['submit'])) {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $category = $_POST['category'];

    mysqli_query(
        $conn,
        "INSERT INTO posts (category_id, title, content)
         VALUES ($category, '$title', '$content')"
    );

    header("Location: dashboard.php");
}
?>

<h2>Add New Post</h2>

<form method="post">
    Title:<br>
    <input type="text" name="title" required><br><br>

    Category:<br>
    <select name="category" required>
        <option value="">-- Select Category --</option>

        <?php
        $cats = mysqli_query($conn, "SELECT * FROM categories");

        if (mysqli_num_rows($cats) == 0) {
            echo "<option disabled>No categories found</option>";
        } else {
            while ($cat = mysqli_fetch_assoc($cats)) {
                echo "<option value='{$cat['id']}'>
                    {$cat['name']}
                  </option>";
            }
        }
        ?>
    </select>
    <br><br>

    Content:<br>
    <textarea name="content" rows="6" required></textarea><br><br>

    <input type="submit" name="submit" value="Publish">
</form>