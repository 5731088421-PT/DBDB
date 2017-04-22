<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBDB | Student Management System</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/student_detail.css">
  </head>
  <body>
    <?php
    include('config.php');
    if ($db->connect_error) {
       die("Connection failed: " . $db->connect_error);
    }
    if($_SERVER["REQUEST_METHOD"] == "GET") {
       #enroll
       $enroll_query = "SELECT * FROM enroll E,course C
       WHERE E.cID = C.cID AND E.student_personalID = {$_GET['id']} and year = {$_GET['year']} and term = {$_GET['term']}";
       #gpa
       $gpa_query = "SELECT S.personalID,calGPA(S.personalID,{$_GET['term']},{$_GET['year']}) as GPA FROM student S WHERE S.personalID = {$_GET['id']}";
       $enroll_result = mysqli_query($db, $enroll_query);
       $gpa_result = mysqli_query($db,$gpa_query);
       $gpa = $gpa_result->fetch_assoc();
    }
    ?>
       <table class="course-table">
         <thead>
           <tr>
             <th>รหัสวิชา</th>
             <th>วิชา</th>
             <th>หน่วยกิต</th>
             <th>ตอนเรียน</th>
             <th>ผลการศึกษา</th>
           </tr>
         </thead>
         <tbody>
       <?php
          while($row = $enroll_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>". $row['cID']."</td>";
                echo "<td>". $row['cName']."</td>";
                echo "<td>". $row['credit']."</td>";
                echo "<td>". $row['secNo']."</td>";
                echo "<td>". $row['grade']."</td>";
                echo "</tr>";
          }
        ?>
       </tbody>
     </table>
     <?php
        if($gpa['GPA']) {
          echo "<span class='data-header'>GPA : </span>
                <span class='data-detail'> {$gpa['GPA']} </span>";
        }
      ?>
  </body>
</html>
