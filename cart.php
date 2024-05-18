<?php
session_start();
if (isset($_POST['add_to_cart'])){

  if(isset($_SESSION['cart'])){
//if this is the first product
  }else{
    $product_id=$_POST['product_id'];
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image= $_POST['product_image'];
    $product_quantity=$_POST['product_quantity'];

    $product_array=array(
      'product_id'=>$product_id,
      'product_name'=>$product_name,
      'product_price'=>$product_price,
      'product_image'=>$product_image,
      'product_quantity'=>$product_quantity
    
    );
    $_SESSION['cart'][$product_id]= $product_array;

  }

}else{
  header('location: index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Wallpoet&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container">
          <img src="assets/CSS/js/imgs/Logo4.png"/>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>

          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>

              <li class="nav-item">
                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                <a href="Account.html"><i class="fas fa-user"></i></a>
              </li>

            </ul>
          </div>
        </div>
      </nav>
    

        <!--Cart-->
        <section class="cart container my-5 py-5">
            <div class="container mt-5">
                <h2 class="font-weight-bolde">Your Cart</h2>
                <hr>
            </div>

            <table class="mt-5 pt-5">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="assets/CSS/js/imgs/pexels-photo-2811173.jpeg"/>
                        <div>
                        <p>white Shoes</p>
                        <small><span>$</span>200</small>
                        <br>
                        <a class="remove-btn" href="#">Remove</a>
                        </div>
                        </div>
                    </td>
                    <td>
                        <input type="number" value="1"/>
                        <a class="edit-byn">Edit</a>
                    </td>
                    <td>
                        <span>$</span>
                        <span class="Product-price">200</span>
                    </td>

                </tr>

                <tr>
                    <td>
                        <div class="product-info">
                            <img src="assets/CSS/js/imgs/pexels-photo-2811173.jpeg"/>
                        <div>
                        <p>white Shoes</p>
                        <small><span>$</span>200</small>
                        <br>
                        <a class="remove-btn" href="#">Remove</a>
                        </div>
                        </div>
                    </td>
                    <td>
                        <input type="number" value="1"/>
                        <a class="edit-byn">Edit</a>
                    </td>
                    <td>
                        <span>$</span>
                        <span class="Product-price">200</span>
                    </td>

                </tr>

                <tr>
                    <td>
                        <div class="product-info">
                            <img src="assets/CSS/js/imgs/pexels-photo-2811173.jpeg"/>
                        <div>
                        <p>white Shoes</p>
                        <small><span>$</span>200</small>
                        <br>
                        <a class="remove-btn" href="#">Remove</a>
                        </div>
                        </div>
                    </td>
                    <td>
                        <input type="number" value="1"/>
                        <a class="edit-byn">Edit</a>
                    </td>
                    <td>
                        <span>$</span>
                        <span class="Product-price">200</span>
                    </td>

                </tr>
            </table>
<div class="cart-total">
    <table>
        <tr>
            <td>Subtotal</td>
            <td>$200</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>$200</td>
        </tr>
    </table>
</div>
<div class="checkout-container">
    <button class="btn checkout-btn">Checkout</button>
</div>
        </section>
                  <!--Footer-->
      <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <img class="logo" src=""/>
          <p class="pt-3">We provide the best Product for the most affordable price</p>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Featured</h5>
          <ul class="test-uppercase">
            <li><a href="#">men</a></li>
            <li><a href="#">women</a></li>
            <li><a href="#">boys</a></li>
            <li><a href="#">girls</a></li>
            <li><a href="#">new arrivals</a></li>
            <li><a href="#">clothes</a></li>
          </ul>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Contract us</h5>
        <div>
        <h6 class="test-uppercase">Address</h6>
        <p>Ranpura,Dhaka</p>
        </div>
      <div>
      <h6 class="test-uppercase">Phone</h6>
        <p>01799843687</p>
        </div>
        <div>
          <h6 class="test-uppercase">Email</h6>
          <p>Apple@gmail.com</p>
        </div>
      </div>
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        
        <div class="row">
          <img src="assets/CSS/js/imgs/1691832460x-twitter-logo-png.png" class="img-fluid w-25 h-100 m-2"/>
          <img src="assets/CSS/js/imgs/sm_5afaf0c36298b.jpg" class="img-fluid w-25 h-100 m-2"/>
          <img src="  " class="img-fluid w-25 h-100 m-2"/>
          <img src="  " class="img-fluid w-25 h-100 m-2"/>
          <img src="  " class="img-fluid w-25 h-100 m-2"/>
        </div>
      </div>
    </div>

    <div class="copyright nt-5">
      <div class="row container mx-auto">
        <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
          <img src="assets/CSS/js/imgs/bkash1.PNG" alt="Footer Image">
        </div>
        <div class="col-lg-3 col-md-5 col-sm-12 nb-4 text-nowrap mb-2">
          <p>eCommerce e 2024 All Right Reserved</p>
      </div>
      <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
        <a herf="#"><i class="fab fa-facebook"></i></a>
        <a herf="#"><i class="fab fa-instagram"></i></a>
        <a herf="#"><i class="fab fa-twitter"></i></a>
      </div>
    </div>
    </div>

  </footer>

    



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>