<?php
include('config.php');
include('converter.php');
// Check connection
if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "GET") {
   $basic_info = "SELECT * FROM personnel P,student S WHERE P.personalID = S.personalID AND S.personalID = {$_GET['id']}";
   $award_info = "SELECT earn_award.*,award.aName FROM earn_award
                  INNER JOIN award ON award.awardID=earn_award.awardID
                  and student_personalID= {$_GET['id']}";
   $advisor_info = "SELECT personnel.* FROM student, teacher,personnel where student.advisorID = teacher.personalID and student.personalID = {$_GET['id']} and personnel.personalID= teacher.personalID;";
   $advisor_result = mysqli_query($db,$advisor_info);
   #faName
   $faculty_info = "SELECT F.faName FROM student S,faculty F WHERE S.fID=F.fID and S.personalID={$_GET['id']}";
   $faculty_result = mysqli_query($db,$faculty_info);
   # actName,cat,date
   $activity_info = "SELECT A.* FROM participate P, activity A WHERE P.student_personalID={$_GET['id']} and P.aID=A.aID";
   $activity_result = mysqli_query($db,$activity_info);
   # yearEnd university country faculty
   $study_abroad_info = "SELECT S.yearEnd, S.university, S.country, S.faculty FROM study_abroad S WHERE S.student_personalID={$_GET['id']}";
   # startDate endDate company position
   $internship_info = "SELECT I.* FROM internship I WHERE I.student_personalID={$_GET['id']}";
   # pName pStatus
   $project_info = "SELECT P.pName, P.pStatus FROM monitor_project M, project P WHERE M.student_personalID={$_GET['id']} and M.pID=P.pID";
   # cName,credit,secNo,cId,term,year,attendace,grade
   $enroll_info = "SELECT C.cName, C.credit, E.secNo, E.cID, E.term,E.year, E.attendance, E.grade FROM enroll E, course C WHERE E.student_personalID={$_GET['id']} and E.cID=C.cID";
   //$xxxx_info = " " คำสั่งquery ตัวแปรยัดได้เลย แต่ถ้าตัวแปรเป็นarrayให้ใช้ { } ครอบ แบบข้างบน
   //$xxxx_result =  mysqli_query($db, $xxxx_info);
   $basic_result = mysqli_query($db, $basic_info);
   $award_result = mysqli_query($db, $award_info);
   $advisor_result = mysqli_query($db, $advisor_info);
   $basic_list = array("sID","fName","lName","gender","DOB","email","ADDR","tel","isSick","isPro","behavior");
   $award_list = array("term","year","aName");

}

?>


<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>ดูข้อมูลนิสิตรายบุคคล</title>
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
            if($i==8 || $i==9) {
               if($row[$basic_list[$i]]==0){
                  //icon for boolean status;
                  echo "<i class='fa fa-window-close'></i>";
               }
            }  else if($i==3) {
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
      //query award info
      while($row = $award_result->fetch_assoc()) {
         echo "RECEIVE AWARD!! <br>";
         for($i=0;$i<count($award_list);$i++){
            echo $convert[$award_list[$i]] . ": ";
            echo  $row[$award_list[$i]];
            echo "<br>";
         }
      }
      //query advisor name
      while($row = $advisor_result->fetch_assoc()) {
            echo "อาจารย์ที่ปรึกษา: ";
            echo  $row['fName']." ". $row['lName'];
            echo "<br>";
      }
      //query ต่อไปเรื่อยๆตรงนี้ format คล้ายๆข้างบน
      //while($row = $xxxx_result->fetch) {}
      //อาจจะต้องวนfor ถ้ามีหลายอัน ทำแบบข้างบนหรือแบบมึงก็ได้แหละ เอาแบบกลับมาอ่านง่ายพอๆ
   } else {
      echo "ไม่มีข้อมูลนิสิตส่งมา";
   }
   $db->close();
   ?>
</body>
</html>
