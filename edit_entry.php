<?php
include 'Sailor_Boat.php';
session_start();
$search_string = $_POST['searchData'];

if (isset($_SESSION['list'])) {
    echo json_encode($_SESSION['list'][$search_string]);
} else {
    die("connection could not get established" . mysql_error());
}
?>
