<?php
session_start();
include 'Sailor_Boat.php';
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$boatType = $_POST["boatType"];
$boatMotor = $_POST["boatMotor"];
$boatLength = $_POST["boatLength"];
$boatBuilt = $_POST["boatBuilt"];
$boatPayment = $_POST["boatPayment"];
$page = $_POST["page"];
$obj = new Sailor_Boat($firstName, $lastName, $boatType, $boatMotor, $boatLength, $boatBuilt, $boatPayment, $page);
if (isset($_SESSION['list'])) {
    array_push($_SESSION['list'], $obj);
    echo json_encode($_SESSION['list']);
} else {
    $_SESSION['list'] = array();
    array_push($_SESSION['list'], $obj);
    echo json_encode($_SESSION['list']);
}

?>
