<?php
    session_start();
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // include database connection file
        include_once("../config.php");

        // Insert user data into table
        //$result = mysqli_query($mysqli, "INSERT INTO mahasiswa(nama_mahasiswa,mobile,nik_wali) VALUES('$name','$mobile','$nikWali')");
        $result = mysqli_query($mysqli, "SELECT * FROM `admin` WHERE (`username`) = '$username'");
        $resultArr = $result->fetch_array(MYSQLI_ASSOC);
        if (mysqli_num_rows($result)==1){
            $resultPass = mysqli_query($mysqli, "SELECT * FROM `admin` WHERE (`password`) = MD5('$password')"); 
            if(mysqli_num_rows($resultPass)==1){
                $_SESSION['user_name'] = $resultArr['username'];
                header("Location: ../dashboardAdmin.php", true, 301);
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
