<?php
//include('config.php');
include('session.php');
$year = $_GET['year'];
$term = $_GET['term'];
$cID = $_GET['cID'];
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $course_query = "SELECT Te.cID,cName,credit,accept_q,S.term,S.year,Te.secNo FROM teach Te,section S,course C WHERE Te.teacher_personalID = $login_personalID AND S.cID = C.cID AND C.cID = Te.cID AND S.term = $term AND S.year =$year AND C.cID =$cID";
    $course_result = mysqli_query($db, $course_query);
    $course_row = $course_result->fetch_assoc();
    $student_query = "SELECT S.sID,P.fName,P.personalID,P.lName,E.grade,E.attendance FROM enroll E,personnel P,student S WHERE P.personalID = E.student_personalID AND term= $term AND year= $year AND cID =$cID AND S.personalID = P.personalID";
    $student_result = mysqli_query($db, $student_query);
    $basic_info = "SELECT fName,lName FROM personnel WHERE personnel.personalID = $login_personalID";
    $basic_result = mysqli_query($db, $basic_info);
    $basic_row = $basic_result->fetch_assoc();
    $db->close();
}
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
  <link rel="stylesheet" href="assets/css/course_addsection.css">
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
        <a href='user_detail.php' ><button class="btn btn-primary navbar-btn active navbar-right" type="button"> <span class="glyphicon glyphicon-user" style="margin-right:5px;"></span>บัญชีผู้ใช้</button></a>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index2.php">ภาพรวม</a></li>
          <li><a href="student.php">ข้อมูลนิสิต</a></li>
          <li class="active"><a href="course.php">ข้อมูลรายวิชา</a></li>
          <li><a href="staff.php">ข้อมูลเจ้าหน้าที่</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-default"></nav>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--div class="function-head-block">
          <div class="option-block">
            <div class="dropdown">ปีการศึกษา
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">2559
                    <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#">2559</a></li>
                <li><a href="#">2558</a></li>
                <li><a href="#">2557</a></li>
              </ul>
            </div>
          </div-->
            <div class="function-head-icon"><img src="assets/img/course_detail_icon.png" alt="Course detail" /></div>
          <div class="function-head-text"><?php echo $course_row['cID']; ?>
            <div class="function-head-subtext"><?php echo $course_row['cName']; ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="col-md-12 data-box">
          <div class="data-box-header">
            ข้อมูลรายวิชา
          </div>
            <table style="width:100%;" class="dashboard-table">
              <tbody>
                <tr>
                  <td>
                    <span class="data-header">ผู้สอน : </span>
                    <?php echo $basic_row['fName'].' '.$basic_row['lName']; ?>

                  </td>
                </tr>
              </tbody>
            </table>

        </div>
      </div>
      <div class="col-md-4">
        <div class="col-md-12 data-box">
          <div class="data-box-header">
            สถานะ
          </div>
          <table style="width:95%;" class="dashboard-table">
            <tbody>
              <tr>
                <td>
                  <span class="data-header">ภาคการศึกษา : 2559/2</span>
                </td>
              </tr>
              <tr>
                  <form class="" action="addSection.php?cID=<?php echo $cID ?>" method="post">
                <td>
                  <span class="data-header">จำนวนที่เปิดรับ : </span>
                  <input  type="text" class="form-control" name="accept_q" placeholder="จำนวนนิสิต"></input>
                </td>
              </tr>

              <tr>

                <td>
                  <span class="data-header">ตอนเรียน : </span>
                  <input type="text" class="form-control" name="secNo" placeholder="ตอนเรียน"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </td>
              </tr>
            </form>
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
