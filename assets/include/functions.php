<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "php__project")
or die('Could not connect to the database!');

// add to cart function
function add_to_cart(){
    global $conn; // Use the global $conn variable
    if(isset($_POST['add_to_cart'])){
        $pro_id = $_GET['product_id']; // Correct the way to get the product id
        $user_email = $_SESSION['user_email'];
        $get_user = "select user_id from users where user_email='$user_email'";
        $user_query = mysqli_query($conn, $get_user);
        $user_data = mysqli_fetch_assoc($user_query);
        $user_id = $user_data['user_id'];
        $order_id = mt_rand(0, 99999999);

        $pro = "insert into order_items (user_id, product_id, order_id) values ('$user_id', '$pro_id', '$order_id')";
        $run_pro = mysqli_query($conn, $pro);
        if(!$run_pro){
            echo "<script>window.open('contact.php','_self')</script>"; 
        }
    }
}
?>
