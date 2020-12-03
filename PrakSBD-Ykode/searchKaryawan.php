<?php
    session_start();
    if(isset($_POST['Submit'])) {
        $nama = $_POST['carinama'];
        // include database connection file
        include_once("./config.php");

        // Insert user data into table
        $results = mysqli_query($mysqli, "SELECT * FROM list_karyawan WHERE nama_kyn = '$nama'");

        // Show message when user added
        unset($_POST['Submit']);
    }
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
                <a class="nav-links" href="./dashboardAdmin.php">Kembali</a>
                <a class="nav-links" href="./actions/logoutAction.php">Logout</a>
            </ul>
            </div>
    </div>
</head>

<body>

    <h2>Cari Karyawan</h2>

    <table class="blueTable" width='80%' border=1>
    <thead>
        <tr>
            <th>ID</th> <th>Nama</th> <th>Tanggal Lahir</th> <th>Alamat</th> <th>No. Telp</th> <th>Jabatan</th>  <th>Update</th>
        </tr>
    <thead>
    <?php  
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
