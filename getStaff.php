<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBDB | Student Management System</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/css/staff.css">
  </head>
  <body>
    <table style="width:100%;" class="student-table">

      <thead>
        <tr>
          <th style="width:70px; text-align:center;"></th>
          <th style="width:150px;">รหัสบุคลากร</th>
          <th style="min-width:100px;">ชื่อ-สกุล</th>
          <th style="width:120px;">เงินเดือน</th>
          <th style="width:150px;">ตำแหน่ง</th>
          <th style="width:190px;">หน่วยงานที่สังกัด</th>
          <th style="width:145px;">การดำเนินการ</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include('config.php');
        if ($db->connect_error) {
           die("Connection failed: " . $db->connect_error);
        }
        if($_SERVER["REQUEST_METHOD"] == "GET") {
           #staff list
           $staff = "SELECT P.personalID,P.fName,P.lName,S.salary,S.position FROM staff S,personnel P WHERE S.personalID = P.personalID";
           $staff_result = mysqli_query($db,$staff);

        }

        if($_GET['type']=='teacher')
          echo "อาจารย์";
        else if($_GET['type']=='staff')
          echo "เจ้าหน้าที่";
        else if($_GET['type']=='executive')
          echo "ผู้บริหาร";
        if($staff_result->num_rows) {
          while($row = $staff_result->fetch_assoc()) {
            echo
            "<tr>
              <div class='student-row-box'>
                  <td>".$i."</td>
                  <td>".$row['personalID']."</td>
                  <td>".$row['fName']." ".$row['lName']."</td>
                  <td>".$row['salary']."</td>
                  <td>".$row['position']."</td>
                  <td>คณะวิศวกรรมศาสตร์</td>
                  <td>
                    <a href='staff_detail.php?id={$row['personalID']}'><button class='btn btn-detail'>ดูข้อมูล</button></a>
                    <button class='btn btn-delete'>ลบ</button>
                  </td>
              </div>
            </tr>";
          }
        }
        /*
        $i = 1;
        if($staff_result->num_rows>0){
          while($row = $staff_result->fetch_assoc()) {
            echo
            '<tr>
              <div class="student-row-box">
                  <td>'.$i.'</td>
                  <td>5731088421</td>
                  <td>นาย ภานุพงศ์ ทองธวัช</td>
                  <td>99,999</td>
                  <td>คณะบดี</td>
                  <td>คณะวิศวกรรมศาสตร์</td>
                  <td>
                    <button class="btn btn-detail">ดูข้อมูล</button>
                    <button class="btn btn-delete">ลบ</button>
                  </td>
              </div>
            </tr>';
          }

        }
        */

      ?>
      </tbody>
    </table>


</body>
</html>
