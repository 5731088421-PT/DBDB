<?php
include('config.php');
include('session.php');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$year = $_GET['year'];
$term = $_GET['term'];
$cID = $_GET['cID'];
$secNo = $_GET['secNo'];
$personalID = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_GET['id']) {
        $query_personalID = $_GET['id'];
        $query = "DELETE FROM enroll WHERE student_personalID = $personalID AND cID = $cID AND secNo = $secNo AND term = $term AND year = $year";
        mysqli_query($db,$query);
        header("Location: course_detail.php?cID=$cID&term=$term&year=$year&secNo=$secNo");
    } else {
        echo "ERROR! ไม่มีนิสิตพบในระบบ";
    }
}
?>
