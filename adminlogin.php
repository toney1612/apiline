<html>
<head>
	
</head>
<body>
		<form action="" method="post">
			User : <input type='text' name='adminid'><br>
			Pass : <input type='password' name='adminpass'><br>
			<input type="submit" value="Login" name="user_click" >
		</form>
		<?php
		if($_POST['user_click']){
			session_start();
			$id = $_POST['adminid'];
			$pass = $_POST['adminpass'];
			$mysqli = new mysqli('localhost','root','12345678','linemember');
			$str = "select * from adminuser where user='$id' and pass='$pass'";
			$result = $mysqli->query($str);
			if(mysqli_num_rows($result) == 1){
				$_SESSION['check_login'] = 'true';
				echo "login success!"."<br>";
				echo "Go to panel in 5 second";
				echo "<META HTTP-EQUIV='Refresh' CONTENT='5;URL=adminpanel.php'>";
			}else{
				$_SESSION['check_login'] = 'false';
				$_SESSION['stack_login'] += 1;
				echo "login false! please try again " . "(".$_SESSION['stack_login'].")";
			}
		}
		?>
</body>
</html>