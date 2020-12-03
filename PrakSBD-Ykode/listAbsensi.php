<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$results = mysqli_query($mysqli, "SELECT * FROM list_absensi ORDER BY tgl ASC");
$results1 = mysqli_query($mysqli, "SELECT * FROM absensi");
?>
<style>
<?php include 'styles/Navbar.css'; ?>
<?php include 'styles/Table.css'; ?>
</style>

<html>
<head>    
    <title>Admin Dashboard</title>
    <div class="navbar">
            <div class="navbar-logo">
                TA YUSUF
            </div>
            <div>
            <ul class="nav-menu">
                <a class="nav-links" href="dashboardAdmin.php">Dashboard Utama</a>
                <a class="nav-links" href="./actions/logoutAction.php">Logout</a>
            </ul>
            </div>
    </div>
</head>

<body>

    <h2>Daftar Karyawan</h2>

    <table class="blueTable" width='80%' border=1>
    <thead>
        <tr>
            <th>Waktu Absen</th> <th>ID Karyawan</th> <th>Nama</th>  <th>Delete</th>
        </tr>
    <thead>
    <?php  
    $tabelAbsensi = mysqli_fetch_array($results1);
    session_start();
    if(!isset($_SESSION['user_name'])){
          header("Location: loginPage.php");
          exit();
      }
    while($user_data = mysqli_fetch_array($results)) {         
        echo "<tr>";
        echo "<tbody>";
        echo "<td>".$user_data['tgl']."</td>";
        echo "<td>".$user_data['id_kyn']."</td>";
        echo "<td>".$user_data['nama_kyn']."</td>";
        echo "<td><a href='./adminComponents/deleteAbsen.php?id=$tabelAbsensi[id_absen]'>Delete</a></td></tr>";        
        echo "</tbody>";
    }
    ?>
    </table>
</body>
</html>
