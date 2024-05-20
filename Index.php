<?php
  include("assets/include/header.php");
?>
    

      <!--Home-->
    <section id="home">
        <div class="container">
            <h5>New Arrivals</h5>
            <h1><span>Best Prices</span> This Season</h1>
            <p>Cse347 Project</p>
            <a href='shop.php'><button class='buy-btn'>Buy Now</button></a>
        </div>
    </section>

    <!--Brand-->
    <section id="brand" class="container">
      <div class="row">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12"src="assets/imgs/ILLIYEEN-Logo2.png"/>
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12"src="assets/imgs/download.jpg"/>
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12"src="assets/imgs/nike.png"/>
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12"src="assets/imgs/brand4.jpg"/>
      </div>
    </section>

    <!--new-->
    <section id="new" class="w-100">
      <div class="row p-0 m-0">
        <!--one-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
          <img class="img-fluid" src="assets/imgs/shoes.jpg"/>
          <div class="details">
            <h2>Extreamely Awesome Shoes</h2>
            <button class="test-uppercase">Shop Now</button>
          </div>
        </div>
       <!--Two-->
       <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/imgs/jacket.jpg"/>
        <div class="details">
          <h2>Awesome Jacket</h2>
          <button class="test-uppercase">Shop Now</button>
        </div>
      </div>

       <!--Three-->
       <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/imgs/watch.jpg"/>
        <div class="details">
          <h2>50% off Watches</h2>
          <button href='shop.php' class="test-uppercase">Shop Now</button>
        </div>
      </div>

      </div>
    </section>

    <!--Featured-->
    <section id="featured" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>our featured</h3>
        <hr>
        <p>Here you can check out featured Products</p>
      </div>
      <div class="row mx-auto container-fluid">
      <?php
              $get_products = "select * from products";
              $run_products = mysqli_query($conn,$get_products);

              while($row_products=mysqli_fetch_array($run_products)){
                  $pro_id = $row_products['product_id'];
                  $pro_title = $row_products['product_name'];
                  $pro_price = $row_products['product_price'];
                  $pro_img1 = $row_products['product_image'];
                    echo"

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
        </div>";
              }?>
      </div>
    </section>

  <!--Banner-->

  <section id="banner"class="my-5 py-5">
    <div class="container">
      <h4>Mid season's Sale</h4>
      <h1>Autumn Collection<br>up to 30% off</h1>
      <button class="text-uppercase">Shop Now</button>
    </div>
  </section>
   <!--Clothes-->

        <section id="featured" class="my-5">
          <div class="container text-center mt-5 py-5">
            <h3>Dresses</h3>
            <hr>
            <p>Here you can check out amazing clothes</p>
          </div>
          <div class="row mx-auto container-fluid">
            <?php
              $get_products = "select * from products order by rand()";
              $run_products = mysqli_query($conn,$get_products);

              while($row_products=mysqli_fetch_array($run_products)){
                  $pro_id = $row_products['product_id'];
                  $pro_title = $row_products['product_name'];
                  $pro_price = $row_products['product_price'];
                  $pro_img1 = $row_products['product_image'];
                    echo"
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
            </div>";
          }
          ?>
          </div>
        </section>
        
<?php
  include("assets/include/footer.php");
?>