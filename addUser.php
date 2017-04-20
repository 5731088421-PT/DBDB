<?php
include('config.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    //$fName = mysqli_real_escape_string($_POST['fName']);
    $sql = "INSERT INTO personnel (fName, lName, gender,DOB,email,ADDR,tel)
    VALUES ('{$_POST['fName']}','{$_POST['lName']}','{$_POST['gender']}','{$_POST['DOB']}','{$_POST['email']}','{$_POST['ADDR']}','{$_POST['tel']}')";

    if ($result = mysqli_query($db, $sql)) {
        $last_id = $db->insert_id;
        echo "New record created successfully. Last inserted ID is: " . $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    $db->close();
}
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Add user</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   <form action="" method="POST">
   <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="fName">
   </div>
   <div class="form-group">
       <label>Last name</label>
      <input type="text" class="form-control"  name="lName">
   </div>
   <div class="radio">
   <label class="radio-inline"><input type="radio" name="gender" value="M">Male</label>
   <label class="radio-inline"><input type="radio" name="gender" value="F">Female</label>
   </div>
   <div class="form-group">
       <label>Date of birth</label>
       <input type="date" name="DOB">
   </div>
   <div class="form-group">
       <label for="email">Email address:</label>
       <input type="email" class="form-control" id="email" name="email">
   </div>
   <div class="form-group">
       <label for="address">Address</label>
       <input type="text" class="form-control"  name="ADDR">
   </div>
   <div class="form-group">
       <label for="email">Phone number:</label>
       <input type="tel" class="form-control" name="tel">
   </div>
     <button type="submit" class="btn btn-default">Submit</button>
   </form>
</body>
</html>
