<!DOCTYPE html>
<html>

<head>
    <title>PHP Blog CMS</title>

    <?php
    $isAdmin = strpos($_SERVER['REQUEST_URI'], '/admin/') !== false;
    $basePath = $isAdmin ? '../' : '';
    ?>

    <!-- <link rel="stylesheet" href="<?php  //echo $basePath; ?>style.css"> -->
    <link rel-"stylesheet" href="/CMS-Final-Project/style.css">
</head>

<body>

    <h1>PHP Blog CMS</h1>

    <?php if (!$isAdmin): ?>
        <!-- PUBLIC SEARCH FORM -->
        <form method="get" action="search.php" style="margin-bottom:15px;">
            <input type="text" name="search" placeholder="Search posts..." required>
            <input type="submit" value="Search">
        </form>
    <?php endif; ?>

    <?php if ($isAdmin): ?>
        <!-- ADMIN NAVIGATION -->
        <nav>
            <a href="dashboard.php">Dashboard</a> |
            <a href="add-post.php">Add Post</a> |
            <a href="categories.php">Categories</a> |
            <a href="../index.php">View Site</a> |
            <a href="logout.php">Logout</a>
        </nav>
    <?php endif; ?>

    <hr>