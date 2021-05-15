<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=s">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login pake cookies</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-page">
    <div class="form">
        <form  method="POST" action="login.php" class="login-form">
        <label>Username:</label> <input type="text" name="username"/>
        <label>password:</label> <input type="password" name="password"/>
        <input type="checkbox" name="remember"> Remember me <br><br>
        <input class="button" type="submit" value="Login" name="login">
        </form>
    </div>
    </div>
    <span>
	<?php
		session_start();
		if (isset($_SESSION['message'])){
			echo $_SESSION['message'];
		}
		unset($_SESSION['message']);
	?>
</span>
</body>
</html>
