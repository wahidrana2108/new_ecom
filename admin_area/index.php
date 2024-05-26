<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include("includes/header.php");

// Handle deletion request
if (isset($_GET['delete'])) {
    $product_id = $_GET['delete'];
    $delete_query = "DELETE FROM products WHERE product_id = $product_id";
    $delete_result = mysqli_query($conn, $delete_query);
    
    if ($delete_result) {
        echo "<div class='alert alert-success'>Product deleted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to delete the product.</div>";
    }
}

// Fetch all products from the database
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

echo "
<div class='container mt-5'>
<div class='text-end'>
    <a class='btn btn-primary' href='insert.php' id='logout-btn'>Insert Products</a>
    <a class='btn btn-danger' href='logout.php' id='logout-btn'>Logout</a>
</div>
<h2 class='text-center'>All Products</h2>
    <table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "
            <tr>
                <td>{$row['product_id']}</td>
                <td>{$row['product_name']}</td>
                <td>{$row['product_category']}</td>
                <td>{$row['product_description']}</td>
                <td>\${$row['product_price']}</td>
                <td><img src='../assets/imgs/product_img/{$row['product_image']}' alt='{$row['product_name']}' class='product-img'></td>
                <td><a href='edit_product.php?id={$row['product_id']}' class='btn btn-warning'>Edit</a></td>
                <td><a href='index.php?delete={$row['product_id']}' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a></td>
            </tr>";
}

echo "
        </tbody>
    </table>
</div>";

include("includes/footer.php");
?>
