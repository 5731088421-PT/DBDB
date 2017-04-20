<?php
include('config.php');
include('converter.php');
include('function.php');
// Check connection
if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "GET") {
   $basic_info = "SELECT * FROM personnel WHERE personnel.personalID = {$_GET['id']}";
   $basic_list = array("personalID","fName","lName","gender","DOB","email","ADDR","tel");
   $basic_result = mysqli_query($db, $basic_info);
   echo findUserType($_GET['id'],$db);


}
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>ดูข้อมูลพื้นฐานของบุคลากร</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   <?php
   if ($basic_result->num_rows > 0) {
      // query basic infos.
      while($row = $basic_result->fetch_assoc()) {
         for($i=0;$i<count($basic_list);$i++){
            echo $convert[$basic_list[$i]] . ": ";
            if($i==3) {
                //specific output for gender attributes.
                if($row[$basic_list[$i]]== M) echo "Male";
                else echo "Female";
            }
            else {
               //output data
               echo  $row[$basic_list[$i]];
            }

            echo "<br>";
         }
      }

   } else {
      echo "ไม่มีข้อมูลรหัสบุคลากรส่งมา";
   }
   $db->close();
   ?>
</body>
</html>
