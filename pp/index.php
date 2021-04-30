<?php
   session_start();
  $_SESSION['username'] = $_GET['username'];
    // if user is not yet logged in.
    if(!isset($_SESSION["username"])) {
   header("location:login.php");
   exit;
    }
  
?>

<?php 
  include ('templates/db.php'); 

  if(isset($_GET['login'])) {  
}
?>
<html>
<body>