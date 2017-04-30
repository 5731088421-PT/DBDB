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
    <table style="width:100%;" class="student-table">

      <thead>
        <tr>
          <th style="width:70px; text-align:center;"></th>
          <th style="width:100px;">รหัสวิชา</th>
          <th style="min-width:100px;">ชื่อวิชา</th>
          <th style="width:90px;">ตอนเรียน</th>
          <th style="width:90px;">จำนวนนิสิต</th>
          <th style="width:260px;">การดำเนินการ</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include('config.php');
        if ($db->connect_error) {
           die("Connection failed: " . $db->connect_error);
        }
        if($_SERVER["REQUEST_METHOD"] == "GET") {
           #course list
           //$course_query = "SELECT t.*, c.*, COUNT(e.student_personalID) AS totalStudent FROM teach t, course c, enroll e
           //WHERE t.year = {$_GET['year']} AND t.term = {$_GET['term']} AND t.cID = c.cID AND e.cID = t.cID AND e.year = t.year AND e.term = t.term
           //AND t.teacher_personalID = {$_GET['id']}";
           $course_query = "SELECT Te.cID,C.cName,Te.secNo,S.term,S.year
           FROM teach Te,course C,section S WHERE Te.teacher_personalID = {$_GET['id']}
           AND C.cID = Te.cID AND S.cID = Te.cID AND S.year = Te.year AND S.term = Te.term
          AND S.cID = Te.cID AND Te.secNo = S.secNo AND S.term = {$_GET['term']} AND S.year = {$_GET['year']}";
           $course_result = mysqli_query($db, $course_query);
        }
        $i = 1;
        if($course_result->num_rows>0){
          while($row = $course_result->fetch_assoc()) {
            $enroll = "SELECT COUNT(*) AS total FROM enroll E WHERE E.cID = {$row['cID']} AND term = {$row['term']} AND year = {$row['year']} AND secNo = {$row['secNo']}";
            $enroll_result = mysqli_query($db,$enroll);
            $enroll_row = $enroll_result -> fetch_assoc();
            echo
            "<tr>
            <div class='student-row-box'>
            <td>".$i."</td>
            <td>".$row['cID']."</td>
            <td>".$row['cName']."</td>
            <td>".$row['secNo']."</td>
            <td>".$enroll_row['total']."</td>
            <td>
            <a href='course_detail.php?cID=".$row['cID']."&term=".$row['term']."&year=".$row['year']."&secNo=".$row['secNo']."' ><button class='btn btn-detail'>ดูข้อมูล</button></a>
            <a href='course_addsection.php?cID=".$row['cID']."&term=".$row['term']."&year=".$row['year']."' ><button class='btn btn-detail'>เพิ่มตอนเรียน</button></a>
            <a href='course_delete.php?cID=".$row['cID']."&term=".$row['term']."&year=".$row['year']."&secNo=".$row['secNo']."' ><button class='btn btn-delete'>ลบ</button></a>
            </td></div></tr>";
            $i++;
          }

        }
      ?>
      </tbody>
    </table>


</body>
</html>
