<?php
include('config.php');
include('session.php');
// Check connection
if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "GET") {
  if($_GET['id']) {
    $query_personalID = $_GET['id'];
  } else {
    $query_personalID = $login_personalID;
  }
   $basic_info = "SELECT *,getAge(DOB) AS age FROM personnel WHERE personnel.personalID = $query_personalID";
   $course_info = "SELECT * FROM teach T,course C WHERE teacher_personalID = $query_personalID AND C.cID = T.cID";
   $basic_result = mysqli_query($db, $basic_info);
   $course_result = mysqli_query($db,$course_info);
   $row = $basic_result->fetch_assoc();
   $query_userType = findUserType($query_personalID,$db);
   if($query_userType  == 'teacher') {
      $extra_info = "SELECT mName,salary,expert,faName FROM teacher T,major M,faculty F WHERE T.mID = M.mID AND F.fID = M.fID AND T.personalID = $query_personalID";
   } else {
      $extra_info = "SELECT * FROM staff WHERE staff.personalID = $query_personalID";
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DBDB | Student Management System</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/theme.css">
  <link rel="stylesheet" href="assets/css/staff_detail.css">
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
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index2.php">ภาพรวม</a></li>
          <li><a href="student.php">ข้อมูลนิสิต</a></li>
          <li><a href="course.php">ข้อมูลรายวิชา</a></li>
          <li  <?php if($_GET['id']) echo "class = 'active'"; ?>><a href="staff.php">ข้อมูลเจ้าหน้าที่</a></li>
          <a href='staff_detail.php' ><button class="btn btn-primary navbar-btn navbar-right <?php if(!$_GET['id']) echo ' active'; ?>" type="button"> <span class="glyphicon glyphicon-user"></span>บัญชีผู้ใช้</button></a>
        </ul>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-default"></nav>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="function-head-block">
          <!--div class="option-block">
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
            <div class="function-head-icon"><img src="assets/img/staff_detail_icon.png" alt="Staff detail" /></div>
          <div class="function-head-text"><?php echo $row['personalID']; ?>
            <div class="function-head-subtext"><?php echo $row['fName']." ".$row['lName']; ?></div>
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
            ข้อมูลส่วนตัว
          </div>
          <table style="width:100%;" class="dashboard-table">
            <tbody>
              <tr>
                <td colspan="2">
                <span class="data-header">ที่อยู่ : </span>
                <span class="data-detail"><?php echo $row['ADDR']; ?></span>
              </td>
              </tr>
              <tr>
                <td>
                  <span class="data-header">โทรศัพท์ : </span>
                  <span class="data-detail"><?php echo $row['tel']; ?></span>
                </td>
                <td>
                  <span class="data-header">เพศ : </span>
                  <span class="data-detail"><?php if($row['gender']=='M') echo "ชาย"; else echo "หญิง" ?></span>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="data-header">อีเมล์ : </span>
                  <span class="data-detail"><?php echo $row['email']; ?></span>
                </td>
                <td>
                  <span class="data-header">อายุ : </span>
                  <span class="data-detail"><?php echo $row['age']; ?></span>
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
          <table style="width:100%;" class="dashboard-table">
            <tbody>
              <tr>
                <td>
                  <span class="data-header">เงินเดือน : </span>
                  <span class="data-detail"><?php echo $extra_row['salary']; ?></span>
                </td>
              </tr>

              <?php
                if($query_userType=='teacher') {
                echo '  <tr>
                          <td>
                            <span class="data-header">คณะที่สังกัด :</span>
                            <span class="data-detail">' . $extra_row['faName'].'</span>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <span class="data-header">ภาควิชา : </span>
                            <span class="data-detail">' . $extra_row['mName'].'</span>
                          </td>
                        </tr>
                        <tr>';
              } else {
                echo ' <td>
                          <span class="data-header">ตำแหน่ง : </span>
                          <span class="data-detail">'. $extra_row['position'].'</span>
                        </td>';
              }
            ?>

              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php
    if($query_userType=='teacher') {
        echo '    <div class="row">
              <div class="col-md-8">
              <div class="col-md-12 data-box">
                <div class="data-box-header">
                  วิชาทีสอน
                </div>
                  <table class="course-table">
                    <thead>
                      <th>รหัสวิชา</th>
                      <th>ชื่อวิชา</th>
                      <th>ตอนเรียน</th>
                    </thead>
                    <tbody>';
            echo '    <tr>
                        <td>
                          2110318
                        </td>
                        <td>
                          DIS SYS ESSEN
                        </td>
                        <td>
                          33
                        </td>
                      </tr>';

            echo   '</tbody>
                  </table>
              </div>
            </div>
          </div>';
    }
     ?>

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
