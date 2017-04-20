<?php
include('config.php');
include('session.php');
// Check connection
if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}
$offset = 5 * intval($_GET['pagenum']);

$sql = "SELECT P.personalID,P.fName,P.lName,S.sID FROM personnel P,student S WHERE P.personalID = S.personalID AND S.advisorID = $login_personalID LIMIT $offset,5";
$result = mysqli_query($db, $sql);
$list = array("sID","fName","lName","isSick","isPro","behavior");
$sql2 = "SELECT count(*) as total FROM personnel P,student S WHERE P.personalID = S.personalID AND S.advisorID = {$login_personalID}";
$size = mysqli_fetch_array((mysqli_query($db,$sql2)),MYSQLI_ASSOC)["total"];
?>


<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>ดูข้อมูลนิสิตทั้งหมด</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

   <table class="table" align = "center">
   <thead>
     <tr>
      <th>รหัสนิสิต</th>
      <th>ชื่อ</th>
      <th>นามสกุล</th>
      <th>ดูข้อมูลนิสิต</th>
     </tr>
   </thead>
   <tbody >
      <?php
      if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['sID']. "</td>";
            echo "<td>" . $row['fName']. "</td>";
            echo "<td>" . $row['lName']. "</td>";
            echo "<td><a href=view_student.php?id=".$row['personalID'].">ดูข้อมูลนิสิต</a></td>";
            echo "</tr>";
         }
      } else {
         echo "0 results";
      }
      $db->close();
      ?>
   </tbody>
   <?php
   for ($i=0 ; $i<$size/5 ; $i++) {
      if($_GET['pagenum'] == $i){
         echo "Page ". ($i+1). " ";
      } else {
         echo "<a href='view_all_students.php?pagenum=$i'>Page ".($i+1) ." </a>";
      }
   }
   ?>
</body>
</html>
