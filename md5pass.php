<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Check Variable</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   <form action="" method="POST">
   <div class="form-group">
      <label>Password: </label>
      <input type="password" class="form-control" name="md5" value='<?php echo $_POST['md5']; ?>'>
   </div>
     <button type="submit" class="btn btn-default">Submit</button>
   </form>
   <?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      echo "md5 hash:".md5($_POST['md5']);
   }
   ?>
</body>
</html>
