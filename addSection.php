<?php
//include('config.php');
include('session.php');
$cID = $_GET['cID'];
$secNo = $_POST['secNo'];
$accept_q = $_POST['accept_q'];
// Check connection

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $year_query = "SELECT MAX(s.year) AS latestYear FROM semester s";
  $year_result = mysqli_query($db,$year_query);
  $year = $year_result->fetch_assoc();
  $term_query = "SELECT MAX(s.term) AS latestTerm FROM semester s WHERE s.year = {$year['latestYear']}";
  $term_result = mysqli_query($db,$term_query);
  $term = $term_result->fetch_assoc();
  $section_query = "INSERT INTO section(secNo, cID, term, year, accept_q) VALUES($secNo, $cID, {$term['latestTerm']}, {$year['latestYear']}, $accept_q)";
  $teach_query = "INSERT INTO teach(teacher_personalID, cID, secNo, term, year) VALUES($login_personalID, $cID, $secNo, {$term['latestTerm']}, {$year['latestYear']})";
  mysqli_query($db, $section_query);
  mysqli_query($db, $teach_query);
  $db->close();
  header("Location: course_addsection.php?cID=".$cID."&year=".$year['latestYear']."&term=".$term['latestTerm']);
}
?>
