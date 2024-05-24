<?php
  session_start();
  if(isset($_SESSION['user_email'])){
    include('assets/include/header.php');
    $user_email = $_SESSION['user_email'];
    $get_user = "select * from users where user_email='$user_email'";
    $run_user = mysqli_query($conn, $get_user);
    $row_user = mysqli_fetch_array($run_user);
    $user_name = $row_user['user_name'];

    
    echo"
      <section class='my-5 py-5'>
      <div class='row container nx-auto'>    
      <div class='text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12'>  
      <h3 class='font-weight-bold'>Account info</h3> 
      <hr class='nx-auto'> 
      <div class='account-info'>
      <p>Name: <span>$user_name</span></p>
      <p>Email: <span>$user_email</span></p>      
      <p><a href='cart.php' id='order-btn'>Your orders</a></p>     
      <p><a href='assets/include/logout.php' id='logout-btn'>Logout</a></p>
      
      </div>
      
      </div>
      
      <div class='text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12'>
      
      <form id='account-form' action='account.php' method='POST' enctype='multipart/form-data'>
      
      <h3>Change Password</h3>
      <hr class='ex-auto'>
      <div class='form-group'>
        <label>Password</label>
        <input type='password' class='form-control' id='account-password' name='password' placeholder='password' required/>
      </div>
      <div class='form-group'>
        <label>Confirm Password</label>
        <input type='password' class='form-control' id='account-confirm-password' name='confirm_password' placeholder='confirm password' required/>
      </div>
      <div class='form-group'>
        <input type='submit' value='change password' class='btn' name='submit' id='change-pass-btn'/>
        </div>
      
      </form>
      
      </div>
      
      </div>
      
      </section>";
    include('assets/include/footer.php');
    }

    else{
      echo "<script>window.open('login.php','_self')</script>";
    }


    if(isset($_POST['submit'])){
      $pass = $_POST['password'];
      $con_pass = $_POST['confirm_password'];
      if($pass != $con_pass){
        echo"<script>alert('Retype password!')</script>";
        echo"<script>window.open('account.php','_self')</script>";
      }
      else{
        $update_pass = "update users set user_password='$pass' where user_email='$user_email'";
        $run_update = mysqli_query($conn, $update_pass);
        if($run_update){
          echo"<script>alert('Password changed Successfully!')</script>";
          echo"<script>window.open('account.php','_self')</script>";
        }
      }
    }
?>