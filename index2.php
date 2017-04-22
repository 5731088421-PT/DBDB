<?php
include('config.php');
include('session.php');
// Check connection
if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "GET") {
   #students
   $student_query = "SELECT * FROM student LEFT JOIN earn_award ON student.personalID=earn_award.student_personalID";
   $student_result = mysqli_query($db, $student_query);
   #semesterYear
   $semester_year_query = "SELECT MIN(s.year) AS min, MAX(s.year) AS max FROM semester s";
   $semester_year_result = mysqli_query($db, $semester_year_query);
   $semester_year_row = $semester_year_result->fetch_assoc();
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
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <script>
  function getOverview(semesterYear) {
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("overviewInfo").innerHTML = this.responseText;
          }
      };
    xmlhttp.open("GET","getOverview.php?semesterYear="+semesterYear,true);
    xmlhttp.send();
  }

  </script>
</head>

<body onload='getOverview(<?php echo substr($semester_year_row['max']+543,2); ?>)'>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand">
          <image src="assets/img/logo.png" alt="DBDB">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="index2.php">ภาพรวม</a></li>
          <li><a href="student.php">ข้อมูลนิสิต</a></li>
          <li><a href="course.php">ข้อมูลรายวิชา</a></li>
          <li><a href="staff.php">ข้อมูลเจ้าหน้าที่</a></li>
          <a href='staff_detail.php' ><button class="btn btn-primary navbar-btn navbar-right" type="button"> <span class="glyphicon glyphicon-user"></span>บัญชีผู้ใช้</button></a>
        </ul>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-default"></nav>





  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="function-head-block">

          <div class="function-head-icon"><img src="assets/img/overview_icon.png" alt="Overview" /></div>
          <div class="function-head-text">Overview
            <div class="function-head-subtext">ภาพรวม คณะวิศวกรรมศาสตร์</div>
          </div>
          <div class="option-block">
            <div class="form-group">
              <label for="semesterYear">ปีการศึกษา</label>
              <select class="btn btn-primary" id="semesterYear" onchange="getOverview(this.value)">
                <?php
                  for($year = $semester_year_row['max']; $year >= $semester_year_row['min']; $year--) {
                    echo '<option value="'.substr($year+543,2).'">'.($year+543).'</option>';
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div id="overviewInfo"></div>
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
