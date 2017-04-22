<?php
include('config.php');
// Check connection
if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "GET") {
   #basic_info
   $info_query = "SELECT S.*,P.*,P2.fName as advName,P2.lName as advlName,M.mName,F.faName,getAge(P.DOB) AS age FROM student S,personnel P,personnel P2,major M,faculty F WHERE S.personalID = P.personalID AND P2.personalID = S.advisorID AND M.mID = S.mID  AND S.personalID = {$_GET['id']}";
   #enroll
   $enroll_query = "SELECT * FROM enroll E,course C WHERE E.cID = C.cID AND E.student_personalID = {$_GET['id']} and year = 2015 and term = 1";
   #enroll_year
   $enroll_year_query = "SELECT MIN(enroll.year) AS min, MAX(enroll.year) AS max FROM enroll WHERE student_personalID = {$_GET['id']}";
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
   $enroll_year_result = mysqli_query($db, $enroll_year_query);
   $award_result = mysqli_query($db, $award_query);
   $internship_result = mysqli_query($db,$internship_query);
   $abroad_result = mysqli_query($db, $abroad_query);
   $project_result = mysqli_query($db,$project_query);
   $activity_result = mysqli_query($db,$activity_query);
}

if ($info_result->num_rows > 0) {
   $basic_info_row = $info_result->fetch_assoc();
}
if ($project_result->num_rows > 0) {
   $project_row = $project_result->fetch_assoc();
}
if ($internship_result->num_rows > 0) {
   $internship_row = $internship_result->fetch_assoc();
}
if ($abroad_result->num_rows > 0) {
   $abroad_row = $abroad_result->fetch_assoc();
}
if ($enroll_year_result->num_rows > 0) {
   $enroll_year_row = $enroll_year_result->fetch_assoc();
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
  <link rel="stylesheet" href="assets/css/student_detail.css">
  <script>
  function getEnroll(id, year, term) {
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("enrollInfo").innerHTML = this.responseText;
          }
      };
    xmlhttp.open("GET","getEnroll.php?id="+id+"&year="+year+"&term="+term,true);
    xmlhttp.send();
  }
  </script>
</head>

<body onload = 'getEnroll(<?php echo $_GET['id']; ?>, <?php echo $enroll_year_row['max']; ?>, 1)'>
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
          <li class="active"><a href="student.php">ข้อมูลนิสิต</a></li>
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
          <div class="option-block">
            <div class="form-group">
              <label for="year">ปีการศึกษา</label>
              <select class="btn btn-primary" id="year" onchange="getEnroll(<?php echo $_GET['id']; ?>, this.value, term.value)">
                <?php
                  for($year = $enroll_year_row['max']; $year >= $enroll_year_row['min']; $year--) {
                    echo '<option value="'.$year.'">'.($year+543).'</option>';
                  }
                ?>
              </select>
              &nbsp;&nbsp;
              <label for="term">ภาคการศึกษา</label>
              <select class="btn btn-primary" id="term" onchange="getEnroll(<?php echo $_GET['id']; ?>, year.value ,this.value)">
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
            </div>
          </div>
          <div class="function-head-icon"><img src="assets/img/student_detail_icon.png" alt="Student detail" /></div>
          <div class="function-head-text"><?php echo $basic_info_row['sID']; ?>
            <div class="function-head-subtext"><?php echo $basic_info_row['fName'].' '.$basic_info_row['lName']; ?></div>
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
                <span class="data-detail"><?php echo $basic_info_row['ADDR']; ?></span>
              </td>
              </tr>
              <tr>
                <td>
                  <span class="data-header">โทรศัพท์ : </span>
                  <span class="data-detail"><?php echo $basic_info_row['tel']; ?></span>
                </td>
                <td>
                  <span class="data-header">เพศ : </span>
                  <span class="data-detail"><?php if($basic_info_row['gender']=='M') echo 'ชาย'; else echo 'หญิง'; ?></span>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="data-header">อีเมล์ : </span>
                  <span class="data-detail"><?php echo $basic_info_row['email']; ?></span>
                </td>
                <td>
                  <span class="data-header">อายุ : </span>
                  <span class="data-detail"><?php echo $basic_info_row['age']; ?></span>
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
                  <span class="data-detail"><?php echo $basic_info_row['behavior']; ?></span></span>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="data-header">วิทยาฑัณท์ : </span>
                  <span class="data-detail">
                    <?php
                      if($basic_info_row['isPro'])
                        echo '<i class="glyphicon glyphicon-ok"></i>';
                      else
                        echo '<i class="glyphicon glyphicon-remove"></i>';
                    ?>
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="data-header">การป่วย : </span>
                  <span class="data-detail">
                    <?php
                      if($basic_info_row['isSick'])
                        echo '<i class="glyphicon glyphicon-ok"></i>';
                      else
                        echo '<i class="glyphicon glyphicon-remove"></i>';
                    ?>
                  </span>
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
                  <span class="data-detail"><?php echo $basic_info_row['faName']; ?></span>
                </td>
                <td>
                  <span class="data-header">อาจารย์ที่ปรึกษา : </span>
                  <span class="data-detail"><?php echo $basic_info_row['advName'].' '.$basic_info_row['advlName']; ?></span>
                </td>
                <td>
                  <span class="data-header">Project : </span>
                  <span class="data-detail">
                    <?php
                      if(is_null($project_row['pName']))
                        echo '<i class="glyphicon glyphicon-exclamation-sign"></i>';
                      else
                        echo $project_row['pName'];
                    ?>
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="data-header">ภาควิชา : </span>
                  <span class="data-detail"><?php echo $basic_info_row['mName']; ?></span>
                </td>
                <td>
                  <span class="data-header">สถานะ Project : </span>
                  <span class="data-detail">
                    <?php
                      if(is_null($project_row['pStatus']))
                        echo '<i class="glyphicon glyphicon-exclamation-sign"></i>';
                      else
                        echo $project_row['pStatus'];
                    ?>
                  </span>
                </td>
                <td>
                  <span class="data-header">ที่ปรึกษา Project : </span>
                  <span class="data-detail">
                    <?php
                      if(is_null($project_row['fName']))
                        echo '<i class="glyphicon glyphicon-exclamation-sign"></i>';
                      else
                        echo $project_row['fName'].' '.$project_row['lName'];
                    ?>
                  </span>
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
      <div id="enrollInfo"></div>
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
                <span class="data-detail"><?php echo $internship_row['company']; ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="data-header">ตำแหน่ง : </span>
                <span class="data-detail"><?php echo $internship_row['position']; ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="data-header">วันที่เริ่มต้น : </span>
                <span class="data-detail"><?php echo $internship_row['startDate']; ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="data-header">วันที่สิ้นสุด : </span>
                <span class="data-detail"><?php echo $internship_row['endDate']; ?></span>
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
                <span class="data-header">ชื่อสถานศึกษา : </span>
                <span class="data-detail"><?php echo $abroad_row['university']; ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="data-header">ประเทศ : </span>
                <span class="data-detail"><?php echo $abroad_row['country']; ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="data-header">คณะที่สังกัด : </span>
                <span class="data-detail"><?php echo $abroad_row['faculty']; ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <span class="data-header">ปีที่ศึกษาจบ : </span>
                <span class="data-detail"><?php echo $abroad_row['yearEnd']+543; ?></span>
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
