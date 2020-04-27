<?php 
session_start();
include '../control/transportCtrl.php';

	if (!isset($_SESSION['userId'])) {
		header("location:../index.php");
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

	<main>
		<form action="clerkView.php" method="post" style="width:500px;margin-left: 200px;">
			<div class="form-group">
			    <label for="formGroupExampleInput">BUS ID: </label>
			    	<select name="busno" id="" style="width:500px;">
						<option value="0">Select Bus</option>
							
					</select>
			 </div>
		</form>

	</main>
	
</body>
</html>