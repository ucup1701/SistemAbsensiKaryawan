<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
?>
<style>
<?php include 'styles/Navbar.css'; ?>
<?php include 'styles/Table.css'; ?>
</style>

<html>
<head>    
    <title>Karyawan Dashboard</title>
    <div class="navbar">
            <div class="navbar-logo">
                TA YUSUF
            </div>
            <div>
            <ul class="nav-menu">
                <a class="nav-links" href="./actions/logoutAction.php">Logout</a>
            </ul>
            </div>
    </div>
</head>

<body>

    <h2>Dashboard Karyawan</h2>
    <form action="./actions/absenAction.php" method="post" name="form1">
    <input type="submit" name="Submit" value="ABSEN SEKARANG">
</form>
    <?php  
        session_start();

    if(!isset($_SESSION['idKyn'])){
         header("Location: loginKynPage.php");
          exit();
        }
    ?>
</body>
</html>
