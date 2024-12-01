<?php

session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $_SESSION['passengerFN'] = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
    $_SESSION['passengerSN'] = isset($_POST['surname']) ? trim($_POST['surname']) : '';
    $_SESSION['luggage'] = isset($_POST['luggage']) ? 1 : 0;

    
    if ($_SESSION['luggage'] === 1) {
        header('Location: luggage.html');
    } else {
        header('Location: finalStep.php');
    }

    
    exit();
} else {
    
    header('Location: flightBooking.html');
    exit();
}
?>
