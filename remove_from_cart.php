<?php
session_start();
include("assets/include/functions.php");

if (isset($_GET['product_id']) && isset($_SESSION['user_email'])) {
    $product_id = $_GET['product_id'];
    $user_email = $_SESSION['user_email'];

    // Get user ID from the session user email
    $get_user = "SELECT * FROM users WHERE user_email='$user_email'";
    $run_user = mysqli_query($conn, $get_user);
    if ($run_user && mysqli_num_rows($run_user) > 0) {
        $row_user = mysqli_fetch_array($run_user);
        $user_id = $row_user['user_id'];

        // Delete the product from the order_items table
        $delete_product = "DELETE FROM order_items WHERE user_id='$user_id' AND product_id='$product_id'";
        $run_delete = mysqli_query($conn, $delete_product);

        if ($run_delete) {
            echo "<script>alert('Product has been removed from your cart.');</script>";
            echo "<script>window.open('cart.php','_self');</script>";
        } else {
            echo "<script>alert('Failed to remove the product. Please try again.');</script>";
            echo "<script>window.open('cart.php','_self');</script>";
        }
    } else {
        echo "<script>alert('User not found. Please try again.');</script>";
        echo "<script>window.open('cart.php','_self');</script>";
    }
} else {
    echo "<script>window.open('cart.php','_self');</script>";
}
?>
