<!Doctype html>
<html>

<body>
    <h2>Product Catalog</h2>
    <h6>We have in stock Laptop, Mobile, Tablet, Headphones</h6>
    <form method="get">
        Search Product:
        <input type="text" name="search">
        <input type="submit" value="Search">
    </form>
</body>

</html>

// Coding is continue: here is PHP Logic
<?php
$products = array("Laptop", "Mobile", "Tablet", "Headphones");
$found = 0;
if (isset($_GET['search'])) {
    $search = strtolower($_GET['search']);

    foreach ($products as $product) {
        if (strpos(strtolower($product), $search) !== false) {
            echo $product . "<br>";
            $found = 1;
        }
    }
    if ($found == 0) {
        echo "Product not found. Try again.";
    }
} ?>