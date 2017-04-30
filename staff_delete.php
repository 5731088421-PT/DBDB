<?php
include('config.php');
include('session.php');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$personalID = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_GET['id']) {
        $query_personalID = $_GET['id'];
        $query = "DELETE FROM personnel WHERE personalID = $personalID";
        mysqli_query($db,$query);
        header("Location: staff.php");
    } else {
        echo "ERROR! ไม่มีนิสิตพบในระบบ";
    }
}
?>
