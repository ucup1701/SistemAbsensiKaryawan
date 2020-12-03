<style>
<?php include '../styles/Navbar.css'; ?>
<?php include '../styles/Table.css'; ?>
<?php include '../styles/Form.css'; ?>
</style>

<html>
<head>
    <title>Tambah Karyawan</title>
    <div class="navbar">
            <div class="navbar-logo">
                TA YUSUF
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
    <form action="add.php" method="post" name="form1">
		<div class="login-form">
			<h1>Tambah Karyawan Baru</h1>
			<form action="auth" method="POST">
				<input type="text" name="id" placeholder="ID" required>
				<input type="text" name="nama" placeholder="Nama" required>
				<input type="password" name="pwd" placeholder="Password" required>
				<input type="text" name="tgl" placeholder="Tanggal Lahir" required>
				<input type="text" name="alamat" placeholder="Alamat" required>
				<input type="text" name="telp" placeholder="No. Telp" required>
				<input type="text" name="kd_jabatan" placeholder="Kode Jabatan" required>
				<input type="submit" name="Submit" value="Add">
			</form>
		</div>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $pwd = $_POST['pwd'];
        $alamat = $_POST['alamat'];
        $tgl = $_POST['tgl'];
        $telp = $_POST['telp'];
        $kd_jabatan = $_POST['kd_jabatan'];

        // include database connection file
        include_once("../config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO karyawan(id_kyn, pwd_kyn, nama_kyn, tgl_lahir, alamat, no_tlp, kd_jabatan) VALUES ('$id', MD5('$pwd'),'$nama','$tgl', '$alamat', '$telp', '$kd_jabatan')");

        // Show message when user added
        unset($_POST['Submit']);
        echo "User added successfully. <a href='../dashboardAdmin.php'>Kembali</a>";
    }
    ?>
</body>
</html>
