<?php
include('session.php');
$personalID = $_GET['id'];
$cID = $_GET['cID'];
$year = $_GET['year'];
$term = $_GET['term'];
$secNo = $_GET['secNo'];
$enroll_query = "INSERT INTO enroll (student_personalID,secNo,cID,term,year,attendance,grade) VALUES ($personalID, $secNo, $cID, $term, $year,0,0)";
$enroll_result = mysqli_query($db,$enroll_query);
$loc = "course_addstudent.php?cID=$cID&term=$term&year=$year&secNo=$secNo";
header('Location: '.$loc);
 ?>
