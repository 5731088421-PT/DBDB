<?php
   include("config.php");
   session_start();
   if (isset($_SESSION['login_user'])) {
       header("location:welcome.php");
   }
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // username and password sent from form

      $myusername = mysqli_real_escape_string($db, $_POST['username']);
       $mypassword = mysqli_real_escape_string($db, $_POST['password']);

       $sql = "SELECT personalID FROM users WHERE username = '$myusername' and password = '$mypassword'";
       $result = mysqli_query($db, $sql);
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
       $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if ($count == 1) {
          $_SESSION['login_personalID'] = $row['personalID'];
          header("location: welcome.php");
      } else {
          $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBDB | Student Management System</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container" style="margin-top:20px;">
                <button class="btn btn-primary navbar-btn navbar-right" type="button"><strong>LOGIN</strong></button>
        </div>
    </nav>
    <nav class="navbar navbar-default"></nav>

    <div class="container">
      <div class="row">
          <div class="col-md-12">
              <img src="assets/img/login_logo.png" alt="DBDB login" style="width: 300px; margin: auto; margin-top: 40px; margin-bottom: 30px;  display: block;">
              <div class="loginplace">
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="text" id="username-email" placeholder="Username" type="text" name = "username" class="form-control" />
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" placeholder="Password" type="text" name = "password" class="form-control" />
                    </div>
                        <input type="submit" class="btn btn-block btn-login-submit" value="Login"/>
                </form>
              </div>
          </div>
      </div>
  </div>

    <footer class="site-footer">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <h5>DBDB © 2017</h5></div>
                <div class="col-sm-6 social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
