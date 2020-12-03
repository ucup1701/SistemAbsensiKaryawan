<style>
<?php include './styles/Navbar.css'; ?>
<?php include './styles/Table.css'; ?>
<?php include './styles/Form.css'; ?>
</style>

<html>
<head>
    <title>Login Page</title>
    <div class="navbar">
            <div class="navbar-logo">
                TA YUSUF
            </div>
            <div>
            <ul class="nav-menu">
                <a class="nav-links" href="loginPage.php">Admin</a>
            </ul>
            </div>
    </div>

</head>

<body>
    <br/><br/>
    <form action="./actions/loginKynAction.php" method="post" name="form1">
		<div class="login-form">
			<h1>Login Karyawan</h1>
			<form action="auth" method="POST">
				<input type="text" name="id" placeholder="ID" required>
                <input type="password" name="password" placeholder="Password" required>
				<input type="submit" name="Submit" value="Login">
			</form>
		</div>
    </form>
</body>
</html>
<?php
    if(isset($_SESSION['idKyn'])){
        header("Location: dashboardKaryawan.php");
         exit();
       } 
?>
