<?php
    session_start();
include_once("../config.php");

    $idKaryawan = $_SESSION['idKyn'];
    $result = mysqli_query($mysqli, "INSERT INTO `absensi` VALUES ('NULL','$idKaryawan', now())");
    header("Location: ../dashboardKaryawan.php");
    exit();
    echo $idKaryawan;
    ?>
