<?php
session_start();

//connect database

$db = mysqli_connect("localhost","root","","insurance"); 

//register user

if (isset($_POST['login_btn'])) {

	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	$password = md5($password);
	$sql = "SELECT * FROM users WHERE username='$username' AND password = '$password'";
	$result = mysqli_query($db,$sql);

	if (mysqli_num_rows($result) == 1) {
		$_SESSION['message'] = 'You are logged in';
		$_SESSION['username'] = $username;
		header("location:home.php");
	}else{
		$_SESSION['message'] = "username / password combination incorrect";
	}
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1>LOGIN SMART INSURANCE</h1>
</div>

<?php
	if (isset($_SESSION['message'])) {
		echo "<div id = 'error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>

<form method="post" action="login.php">
	<table>
		<tr>
			<td>User Name : </td>
			<td><input type="text" name="username" class="textInput"></td>
		</tr>
		<tr>
			<td>Password : </td>
			<td><input type="password" name="password" class="textInput"></td>
		</tr>

			<td><input type="submit" name="login_btn" value="LOGIN"></td>
		</tr>
	</table>
</form>
</body>
</html>