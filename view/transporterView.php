<?php 
session_start();
 ?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Transporter Page</title>
</head>
<body>
	<header style="background :#ff3333; overflow: auto;">
		<div>
			<h1 style="float: left;">Welcome <?php echo($_SESSION['first_name']) ; ?></h1>
			<a href="profile.php" style="float:right;margin-top: 40px;">My Profile</a>
			<a href="logout.php" style="float:right;margin-top: 40px;">Log Out</a>		
		</div>
	</header>
	
</body>
</html>