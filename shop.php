<?php
  include('assets/include/header.php')
?>
  
   <!--Featured-->
   <section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3>our featured</h3>
      <hr>
      <p>Here you can check out featured Products</p>
    </div>
    <div class="row mx-auto container-fluid">


<?php
  $per_page=6;

  if(isset($_GET['page'])){
      $page = $_GET['page'];
  }
      
  else{
      $page=1;
  }
  $start_from = ($page-1) * $per_page;
  $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
  $run_products = mysqli_query($conn,$get_products);

  while($row_products=mysqli_fetch_array($run_products)){
      $pro_id = $row_products['product_id'];
      $pro_title = $row_products['product_name'];
      $pro_price = $row_products['product_price'];
      $pro_img1 = $row_products['product_image'];

      echo "
      <div class='product text-center col-lg-3 col-md-4 col-sm-12'>
        <img class='img-fluid mb-3' src='assets/imgs/product_img/$pro_img1'/>
        <div class='star'>
          <i class='fas fa-star'></i>
          <i class='fas fa-star'></i>
          <i class='fas fa-star'></i>
          <i class='fas fa-star'></i>
          <i class=fas fa-star'></i>
        </div>
        <h5 class='p-name'>$pro_title</h5>
        <h4 class='p-price'>$$pro_price</h4>
        <a href='single_product.php?product_id=$pro_id'><button class='buy-btn'>Buy Now</button></a>
      </div>";}
?>
      <nav aria-label="page navigation example">
      <ui class="pagination mt-5">
        <li class="page-item"><a class="page-link" href="#">previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ui>
      </nav>
    </div>
  </section>

<?php
  include("assets/include/footer.php");
?>