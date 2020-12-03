<?php
    session_start();
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id = $_POST['id'];
        $password = $_POST['password'];

        // include database connection file
        include_once("../config.php");

        // Insert user data into table
        //$result = mysqli_query($mysqli, "INSERT INTO mahasiswa(nama_mahasiswa,mobile,nik_wali) VALUES('$name','$mobile','$nikWali')");
        $result = mysqli_query($mysqli, "SELECT * FROM `karyawan` WHERE (`id_kyn`) = '$id'");
        $resultArr = $result->fetch_array(MYSQLI_ASSOC);
        if ($result){
            $resultPass = mysqli_query($mysqli, "SELECT * FROM `karyawan` WHERE (`pwd_kyn`) = MD5('$password')"); 
            if($resultPass){
                $_SESSION['idKyn'] = $resultArr['id_kyn'];
                header("Location: ../dashboardKaryawan.php", true, 301);
                exit();
            }else{
                echo "gagal";
            }
        }else{
            echo "gagal";
        }
        // Show message when user added
        unset($_POST['Submit']);
    }
    ?>
