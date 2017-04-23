<?php
include('config.php');
include('session.php');
// Check connection
if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "GET") {
   #min, max year
   $teach_year_query = "SELECT MIN(t.year) AS min, MAX(t.year) AS max FROM teach t WHERE t.teacher_personalID = $login_personalID";
   $teach_year_result = mysqli_query($db, $teach_year_query);
}

if ($teach_year_result->num_rows > 0) {
   $teach_year_row = $teach_year_result->fetch_assoc();
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
  <link rel="stylesheet" href="assets/css/course.css">
  <script>
  function getCourse(id, year, term) {
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("courseInfo").innerHTML = this.responseText;
          }
      };
    xmlhttp.open("GET","getCourse.php?id="+id+"&year="+year+"&term="+term,true);
    xmlhttp.send();
  }
  </script>
</head>

<body onload = "getCourse(<?php echo $login_personalID.','.$teach_year_row['max']; ?>, 1)">
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
          <li class="active"><a href="course.php">ข้อมูลรายวิชา</a></li>
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
          <div class="option-block">
            <div class="form-group">
              <label for="year">ปีการศึกษา</label>
              <select class="btn btn-primary" id="year" onchange="getCourse(<?php echo $login_personalID; ?>, this.value, term.value)">
                <?php
                  for($year = $teach_year_row['max']; $year >= $teach_year_row['min']; $year--) {
                    echo '<option value="'.$year.'">'.($year+543).'</option>';
                  }
                ?>
              </select>
              &nbsp;&nbsp;
              <label for="term">ภาคการศึกษา</label>
              <select class="btn btn-primary" id="term" onchange="getCourse(<?php echo $login_personalID; ?>, year.value ,this.value)">
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
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
          <div id="courseInfo"></div>
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
