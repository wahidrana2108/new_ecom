<?php
  include('assets/include/functions.php');
  session_start();
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo"$id";
  }
  else{
    echo"no id found";
  }
?>