<?php
include('config.php');
include('converter.php');
include('session.php');
// Check connection
if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "GET") {
   $basic_info = "SELECT * FROM personnel WHERE personnel.personalID = $login_personalID";
   $course_info = "SELECT * FROM teach T,course C WHERE teacher_personalID = $login_personalID AND C.cID = T.cID";
   $basic_result = mysqli_query($db, $basic_info);
   $course_result = mysqli_query($db,$course_info);
   $row = $basic_result->fetch_assoc();
   if($login_userType == 'teacher') {
      $extra_info = "SELECT mName,salary,expert,faName FROM teacher T,major M,faculty F WHERE T.mID = M.mID AND F.fID = M.fID AND T.personalID = $login_personalID";
   } else {
      $extra_info = "SELECT * FROM staff WHERE staff.personalID = $login_personalID";
   }
   $extra_result = mysqli_query($db,$extra_info);
   $extra_row = $extra_result->fetch_assoc();
   $db->close();
}
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>ดูข้อมูลส่วนตัว</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   <h2>รหัสบุคลากร: <?php echo $row['personalID']; ?> </h2>
      <h2><?php echo $row['fName']." ".$row['lName']; ?> </h2>
      <p>ที่อยู่: <?php echo $row['ADDR']; ?> </p>
      <p>โทรศัพท์: <?php echo $row['tel']; ?> </p>
      <p>เพศ: <?php if($row['gender']=='M') echo "ชาย"; else echo "หญืง" ?> </p>
      <p>อีเมล์: <?php echo $row['emaip']; ?> </p>
      <p>วันเกิด: <?php echo $row['DOB']; ?> </p>
   <h2>สถานะ </h2>
      <p>เงินเดือน: <?php echo $extra_row['salary']; ?> </p>
      <?php
         if($login_userType=='teacher') {
            echo "<p>คณะที่สังกัด:". $extra_row['faName']."</p>";
            echo "<p>ภาควิชา:". $extra_row['mName']." </p>";
         }
       if($login_userType=="teacher") {
         echo "<h2>วิชาที่สอน"."</h2>";
         while($course = $course_result ->fetch_assoc()) {
            echo "<p>". $course['cID']. " ";
            echo  $course['cName']. " ";
            echo  $course['secNo']. " ";
            echo  $course['term']. " ";
            echo  $course['year']. "</p>";
         }
      }
    ?>

</body>
</html>
