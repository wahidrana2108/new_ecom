<?php
  include('assets/include/header.php')
?>
  

   <!--register-->
   <section class="my-5 py-5">
    <div class="container text-center nt-3 pt-5">
       <h2 class="form-weight-bold">Register</h2>
       <hr class="nx-auto">
    </div>
    
    <div class="nx-auto container">
      <form id="registation-form" action="register.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
            <label>Name</label>
              <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Name" required/>
    
    </div>
         <div class="form-group">
            <label>Email</label>
              <input type="text" class="form-control" id="c_email" name="c_email" placeholder="Emai" required/>
    
    </div>
    
    <div class="form-group">
            <label>Password</label>
         <input type="password" class="form-control" id="c_pass" name="c_pass" placeholder="password" required/>
       </div>
       <div class="form-group">
        <label>Confirm Password</label>
     <input type="password" class="form-control" id="c_con_pass" name="c_con_pass" placeholder="confirm password" required/>
   </div>
              <div class="form-group">
    <input type="submit" class="btn" name="register" id="register" value="Register"/>
    </div>
    <div class="form-group">
        <a id="login-url" class="btn">Do you have account? Login</a>
    </div>
       </form>
       </div>
    </section>

<?php
  include("assets/include/footer.php");
?>



<?php

    if(isset($_POST['register'])){
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_con_pass = $_POST['c_con_pass'];



        if($c_pass != $c_con_pass){
            echo "<script>alert('Retype your password!')</script>";
            echo "<script>window.open('register.php','_self')</script>";
        }
        else{
            $insert_customer = "insert into users (user_name,user_email,user_password) values ('$c_name','$c_email','$c_pass')";
            $run_customer = mysqli_query($conn,$insert_customer);
            if($run_customer){
            session_start();
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('You have been Registered successfully!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            }
            else{
            echo "<script>alert('Something went wrong!')</script>";
            echo "<script>window.open('register.php','_self')</script>";
            }
        }
        
        
    }
?>