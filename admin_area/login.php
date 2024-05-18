<?php
    session_start();
    if(!isset($_SESSION['username'])){
    include("includes/header.php");
    echo"
    <div class='login-container'>
        <h2>Admin Login</h2>
        <form action='login.php' method='POST' enctype='multipart/form-data'>
            <div class='form-group'>
                <label for='username'>Username</label>
                <input type='text' id='username' name='username' placeholder='Enter your username' required>
            </div>
            <div class='form-group'>
                <label for='password'>Password</label>
                <input type='password' id='password' name='password' placeholder='Enter your password' required>
            </div>
            <button type='submit' name='login'>Login</button>
        </form>
    </div>";
    include("includes/footer.php");

    if(isset($_POST['login'])){   
        $email = $_POST['username'];  
        $pass = $_POST['password'];   
        $select_admin = "select * from admin_users where username='$email' AND password='$pass'";    
        $run_admin = mysqli_query($conn,$select_admin);
        $row_admin = mysqli_fetch_array($run_admin);   
        $check_admin = mysqli_num_rows($run_admin);      
        if($check_admin==0){    
            echo "<script>alert('Your email or password is wrong!')</script>";      
            exit();   
        }
        else{           
            session_start(); 
            $_SESSION['username']=$email;                
            echo "<script>alert('You are Logged in Successfully!')</script>";       
            echo "<script>window.open('index.php','_self')</script>";
        }
      }        
    }  
      else{
        echo "<script>window.open('index.php','_self')</script>";
    }

?>