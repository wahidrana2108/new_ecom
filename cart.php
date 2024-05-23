<?php
include("assets/include/header.php");
session_start();

if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];
    $get_user = "SELECT * FROM users WHERE user_email='$user_email'";
    $run_user = mysqli_query($conn, $get_user);
    $row_user = mysqli_fetch_array($run_user);
    $user_id = $row_user['user_id'];

    $get_orders = "SELECT * FROM order_items WHERE user_id='$user_id'";
    $run_orders = mysqli_query($conn, $get_orders);
    
    echo "
    <section class='cart container my-5 py-5'>
        <div class='container mt-5'>
            <h2 class='font-weight-bold'>Your Cart</h2>
            <hr>
        </div>
        <table class='mt-5 pt-5'>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>";
    
    $total = 0;
    while ($row_order = mysqli_fetch_array($run_orders)) {
        $product_id = $row_order['product_id'];
        $product_quantity = $row_order['quantity'];

        // Fetch product details from the products table
        $get_product = "SELECT * FROM products WHERE product_id='$product_id'";
        $run_product = mysqli_query($conn, $get_product);
        $row_product = mysqli_fetch_array($run_product);

        $product_name = $row_product['product_name'];
        $product_price = $row_product['product_price'];
        $product_image = $row_product['product_image'];
        $subtotal = $product_price * $product_quantity;
        $total += $subtotal;

        echo "
        <tr>
            <td>
                <div class='product-info'>
                    <img src='assets/imgs/$product_image' alt='$product_name'/>
                    <div>
                        <p>$product_name</p>
                        <small><span>$</span>$product_price</small>
                        <br>
                        <a class='remove-btn' href='remove_from_cart.php?product_id=$product_id'>Remove</a>
                    </div>
                </div>
            </td>
            <td>
                <input type='number' value='$product_quantity'/>
                <a class='edit-btn' href='edit_cart.php?product_id=$product_id'>Edit</a>
            </td>
            <td>
                <span>$</span>
                <span class='product-price'>$subtotal</span>
            </td>
        </tr>";
    }

    echo "
        </table>
        <div class='cart-total'>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td><span>$</span>$total</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><span>$</span>$total</td>
                </tr>
            </table>
        </div>
        <div class='checkout-container'>
            <button class='btn checkout-btn'>Checkout</button>
        </div>
    </section>";

    include("assets/include/footer.php");
} else {
    echo "<script>window.open('login.php','_self')</script>";
}
?>
