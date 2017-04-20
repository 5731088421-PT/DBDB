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
        <ul class="nav navbar-nav navbar-right">
          <li><a href="dashboard.php">ภาพรวม</a></li>
          <li class="active"><a href="student.php">ข้อมูลนิสิต</a></li>
          <li><a href="#">ข้อมูลรายวิชา</a></li>
          <li><a href="#">ข้อมูลเจ้าหน้าที่</a></li>
          <button class="btn btn-primary navbar-btn navbar-right" type="button"><span class="glyphicon glyphicon-user"></span>บัญชีผู้ใช้</button>
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
          <div class="function-head-icon"><img src="assets/img/student_detail_icon.png" alt="Student detail" /></div>
          <div class="function-head-text">Student
            <div class="function-head-subtext">ข้อมูลนิสิต</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12">
          <table style="width:100%;" class="student-table">

            <thead>
              <tr>
                <th style="width:70px; text-align:center;"></th>
                <th style="min-width:100px;">ชื่อ-สกุล</th>
                <th style="width:60px;">GPA</th>
                <th style="width:145px;">การดำเนินการ</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <div class="student-row-box">
                    <td>1</td>
                    <td>นายภานุพงศ์ ทองธวัช</td>
                    <td>3.99</td>
                    <td>
                      <button class="btn btn-detail"><a href="#">ดูข้อมูล</a></button>
                      <button class="btn btn-delete"><a href="#">ลบ</a></button>
                    </td>
                </div>
              </tr>
              <tr>
                <div class="student-row-box">
                  <td>3</td>
                  <td>นายภานุพงศ์ ทองธวัช</td>
                  <td>3.99</td>
                  <td>
                    <button class="btn btn-detail"><a href="#">ดูข้อมูล</a></button>
                    <button class="btn btn-delete"><a href="#">ลบ</a></button>
                  </td>
                </div>
              </tr>
              <tr>
                <div class="student-row-box">
                  <td>5</td>
                  <td>นายภานุพงศ์ ทองธวัช</td>
                  <td>3.99</td>
                  <td>
                    <button class="btn btn-detail"><a href="#">ดูข้อมูล</a></button>
                    <button class="btn btn-delete"><a href="#">ลบ</a></button>
                  </td>
                </div>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-6">
        <div class="col-md-12">
          <table style="width:100%;" class="student-table">

            <thead>
              <tr>
                <th style="width:70px; text-align:center;"></th>
                <th style="min-width:100px;">ชื่อ-สกุล</th>
                <th style="width:60px;">GPA</th>
                <th style="width:145px;">การดำเนินการ</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <div class="student-row-box">
                    <td>2</td>
                    <td>นายภานุพงศ์ ทองธวัช</td>
                    <td>3.99</td>
                    <td>
                      <button class="btn btn-detail"><a href="#">ดูข้อมูล</a></button>
                      <button class="btn btn-delete"><a href="#">ลบ</a></button>
                    </td>
                </div>
              </tr>
              <tr>
                <div class="student-row-box">
                  <td>4</td>
                  <td>นายภานุพงศ์ ทองธวัช</td>
                  <td>3.99</td>
                  <td>
                    <button class="btn btn-detail"><a href="#">ดูข้อมูล</a></button>
                    <button class="btn btn-delete"><a href="#">ลบ</a></button>
                  </td>
                </div>
              </tr>
              <tr>
                <div class="student-row-box">
                  <td>6</td>
                  <td>นายภานุพงศ์ ทองธวัช</td>
                  <td>3.99</td>
                  <td>
                    <button class="btn btn-detail"><a href="#">ดูข้อมูล</a></button>
                    <button class="btn btn-delete"><a href="#">ลบ</a></button>
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
