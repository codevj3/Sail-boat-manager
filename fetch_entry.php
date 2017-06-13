<?php

session_start();
if (isset($_SESSION['list'])) {
    echo json_encode($_SESSION['list']);
} else {
    die("No list exist");
}
?>
