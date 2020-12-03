<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$results = mysqli_query($mysqli, "SELECT * FROM list_karyawan ORDER BY id_kyn ASC");
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
                <a class="nav-links" href="./adminComponents/add.php">Tambah Karyawan Baru</a>
                <a class="nav-links" href="listAbsensi.php">Tabel Absen</a>
                <a class="nav-links" href="./actions/logoutAction.php">Logout</a>
            </ul>
            </div>
    </div>
</head>

<body>

    <h2>Daftar Karyawan</h2>
    <form action="searchKaryawan.php" method="post" name="form1">
		<input type="text" name="carinama" placeholder="Nama" required>
        <input type="submit" name="Submit" value="Cari">
    </form>
    <table class="blueTable" width='80%' border=1>
    <thead>
        <tr>
            <th>ID</th> <th>Nama</th> <th>Tanggal Lahir</th> <th>Alamat</th> <th>No. Telp</th> <th>Jabatan</th>  <th>Update</th>
        </tr>
    <thead>
    <?php  
    session_start();
    if(!isset($_SESSION['user_name'])){
          header("Location: loginPage.php");
          exit();
      }
    while($user_data = mysqli_fetch_array($results)) {         
        echo "<tr>";
        echo "<tbody>";
        echo "<td>".$user_data['id_kyn']."</td>";
        echo "<td>".$user_data['nama_kyn']."</td>";
        echo "<td>".$user_data['tgl_lahir']."</td>";
        echo "<td>".$user_data['alamat']."</td>";
        echo "<td>".$user_data['no_tlp']."</td>";   
        echo "<td>".$user_data['jabatan']."</td>";   
        echo "<td><a href='./adminComponents/edit.php?id=$user_data[id_kyn]'>Edit</a> | <a href='./adminComponents/delete.php?id=$user_data[id_kyn]'>Delete</a></td></tr>";        
        echo "</tbody>";
    }
    ?>
    </table>
</body>
</html>
