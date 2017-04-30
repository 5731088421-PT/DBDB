<?php
include('config.php');
include('session.php');
$cID = $_POST['cID'];
$cName = $_POST['cName'];
$credit = $_POST['credit'];
$secNo = $_POST['secNo'];
$accept_q = $_POST['accept_q'];
$time = $_POST['time'];
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $year_query = "SELECT MAX(s.year) AS year FROM semester s";
  $year_result = mysqli_query($db,$year_query);
  $year = $year_result->fetch_assoc();
  $term_query = "SELECT MAX(s.term) AS term FROM semester s WHERE s.year = {$year['year']}";
  $term_result = mysqli_query($db,$term_query);
  $term = $term_result->fetch_assoc();
  $course_query = "INSERT INTO course (cID, cName, credit) VALUES ($cID, '$cName', $credit)";
  $section_query = "INSERT INTO section(secNo, cID, term, year, accept_q, time) VALUES($secNo, $cID, {$term['term']}, {$year['year']}, $accept_q, '$time')";
  $teach_query = "INSERT INTO teach(teacher_personalID, cID, secNo, term, year) VALUES($login_personalID, $cID, $secNo, {$term['term']}, {$year['year']})";
  mysqli_query($db, $course_query);
  mysqli_query($db, $section_query);
  mysqli_query($db, $teach_query);
  $db->close();
  header("Location: course_add.php");
}
?>

<!DOCTYPE html>
<html>
<?php echo $cID." ".$cName. " ". $credit; ?>
</html>
