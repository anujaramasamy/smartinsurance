<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1>HOME</h1>
</div>
<?php
	if (isset($_SESSION['message'])) {
		echo "<div id = 'error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>
<div>
	<h4>WELCOME <?php echo $_SESSION['username'];?></h4>
</div>
<div>
	<a href="logout.php">LOGOUT</a>
</div>
</body>

</html>