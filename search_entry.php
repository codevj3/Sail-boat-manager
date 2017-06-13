<?php

include 'Sailor_Boat.php';
session_start();
$search_string = "/" . $_POST['searchData'] . "/i";

if (isset($_SESSION['list'])) {
    $matches = array();
    for ($i = 0; $i < count($_SESSION['list']); $i++) {
        $res1 = preg_match($search_string, $_SESSION['list'][$i]->firstName);
        $res2 = preg_match($search_string, $_SESSION['list'][$i]->lastName);
        $res3 = preg_match($search_string, $_SESSION['list'][$i]->boatType);
        $res4 = preg_match($search_string, $_SESSION['list'][$i]->boatMotor);
        $res5 = preg_match($search_string, $_SESSION['list'][$i]->boatLength);
        $res6 = preg_match($search_string, $_SESSION['list'][$i]->boatBuilt);
        $res7 = preg_match($search_string, $_SESSION['list'][$i]->boatPayment);
        $res8 = preg_match($search_string, $_SESSION['list'][$i]->page);
        if ($res1 || $res2 || $res3 || $res4 || $res5 || $res6 || $res7 || $res8) {
            //push index in array
            array_push($matches, $_SESSION['list'][$i]);
        }
    }
    echo json_encode($matches);
} else {
    die("Connection not found");
}

//$boatObj;
//$retval;
//$sql = "SELECT * FROM sailor_boat WHERE firstName LIKE '%$search_string%'  or lastName like '%$search_string%' or boatType like '%$search_string%' or boatMotor like '%$search_string%' or boatLength like '%$search_string%' or boatBuilt like '%$search_string%'";
//if (isset($_SESSION['list'])) {
//    
//    
//} else {
//    die ("List is not found.");
//}
?>
