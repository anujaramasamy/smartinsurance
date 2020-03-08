<?php
session_start();

//connect database

$db = mysqli_connect("localhost","root","","insurance"); 

//register user

if (isset($_POST['register_btn'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$password2 = mysqli_real_escape_string($db, $_POST['password2']);
	$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
	$nic = mysqli_real_escape_string($db, $_POST['nic']);
	$email = mysqli_real_escape_string($db, $_POST['email']);	
	$dob = mysqli_real_escape_string($db, $_POST['dob']);
	$mobile = mysqli_real_escape_string($db, $_POST['mobile']);
	$address = mysqli_real_escape_string($db, $_POST['address']);
	$province = mysqli_real_escape_string($db, $_POST['province']);

	if ($password == $password2) {
		//create user
		$password = md5($password);
		$sql = "INSERT INTO users(username,password,firstname,lastname,nic,email,dob,mobile,address,province) 
		VALUES('$username','$password','$firstname','$lastname','$nic','$email','$dob','$mobile','$address','$province') ";
		mysqli_query($db, $sql);
		$_SESSION['message'] = "You are now logged in";
		$_SESSION['username'] = $username;
		header("location: home.php");
	}else{
		//faild
		$_SESSION['message'] = "The two passwords do not match";
	}
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1>Register SMART INSURANCE</h1>
</div>

<?php
	if (isset($_SESSION['message'])) {
		echo "<div id = 'error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>

<form method="post" action="registration.php">
	<table>
		<tr>
			<td>User Name : </td>
			<td><input type="text" name="username" class="textInput" required></td>
		</tr>
		<tr>
			<td>Password : </td>
			<td><input type="password" name="password" class="textInput" required></td>
		</tr>
		<tr>
			<td>Confirm Password : </td>
			<td><input type="password" name="password2" class="textInput" required></td>
		</tr>
		<tr>
			<td>First Name : </td>
			<td><input type="text" name="firstname" class="textInput" required></td>
		</tr>
		<tr>
			<td>Last Name : </td>
			<td><input type="text" name="lastname" class="textInput" required></td>
		</tr>
		<tr>
			<td>NIC : </td>
			<td><input type="text" name="nic" class="textInput" required></td>
		</tr>
		<tr>
			<td>E-Mail : </td>
			<td><input type="email" name="email" class="textInput" required></td>
		</tr>
		<tr>
			<td>DOB : </td>
			<td><input type="date" name="dob" class="textInput" required></td>
		</tr>
		<tr>
			<td>Mobile : </td>
			<td><input type="text" name="mobile" class="textInput" required></td>
		</tr>
		<tr>
			<td>Address : </td>
			<td><input type="text" name="address" class="textInput" required></td>
		</tr>
		<tr>
			<td>Province : </td>
			<td>
				<select id="province" name"province" >
                    <option	value = "west"> Western </option>
                    <option	value = "northwest"> North Western</option>
                    <option	value = "east"> Eastern </option>
                    <option	value = "south"> Southern </option>
                    <option	value = "central"> Central</option>
                    <option	value = "north"> North </option>
                    <option	value = "northcentral"> North Central </option>
                    <option	value = "sabaragamuwa"> Sabaragamuwa </option>
                    <option	value = "uva"> Uva </option>
            	</select>
        	</td>
		</tr>




		<tr>
			<td></td>
			<td><input type="submit" name="register_btn" value="Register"></td>
		</tr>
	</table>
</form>
</body>
</html>