<?php
include('config.php');
// Check connection
if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT * FROM personnel P WHERE P.personalID
      IN  (SELECT T.personalID FROM student S, teacher T WHERE S.advisorID = T.personalID)";
$result = mysqli_query($db, $sql);
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
   <table class="table">
   <thead>
     <tr>
      <th>personalID</th>
      <th>First Name</th>
      <th>Last name</th>
     </tr>
   </thead>
   <tbody>
      <?php
      if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["personalID"]. "</td>";
            echo "<td>" . $row["fName"]. "</td>";
            echo "<td>" . $row["lName"]. "</td>";
            echo "</tr>";
         }
      } else {
         echo "0 results";
      }
      $db->close();
      ?>
   </tbody>
</body>
</html>
