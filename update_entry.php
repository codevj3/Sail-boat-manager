<?php

include 'Sailor_Boat.php';
session_start();
$id = $_POST["id"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$boatType = $_POST["boatType"];
$boatMotor = $_POST["boatMotor"];
$boatLength = $_POST["boatLength"];
$boatBuilt = $_POST["boatBuilt"];
$boatPayment = $_POST["boatPayment"];
$page = $_POST["page"];
$data = new Sailor_Boat(
        $firstName, $lastName, $boatType, $boatMotor, $boatLength, $boatBuilt, $boatPayment, $page
);
$obj=array();
array_push($obj, $data);
if (isset($_SESSION['list'])) {
    $res=array_splice($_SESSION['list'], $id, 1, $obj);
    echo json_encode($_SESSION['list']);
} else {
    echo (false);
}
?>
