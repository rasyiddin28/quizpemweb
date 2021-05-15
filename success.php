<?php
	session_start();
 
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
		header('index.php');
		exit();
	}
	include('conn.php');
	$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
	$row=mysqli_fetch_assoc($query);    
?>
<!DOCTYPE html>
<html>
<head>
<title>Sukses</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<h2>Login Berhasil</h2>
    <div class="login-page">
    <div class="form">
        <label>Selamat datang:</label>
        <?php echo $row['username']; ?>
        <br>
        <a href="index.php">Kembali ke home</a>
        <br>
</body>
</html>