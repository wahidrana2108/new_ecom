<?php
    include("includes/header.php");
    session_start();
    if(isset($_SESSION['username'])){
    echo"
    <div class='container form-container py-5'>
        <div class='text-end'>
            <a class='btn btn-primary' href='index.php' id='logout-btn'>All Products</a>
            <a class='btn btn-danger' href='logout.php' id='logout-btn'>Logout</a>
        </div>

        <h2>Insert Product</h2>
        <form action='insert.php' method='POST' enctype='multipart/form-data'>
            <div class='mb-3'>
                <label for='product_name' class='form-label'>Product Name:</label>
                <input type='text' class='form-control' id='product_name' name='product_name' required>
            </div>
            <div class='mb-3'>
                <label for='product_category' class='form-label'>Product Category:</label>
                <input type='text' class='form-control' id='product_category' name='product_category' required>
            </div>
            <div class='mb-3'>
                <label for='product_description' class='form-label'>Product Description:</label>
                <textarea class='form-control' id='product_description' name='product_description' required></textarea>
            </div>
            <div class='mb-3'>
                <label for='product_image' class='form-label'>Product Image:</label>
                <input type='file' class='form-control' id='product_image' name='product_image1' required>
            </div>
            <div class='mb-3'>
                <label for='product_image2' class='form-label'>Product Image 2:</label>
                <input type='file' class='form-control' id='product_image2' name='product_image2'>
            </div>
            <div class='mb-3'>
                <label for='product_image3' class='form-label'>Product Image 3:</label>
                <input type='file' class='form-control' id='product_image3' name='product_image3'>
            </div>
            <div class='mb-3'>
                <label for='product_image4' class='form-label'>Product Image 4:</label>
                <input type='file' class='form-control' id='product_image4' name='product_image4'>
            </div>
            <div class='mb-3'>
                <label for='product_price' class='form-label'>Product Price:</label>
                <input type='number' step='0.01' class='form-control' id='product_price' name='product_price' required>
            </div>
            <div class='mb-3'>
                <label for='product_special_offer' class='form-label'>Special Offer (%):</label>
                <input type='number' class='form-control' id='product_special_offer' name='product_special_offer' min='0' max='100' required>
            </div>
            <div class='mb-3'>
                <label for='product_color' class='form-label'>Product Color:</label>
                <input type='text' class='form-control' id='product_color' name='product_color' required>
            </div>
            <button type='submit' name='submit' class='btn btn-primary'>Insert Product</button>
        </form>
    </div>";}
    else{
        echo "<script>window.open('login.php','_self')</script>";
    }

    include("includes/footer.php");

        if(isset($_POST['submit'])){
        $p_name = $_POST['product_name'];
        $p_cat = $_POST['product_category'];
        $p_price = $_POST['product_price'];
        $p_product_color = $_POST['product_color'];
        $p_desc = $_POST['product_description'];
        $p_offer = $_POST['product_special_offer'];

        $p_img1 = $_FILES['product_image1']['name'];
        $p_img2 = $_FILES['product_image2']['name'];
        $p_img3 = $_FILES['product_image3']['name'];
        $p_img4 = $_FILES['product_image4']['name'];

        $temp_name1 = $_FILES['product_image1']['tmp_name'];
        $temp_name2 = $_FILES['product_image2']['tmp_name'];
        $temp_name3 = $_FILES['product_image3']['tmp_name'];
        $temp_name4 = $_FILES['product_image4']['tmp_name'];

        move_uploaded_file($temp_name1,"../assets/imgs/product_img/$p_img1");
        move_uploaded_file($temp_name2,"../assets/imgs/product_img/$p_img2");
        move_uploaded_file($temp_name3,"../assets/imgs/product_img/$p_img3");
        move_uploaded_file($temp_name4,"../assets/imgs/product_img/$p_img4");

        $insert_product = "insert into products (product_name,product_category,product_description,product_image,product_image2,product_image3,product_image4,product_price,product_special_offer,product_color) values ('$p_name','$p_cat','$p_desc','$p_img1','$p_img2','$p_img3','$p_img4','$p_price','$p_offer','$p_product_color')";
        $run_product = mysqli_query($conn,$insert_product);

        if($run_product){
            echo "<script>alert('product details added Successfully!')</script>";
            echo "<script>window.open('insert.php','_self')</script>";  
        }
    }
?>