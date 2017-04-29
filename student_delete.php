<?php
include('config.php');
include('session.php');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_GET['id']) {
        $query_personalID = $_GET['id'];
        $query = "UPDATE student SET advisorID = NULL WHERE personalID = {$_GET['id']}";
        mysqli_query($db,$query);
        header("Location: student.php");
    } else {
        echo "ERROR! ไม่มีนิสิตพบในระบบ";
    }
}
?>
