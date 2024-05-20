<?php
   session_start();
   if(!isset($_SESSION['user_email'])){
   include('assets/include/header.php');
   
   echo"
   <section class='my-5 py-5'>
    <div class='container text-center nt-3 pt-5'>
       <h2 class='form-weight-bold'>Login</h2>
       <hr class='nx-auto'>
    </div>
    
    <div class='nx-auto container'>
      <form action='login.php' method='POST' enctype='multipart/form-data'>
         <div class='form-group'>
            <label>Email</label>
              <input type='text' class='form-control' id='c_email' name='c_email' placeholder='Enter your Email address' required/>
    
    </div>
    
    <div class='form-group'>
            <label>Password</label>
         <input type='password' class='form-control' id='c_pass' name='c_pass' placeholder='Enter your password' required/>
       </div>
              <div class='form-group'>
    <input type='submit' class='btn' name='login'  id='login' value='Login'/>
    </div>
    <div class='form-group'>
        <a href='register.php' id='Register-url' class='btn'>Don't have account? Register</a>
    </div>
       </form>
       </div>
    </section>'";

     include('assets/include/footer.php');}
     else{
      echo "<script>window.open('account.php','_self')</script>"; 
     }

    if(isset($_POST['login'])){   
        $customer_email = $_POST['c_email'];  
        $customer_pass = $_POST['c_pass'];   
        $select_customer = "select * from users where user_email='$customer_email' AND user_password='$customer_pass'";    
        $run_customer = mysqli_query($conn,$select_customer);
        $check_customer = mysqli_num_rows($run_customer);      
        if($check_customer==0){    
            echo "<script>alert('Your email or password is wrong!')</script>"; 
            echo "<script>window.open('login.php','_self')</script>";     
            exit();   
        }
        else{             
         session_start();
         $_SESSION['user_email'] = $customer_email;         
         echo "<script>alert('You are Logged in Successfully!')</script>";          
         echo "<script>window.open('account.php','_self')</script>";
        }
   }
?>


