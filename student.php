<?php
include('config.php');
include('session.php');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if (!$_GET['pagenum']) {
    $pagenum = 0;
}
$offset = 5 * intval($pagenum);

$basic_info = "SELECT P.personalID,P.fName,P.lName,S.sID FROM personnel P,student S WHERE P.personalID = S.personalID AND S.advisorID = $login_personalID";

$basic_result = mysqli_query($db, $basic_info);
$sql2 = "SELECT count(*) as total FROM personnel P,student S WHERE P.personalID = S.personalID AND S.advisorID = {$login_personalID}";
$size = mysqli_fetch_array((mysqli_query($db, $sql2)), MYSQLI_ASSOC)["total"];
$term = 1;
$year = 2015;
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
  <link rel="stylesheet" href="assets/css/student.css">
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand">
          <image src="assets/img/logo.png" alt="DBDB">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
        <a href='user_detail.php' ><button class="btn btn-primary navbar-btn navbar-right" type="button"> <span class="glyphicon glyphicon-user" style="margin-right:5px;"></span>บัญชีผู้ใช้</button></a>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index2.php">ภาพรวม</a></li>
          <li class="active"><a href="student.php">ข้อมูลนิสิต</a></li>
          <li><a href="course.php">ข้อมูลรายวิชา</a></li>
          <li><a href="staff.php">ข้อมูลเจ้าหน้าที่</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-default"></nav>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="function-head-block">
     <!--<div class="option-block">
            <div class="dropdown">ปีการศึกษา
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">2559
                    <span class="caret"></span></button>
             <ul class="dropdown-menu">
                <li><a href="#">2559</a></li>
                <li><a href="#">2558</a></li>
                <li><a href="#">2557</a></li>
              </ul>
            </div>
          </div>-->
          <div class="function-head-icon"><img src="assets/img/student_icon.png" alt="Student" /></div>
          <div class="function-head-text">Student
            <div class="function-head-subtext">ข้อมูลนิสิต</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12">
          <table style="width:100%;" class="student-table">

            <thead>
              <tr>
                <th style="width:70px; text-align:center;"></th>
                <th style="width:150px;">รหัสนิสิต</th>
                <th style="min-width:100px;">ชื่อ-สกุล</th>
                <!--th style="width:100px;">GPA</th-->
                <th style="width:100px;">ลาศึกษาต่อ</th>
                <th style="width:100px;">พักการศึกษา</th>
                <th style="width:145px;">การดำเนินการ</th>
              </tr>
            </thead>

            <tbody>
              <?php
                $i=1;
                while ($row = $basic_result->fetch_assoc()) {
                    $abroad = "SELECT count(*) AS isAbroad FROM study_abroad A WHERE  A.student_personalID = {$row['personalID']} AND yearEnd > $year";
                    $intermission ="SELECT SUM(isNotEnd(endDate)) AS isIntermission FROM intermission GROUP BY student_personalID HAVING student_personalID = {$row['personalID']}";
                    $abroad_result = mysqli_query($db, $abroad);
                    $intermission_result = mysqli_query($db, $intermission);
                    if ($abroad_result->num_rows>0) {
                        $abroadrow =$abroad_result->fetch_assoc();
                        $isAbroad = $abroadrow['isAbroad'];
                    } else {
                        $isAbroad = 0;
                    }
                    if ($intermission_result->num_rows>0) {
                        $intermissionrow =$intermission_result->fetch_assoc();
                        $isIntermission = $intermissionrow['isIntermission'];
                    } else {
                        $isIntermission =0;
                    }
                    echo "              <tr>
                                    <div class='student-row-box'>
                                        <td>".$i++."</td>
                                        <td>".$row['sID']."</td>
                                        <td>".$row['fName']." ".$row['lName']."</td>";
                                        //<!--td>3.99</td-->
                  if ($isAbroad) {
                      echo "<td><i class='glyphicon glyphicon-ok'></i></td>";
                  } else {
                      echo "<td><i class='glyphicon glyphicon-remove'></i></td>";
                  }
                    if ($isIntermission) {
                        echo "<td><i class='glyphicon glyphicon-ok'></i></td>";
                    } else {
                        echo "<td><i class='glyphicon glyphicon-remove'></i></td>";
                    }
                    echo                   "<td>
                                          <a href='student_detail.php?id=".$row['personalID']."' ><button class='btn btn-detail'>ดูข้อมูล</button></a>
                                          <a href='student_delete.php?id=".$row['personalID']."' ><button class='btn btn-delete' type=submit>ลบ</button></a>
                                        </td>
                                    </div>
                                  </tr>";
                }
            ?>
            </tbody>
          </table>
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
