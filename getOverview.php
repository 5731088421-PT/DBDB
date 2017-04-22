<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <?php
    include('config.php');
    if ($db->connect_error) {
       die("Connection failed: " . $db->connect_error);
    }
    if($_SERVER["REQUEST_METHOD"] == "GET") {
      #students
      $student_query = "SELECT * FROM student LEFT JOIN earn_award ON student.personalID=earn_award.student_personalID";
      $student_result = mysqli_query($db, $student_query);

      function makeOverview($semesterYear) {
        $student_result = $GLOBALS['student_result'];
        $overview = null;
        if ($student_result->num_rows > 0) {
          while($student_row = $student_result->fetch_assoc()) {
            $year = $semesterYear - (int)substr($student_row['sID'],0,2) + 1;
            if(is_null($overview) || !array_key_exists($year,$overview)) {
              //[0,0,0,0] => [amount, intermission, probation, award]
              $overview[$year] = [0,0,0,0];
            }
            $overview[$year][0]+=1; //increase amount
            if($student_row['isSick']) {
              $overview[$year][1]+=1;
            }
            if($student_row['isPro']) {
              $overview[$year][2]+=1;
            }
            if(!is_null($student_row['awardID'])) {
              $overview[$year][3]+=1;
            }
          }
        }
        ksort($overview);
        return $overview;
      }

      $overview = makeOverview((int) $_GET['semesterYear']);

      foreach($overview as $year => $info) {
        echo '<div class="col-md-3">
          <div class="col-md-12 data-box">
            <button class="btn info-btn">
              ดูเพิ่มเติม
            </button>
            <div class="data-box-header">
              ชั้นปีที่ '.$year.'
            </div>

            <table style="width:100%;" class="dashboard-table">
              <tbody>
                <tr>
                  <td>จำนวนนิสิต</td>
                  <td>'.$info[0].'</td>
                </tr>
                <tr>
                  <td>ลาพักการศึกษา</td>
                  <td>'.$info[1].'</td>
                </tr>
                <tr>
                  <td>วิทยาฑัณท์</td>
                  <td>'.$info[2].'</td>
                </tr>
                <tr>
                  <td>รางวัลที่ได้รับ</td>
                  <td>'.$info[3].'</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>';
      }

    }
    ?>
  </body>
</html>
