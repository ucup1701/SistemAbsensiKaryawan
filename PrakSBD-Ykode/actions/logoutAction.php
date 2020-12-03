<?php
include_once("../config.php");
    session_start();
    // Check If form submitted, insert form data into users table.
    unset($_SESSION['user_name']);
    unset($_SESSION['idKyn']);
    header("Location: ../loginKynPage.php");
    exit();
    
?>
