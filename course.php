<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DBDB | Student Management System</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/theme.css">
  <link rel="stylesheet" href="assets/css/course.css">
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
        <a href='staff_detail.php' ><button class="btn btn-primary navbar-btn navbar-right" type="button"> <span class="glyphicon glyphicon-user"></span>บัญชีผู้ใช้</button></a>
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
        <div class="function-head-block">
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
          </div>
          <div class="function-head-icon"><img src="assets/img/course_icon.png" alt="Course" /></div>
          <div class="function-head-text">Course
            <div class="function-head-subtext">ข้อมูลรายวิชา</div>
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
                <th style="width:100px;">รหัสวิชา</th>
                <th style="min-width:100px;">ชื่อวิชา</th>
                <th style="width:90px;">ตอนเรียน</th>
                <th style="width:100px;">ประเภท</th>
                <th style="width:90px;">จำนวนนิสิต</th>
                <th style="width:260px;">การดำเนินการ</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <div class="student-row-box">
                    <td>1</td>
                    <td>2110318</td>
                    <td>DIS SYS ESSEN</td>
                    <td>1</td>
                    <td>APPROVE</td>
                    <td>30</td>
                    <td>
                      <button class="btn btn-detail">ดูข้อมูล</button>
                      <button class="btn btn-detail">เพิ่มตอนเรียน</button>
                      <button class="btn btn-delete">ลบ</button>
                    </td>
                </div>
              </tr>
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
