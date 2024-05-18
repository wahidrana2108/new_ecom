<?php
  include('server/connection.php');
  session_start();
  if(isset($_SESSION['user_email'])){
    $email = $_SESSION['user_email'];
    echo $email ;}
  else{echo"no session";}
?>