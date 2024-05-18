<?php
include('assets/include/header.php');

if(isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $get_product = "select * from products where product_id='$product_id'";
  $run_product = mysqli_query($conn,$get_product);
  $row_product = mysqli_fetch_array($run_product);
  $pro_title = $row_product['product_name'];
  $pro_price = $row_product['product_price'];
  $pro_img1 = $row_product['product_image'];
  $pro_img2 = $row_product['product_image2'];
  $pro_img3 = $row_product['product_image3'];
  $pro_img4 = $row_product['product_image4'];
  $pro_desc = $row_product['product_description'];
  $pro_cat = $row_product['product_category'];

//no product id 
}else{
  echo "<script>window.open('index.php','_self')</script>";
}
?>

  <!--Single product-->
  <section class="container single-product my-5 pt-5">
    <div class="row mt-5">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <div class="col-lg-5 col-md-6mcol-sm-12">
            <img class="img-fluid w-100 pb-1" src="assets/imgs/product_img/<?php echo $pro_img1?>" id="mainimg"/>
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="assets/imgs/product_img/<?php echo $pro_img1 ?>" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/product_img/<?php echo $pro_img2 ?>" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/product_img/<?php echo $pro_img3 ?>" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/product_img/<?php echo $pro_img4 ?>" width="100%" class="small-img"/>
                </div>
            </div>
        </div>

<div class="col-lg-6 col-md-12 col-12">
    <h6><?php echo $pro_cat?></h6>
    <h3 class="py-4"><?php echo $pro_title?></h3>
    <h2>$<?php echo $pro_price?></h2>

    <form method="POST" action="cart.php">
      <input type="hidden" name="product_image" value="<?php echo $product_id ?>"/>
      <input type="hidden" name="product_image" value="<?php echo $pro_img1; ?>"/>
      <input type="hidden" name="product_name" value="<?php echo $pro_title; ?>"/>
      <input type="hidden" name="product_name" value="<?php echo $pro_price; ?>"/>

      <input type="number" name="product_quantity" value="1"/>
      <button class="buy-btn" type="submit" name="add_to_cart">Add to Cart</button>
    </from>
   
    <h4 class="mt-5 mb-5">Product Details</h4>
    <span><?php echo $pro_desc;?>
  </span>
</div>
</form>

        </div>
      </section>

      <!--Realated product-->

    <section id="featured" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>Realated product</h3>
        <hr>
        <p>Here you can check out Realated Products</p>
      </div>
    <?php
      $get_products = "select * from products where product_category='$pro_cat'";
      $run_products = mysqli_query($conn,$get_products);

      while($row_products=mysqli_fetch_array($run_products)){
          $pro_id = $row_products['product_id'];
          $pro_title = $row_products['product_name'];
          $pro_price = $row_products['product_price'];
          $pro_img1 = $row_products['product_image'];
            echo"
              <div class='row mx-auto container-fluid'>
                <div class='product text-center col-lg-3 col-md-4 col-sm-12'>
                  <img class='img-fluid mb-3' src='assets/imgs/product_img/$pro_img1'/>
                  <div class='star'>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                  </div>
                  <h5 class='p-name'>$pro_title</h5>
                  <h4 class='p-price'>$$pro_price</h4>
                  <a href='single_product.php?product_id=$pro_id'><button class='buy-btn'>Buy Now</button></a>
                </div>
              </div>";
      }
      ?>
      
    </section>
  
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>

     var mainImg = document.getElementById("mainimg");
     var smallimg = document.getElementsByClassName("small-img");
    for(let i=0;i<4;i++){
     smallimg[i].onclick = function(){
      mainImg.src = smallimg[i].src;
     }
     
    }
    </script>


  <?php
    include("assets/include/footer.php");
  ?>
        
</body>
</html>