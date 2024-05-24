checkout.php
<?php
include("assets/include/header.php");
session_start();

if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $total_cost = $_POST['total'];

        // Get user details
        $get_user = "SELECT * FROM users WHERE user_email='$user_email'";
        $run_user = mysqli_query($conn, $get_user);
        $row_user = mysqli_fetch_array($run_user);
        $user_id = $row_user['user_id'];

        // Insert order details into the orders table
        $order_query = "INSERT INTO `orders` (order_cost, order_status, user_id, user_email, user_phone, user_city, user_address, order_date) VALUES ('$total_cost', 'Pending', '$user_id', '$email', '$phone', '$city', '$address', NOW())";
        $run_order_query = mysqli_query($conn, $order_query);

        if ($run_order_query) {
            // Get the newly inserted order ID
            $order_id = mysqli_insert_id($conn);

            // Update the in_cart status of the cart items
            $update_cart_query = "UPDATE order_items SET in_cart='0' WHERE user_id='$user_id' AND in_cart='1'";
            $run_update_cart = mysqli_query($conn, $update_cart_query);

            if ($run_update_cart) {
                echo "<script>alert('Order placed successfully!');</script>";
                echo "<script>window.open('index.php','_self');</script>";
            } else {
                echo "<script>alert('Failed to update the cart. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Failed to place the order. Please try again.');</script>";
        }
    }

    echo "
    <section class='my-5 py-5'>
        <div class='container text-center mt-3 pt-5'>
            <h2 class='font-weight-bold'>Check Out</h2>
            <hr class='mx-auto'>
        </div>
        
        <div class='mx-auto container'>
            <form id='checkout-form' method='POST' action='checkout.php'>
                <div class='form-group checkout-small-element'>
                    <label>Name</label>
                    <input type='text' class='form-control' id='checkout-name' name='name' placeholder='Name' required/>
                </div>
                <div class='form-group checkout-small-element'>
                    <label>Email</label>
                    <input type='email' class='form-control' id='checkout-email' name='email' placeholder='Email' required/>
                </div>
                <div class='form-group checkout-small-element'>
                    <label>Phone</label>
                    <input type='tel' class='form-control' id='checkout-phone' name='phone' placeholder='Phone' required/>
                </div>
                <div class='form-group checkout-small-element'>
                    <label>City</label>
                    <input type='text' class='form-control' id='checkout-city' name='city' placeholder='City' required/>
                </div>
                <div class='form-group checkout-large-element'>
                    <label>Address</label>
                    <input type='text' class='form-control' id='checkout-address' name='address' placeholder='Address' required/>
                </div>
                <div class='form-group checkout-btn-container'>
                    <input type='hidden' name='total' value='{$_POST['total']}'/>
                    <input type='submit' class='btn' id='checkout-btn' name='checkout' value='Checkout'/>
                </div>
            </form>
        </div>
    </section>";
} else {
    echo "<script>window.open('login.php','_self');</script>";
}

include("assets/include/footer.php");
?>
