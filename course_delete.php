<?php
include('config.php');
include('session.php');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_GET['cID'] && $_GET['secNo'] && $_GET['term'] && $_GET['year']) {
        $query = "DELETE FROM teach WHERE teacher_personalID = $login_personalID AND cID = {$_GET['cID']} AND secNo = {$_GET['secNo']} AND term = {$_GET['term']} AND year = {$_GET['year']}";
        mysqli_query($db,$query);
        header("Location: course.php");
    } else {
        echo "ERROR! ไม่มี courseในระบบ";
    }
}
?>
