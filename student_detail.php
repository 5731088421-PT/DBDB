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
          <div class="function-head-text">5731088421
            <div class="function-head-subtext">นาย ภานุพงศ์ ทองธวัช</div>
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
                <span class="data-detail">254 ถนน พญาไท แขวง วังใหม่ เขต ปทุมวัน กรุงเทพมหานคร 10330</span>
              </td>
              </tr>
              <tr>
                <td>
                  <span class="data-header">โทรศัพท์ : </span>
                  <span class="data-detail">02 215 3555</span>
                </td>
                <td>
                  <span class="data-header">เพศ : </span>
                  <span class="data-detail">ชาย</span>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="data-header">อีเมล์ : </span>
                  <span class="data-detail">Panupong.not@hotmail.com</span>
                </td>
                <td>
                  <span class="data-header">อายุ : </span>
                  <span class="data-detail">21</span>
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
                  <span class="data-header">คะแนนความประพฤติ : </span>
                  <span class="data-detail">100</span>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="data-header">วิทยาฑัณท์ : </span>
                  <span class="data-detail"><i class="glyphicon glyphicon-remove"></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="data-header">การป่วย : </span>
                  <span class="data-detail"><i class="glyphicon glyphicon-ok"></i></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      <div class="col-md-12 data-box">
        <div class="data-box-header">
          ข้อมูลด้านการศึกษา
        </div>
          <table style="width:100%;" class="dashboard-table">
            <tbody>
              <tr>
                <td>
                  <span class="data-header">คณะที่สังกัด : </span>
                  <span class="data-detail">วิศวกรรมศาสตร์</span>
                </td>
                <td>
                  <span class="data-header">อาจารย์ที่ปรึกษา : </span>
                  <span class="data-detail">ผศ. ดร. วิษณุ โคตรจรัส</span>
                </td>
                <td>
                  <span class="data-header">Project : </span>
                  <span class="data-detail"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="data-header">ภาควิชา : </span>
                  <span class="data-detail">คอมพิวเตอร์</span>
                </td>
                <td>
                  <span class="data-header">สถานะ Project : </span>
                  <span class="data-detail"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
                </td>
                <td>
                  <span class="data-header">ที่ปรึกษา Project : </span>
                  <span class="data-detail"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
    <div class="col-md-12 data-box">
      <div class="data-box-header">
        วิชาที่ลงทะเบียน
      </div>
        <table class="course-table">
          <thead>
            <th>รหัสวิชา</th>
            <th>ชื่อวิชา</th>
            <th>หน่วยกิต</th>
            <th>ตอนเรียน</th>
            <th>ผลการศึกษา</th>
          </thead>
          <tbody>
            <tr>
              <td>
                2110318
              </td>
              <td>
                DIS SYS ESSEN
              </td>
              <td>
                1
              </td>
              <td>
                33
              </td>
              <td>
                A
              </td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="col-md-12 data-box">
      <div class="data-box-header">
        การฝึกงาน
      </div>
        <table style="width:100%;" class="dashboard-table">
          <tbody>
            <tr>
              <td>
                <span class="data-header">หน่วยงาน : </span>
                <span class="data-detail">บริษัท ช.การช่าง จํากัด (มหาชน)</span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="data-header">ตำแหน่ง : </span>
                <span class="data-detail">CEO</span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="data-header">วันที่เริ่มต้น : </span>
                <span class="data-detail">2 มิถุนายน 2560</span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="data-header">วันที่สิ้นสุด : </span>
                <span class="data-detail">29 มิถุนายน 2560</span>
              </td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
  <div class="col-md-6">
    <div class="col-md-12 data-box">
      <div class="data-box-header">
        ลาศึกษาต่อต่างประเทศ
      </div>
        <table style="width:100%;" class="dashboard-table">
          <tbody>
            <tr>
              <td>
                <span class="data-header">ชื่อกิจกรรม : </span>
                <span class="data-detail">จุฬาฯ Expo 2017</span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="data-header">ประเภท : </span>
                <span class="data-detail">กิจกรรมวิชาการ</span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="data-header">วันที่ : </span>
                <span class="data-detail">15 มีนาคม 2559</span>
              </td>
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
