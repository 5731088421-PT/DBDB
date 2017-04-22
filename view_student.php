<?php
include('config.php');
// Check connection
if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "GET") {
   #basic_info
   $info_query = "SELECT S.*,P.*,P2.fName as advName,P2.lName as advlName,F.faName FROM student S,personnel P,personnel P2,faculty F WHERE S.personalID = P.personalID AND P2.personalID = S.advisorID AND F.fID = S.fID AND S.personalID = {$_GET['id']}";
   #enroll
   $enroll_query = "SELECT * FROM enroll E,course C WHERE E.cID = C.cID AND E.student_personalID = {$_GET['id']} and term = 1 and year = 2015";
   #GPA
   $gpa_query = "SELECT student_personalID,SUM(grade*credit)/SUM(credit) AS GPA FROM enroll E,course C WHERE E.cID = C.cID AND E.student_personalID = {$_GET['id']} and term = 1 and year = 2015";
   $gpa_result = mysqli_query($db, $gpa_query);
   #award
   $award_query = "SELECT * FROM earn_award EA,award A WHERE EA.awardID = A.awardID AND EA.student_personalID = {$_GET['id']}";
   #internship
   $internship_query = "SELECT * FROM internship I WHERE I.student_personalID = {$_GET['id']}";
   #study_abroad
   $abroad_query = "SELECT * FROM study_abroad S WHERE S.student_personalID = {$_GET['id']}";
   #monitor_project
   $project_query = "SELECT pName,pStatus,TP.fName,TP.lName FROM monitor_project M,personnel SP,personnel TP,project P WHERE SP.personalID = M.student_personalID AND TP.personalID = M.teacher_personalID AND P.pID = M.pID AND M.student_personalID = {$_GET['id']}";
   #participate
   $activity_query = "SELECT * FROM participate P,activity A WHERE A.aID= P.aID AND P.student_personalID = {$_GET['id']}";
   $info_result = mysqli_query($db, $info_query);
   $enroll_result = mysqli_query($db, $enroll_query);
   $award_result = mysqli_query($db, $award_query);
   $internship_result = mysqli_query($db,$internship_query);
   $abroad_result = mysqli_query($db, $abroad_query);
   $project_result = mysqli_query($db,$project_query);
   $activity_result = mysqli_query($db,$activity_query);
}

?>


<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>ดูข้อมูลนิสิตรายบุคคล</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/2.0.4/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

   <?php
   if ($info_result->num_rows > 0) {
      $basic_info_row = $info_result->fetch_assoc();
         echo "XXX";
   if ($project_result->num_rows > 0) {
      $project_row = $project_result->fetch_assoc();
   }
   ?>
   <div class="row">
      <div class="col-10 offset-1">
         <div class="row">
            <div class="col-lg-9">
               <h3> ข้อมูลส่วนตัว </h3>
               <div class="row">
                  <div class="col-lg-12">
                     <p>ที่อยู่: <?php echo $basic_info_row['ADDR']; ?> </p>
                  </div>
                  <div class="col-lg-6">
                     <p>โทรศัพท์: <?php echo $basic_info_row['tel']; ?></p>
                  </div>
                  <div class="col-lg-6">
                     <p>เพศ: <?php if($basic_info_row['gender']=='M') echo 'ชาย'; else echo 'หญิง'; ?></p>
                  </div>
                  <div class="col-lg-6">
                     <p>อีเมล์: <?php echo $basic_info_row['email']; ?></p>
                  </div>
                  <div class="col-lg-6">
                     <p>วันเกิด:  <?php echo $basic_info_row['DOB']; ?></p></p>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <h2>สถานะ</h2>
               <p>คะแนนความประพฤติ: <?php echo $basic_info_row['behavior']; ?></p>
               <p>วิทยาทัณฑ์: <?php if($basic_info_row['isPro']==0) echo 'No'; else echo 'YES'; ?></p>
               <p>อีเมล์: <?php echo $basic_info_row['email']; ?></p>
            </div>
         </div>
      </div>
      <div class="col-10 offset-1">
         <div class="row">
            <div class="col-lg-12">
               <h2>ข้อมูลด้านการศึกษา</h2>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-4">
               <p>คณะที่สังกัด:  <?php echo $basic_info_row['faName']; ?></p></p>
            </div>
            <div class="col-lg-4">
               <p>Project:  <?php echo $project_row['pName']; ?></p></p>
            </div>
            <div class="col-lg-4">
               <p>สถานะ:  <?php echo $project_row['pStatus']; ?></p></p>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-4">
               <p>อาจารย์ที่ปรึกษา: <?php echo $basic_info_row['advName']." ". $basic_info_row['advlName']; ?></p>
            </div>
            <div class="col-lg-4">
               <p>ที่ปรึกษาโครงการ: <?php echo $project_row['fName']." ".$project_row['lName']; ?></p></p>
            </div>
         </div>
      </div>
      <div class="col-10 offset-1">
            <div class="row">
               <div class="col-lg-8">
                  <table class="table table-hover">
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
                     echo "<tr><td>".$gpa_result->fetch_assoc()['GPA']."</td></tr>";
                   ?>
                  </tbody>
               </table>
            </div>
            <div class="col-lg-4">
               <h2> รางวัลที่ได้รับ </h2>
               <?php
                  while($row = $award_result->fetch_assoc()) {
                     echo "<p>". 'รางวัลที่ได้รับ: '. $row['aName']. ' ในปีการศึกษาที่ '. $row['year']."</p>";
                  }
               ?>
            </div>
         </div>
      <div class="col-10 offset-1">
         <div class="row">
            <div class="col-lg-6">
               <h2>ประวัติฝึกงาน</h2>
               <?php
                  while($row = $internship_result->fetch_assoc()) {
                     echo "<p>บริษัท: ". $row['company']. "</p>";
                     echo "<p>ตำแหน่ง: ". $row['position']. "</p>";
                     echo "<p>วันที่เริ่ม: ". $row['startDate']. "</p>";
                     echo "<p>วันที่สิ้นสุด: ". $row['endDate']. "</p>";
                  }
               ?>
            </div>
            <div class="col-lg-6">
               <h2>ลาศึกษาต่อต่างประเทศ</h2>
               <?php
                  while($row = $abroad_result->fetch_assoc()) {
                     echo "<p>มหาวิทยาลัย: ". $row['university']. "</p>";
                     echo "<p>ประเทศ: ". $row['country']. "</p>";
                     echo "<p>คณะ: ". $row['faculty']. "</p>";
                     echo "<p>ปีที่สิ้นสุด: ". $row['yearEnd']. "</p>";
                  }
               ?>


            </div>
         </div>
      </div>
      <div class="col-10 offset-1">
         <div class="row">
            <div class="col-lg-6">
               <h2>กิจกรรมที่เข้าร่วม </h2>
               <?php
                  while($row = $activity_result->fetch_assoc()) {
                     echo "<p>ชื่อกิจกรรม: ". $row['actName']. "</p>";
                     echo "<p>ประเภท: ". $row['cat']. "</p>";
                     echo "<p>วันที่เข้าร่วม: ". $row['date']. "</p>";
                  }
               ?>
            </div>
         </div>
      </div>
   </div>
   <?php
   }
   else {
      echo "<h2>ไม่มีข้อมูลที่ได้รับ</h2>";
   }
   $db->close();
   ?>
</body>
</html>
