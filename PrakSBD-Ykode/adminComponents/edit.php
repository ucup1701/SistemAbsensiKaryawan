<?php
// include database connection file
include_once("../config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['Update']))
{   
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl = $_POST['tgl'];
    $telp = $_POST['telp'];
    $kd_jabatan = $_POST['kd_jabatan'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE karyawan SET nama_kyn='$nama',tgl_lahir='$tgl',alamat='$alamat',no_tlp= '$telp',kd_jabatan='$kd_jabatan' WHERE id_kyn='$id'");
                                     
    // Redirect to homepage to display updated user in list
    unset($_POST['Update']);
    header("Location: ../dashboardAdmin.php");
}
?>

<style>
<?php include '../styles/Navbar.css'; ?>
<?php include '../styles/Table.css'; ?>
<?php include '../styles/Form.css'; ?>
</style>

<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM karyawan WHERE id_kyn=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama_kyn'];
    $alamat = $user_data['alamat'];
    $tgl = $user_data['tgl_lahir'];
    $telp = $user_data['no_tlp'];
    $kd_jabatan = $user_data['kd_jabatan'];
}
?>
<html>
<head>  
    <title>Edit Data Karyawan</title>
    <div class="navbar">
            <div class="navbar-logo">
                KELOMPOK 17
            </div>
            <div>
            <ul class="nav-menu">
                <a class="nav-links" href="../dashboardAdmin.php">Kembali</a>
            </ul>
            </div>
    </div>
</head>

<body>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
    <div class="login-form">
			<h1>Edit Data Karyawan</h1>
			<form action="auth" method="POST">
				<input type="text" name="nama" placeholder="Nama" value=<?php echo $nama; ?> required>
				<input type="text" name="tgl" placeholder="Tanggal Lahir" value=<?php echo $tgl; ?> required>
				<input type="text" name="alamat" placeholder="Alamat" value=<?php echo $alamat; ?> required>
				<input type="text" name="telp" placeholder="No. Telp" value=<?php echo $telp; ?> required>
				<input type="text" name="kd_jabatan" placeholder="Kode Jabatan" value=<?php echo $kd_jabatan; ?>  required>
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				<input type="submit" name="Update" value="Update">
			</form>
		</div>
        <?php echo $id?>
    </form>
</body>
</html>
