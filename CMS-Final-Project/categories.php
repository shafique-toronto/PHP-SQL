<?php
include "../includes/auth.php";
include "../includes/config.php";
include "../includes/header.php";

if (isset($_POST['add'])) {
    $name = htmlspecialchars($_POST['name']);
    mysqli_query($conn, "INSERT INTO categories (name) VALUES ('$name')");
}
?>

<h2>Manage Categories</h2>

<form method="post">
    Category Name:
    <input type="text" name="name" required>
    <input type="submit" name="add" value="Add Category">
</form>

<hr>

<?php
$result = mysqli_query($conn, "SELECT * FROM categories");
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['name'] . "<br>";
}
?>