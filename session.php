<?php
   include('config.php');
   include('function.php');
   session_start();

   $user_check = $_SESSION['login_personalID'];
   $ses_sql = mysqli_query($db,"select * from users where personalID = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_username = $row['username'];
   $login_personalID = $row['personalID'];
   $login_userType = findUserType($login_personalID,$db);
   $login_privilege = $row['type'];  #executive, staff or teacher
   if(!isset($_SESSION['login_personalID'])){
      header("location:index.php");
   }
?>
