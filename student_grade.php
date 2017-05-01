<?php
include('session.php');
$cID = $_POST['cID'];
$secNo =$_POST['secNo'];
$term = $_POST['term'];
$year = $_POST['year'];
$personalID =$_POST['personalID'];
$grade = $_POST['grade'];
$attendance = $_POST['attendance'];
$query = "UPDATE enroll SET attendance=$attendance, grade=$grade
WHERE student_personalID=$personalID AND secNo=$secNo AND cID=$cID AND term=$term AND year=$year";
mysqli_query($db,$query);
$loc = "course_addgrade.php?cID=$cID&term=$term&year=$year&secNo=$secNo";
header('location: '. $loc);
 ?>
