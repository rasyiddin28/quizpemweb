<?php
	if(isset($_POST['login'])){
 
		session_start();
		include('conn.php');
 
		$username=$_POST['username'];
		$password=$_POST['password'];
 
		$query=mysqli_query($conn,"select * from `user` where username='$username' && password='$password'");
 
		if (mysqli_num_rows($query) == 0){
            $sql="INSERT INTO user (`userid`, `username`, `password`) 
            VALUES (NULL, '$username', '$password')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
			$_SESSION['message']="Data telah dimasukkan ke database, silahan login ulang dengan user & pass yang tadi";
			header('location:index.php');
		}
		else{
			$row=mysqli_fetch_array($query);
 
			if (isset($_POST['remember'])){
				//set up cookie
				$name_cookie = "user";
				$value_cookie = $row['userid'];
				setcookie($name_cookie, $value_cookie, time() + (86400 * 30)); // cookie will expire in a month, 86400 = 1 day
			}
 
			$_SESSION['id']=$row['userid'];
			header('location:success.php');
		}
	}
	else{
		header('location:index.php');
		$_SESSION['message']="Please Login!";
	}
?>