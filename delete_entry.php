<?php
session_start();
include 'Sailor_Boat.php';
$delete_id = $_POST['searchData'];

if (isset($_SESSION['list'])) {
    $res = array_splice($_SESSION['list'], $delete_id, 1);
    echo (true);
} else {
    echo (false);
}
?>
