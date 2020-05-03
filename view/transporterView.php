<?php 
session_start();
include '../control/transportCtrl.php';

	if (!isset($_SESSION['userId'])) {
		header("location:../index.php");
	}
 ?>

<?php 

	$transporterObj = new TransportCtrl();
	$buslis1 = $transporterObj->getBusNo(true);
	$buslis2 = $transporterObj->getBusNo(false);




 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<title>Transporter Page</title>
</head>
<body>
<!-- 	<header style="background :#ff3333; overflow: auto;">
		<div>
			<h1 style="float: left;">Welcome <?php  ; ?></h1>
			<a href="profile.php" style="float:right;margin-top: 40px;">My Profile</a>
			<a href="logout.php" style="float:right;margin-top: 40px;">Log Out</a>		
		</div>
	</header> -->
	<?php include '../includes/headerpart.inc.php'; ?>

	<main>
		<div><h2>Marking Bus Depature</h2>
		<form action="transporterView.php" method="post" style="width:500px;margin-left: 200px;">
			<div class="form-group">
			    <label for="formGroupExampleInput">BUS ID: </label>
			    	<select name="busno" id="" style="width:500px;">
						<option value="0">Select Bus</option>
						<?php echo $buslis2; ?>
					</select>
			 </div>
			 <div class="form-group">
	             <input type="submit" value="Dispatch" name="dispatch" class="btn btn-primary py-2 px-4">
	         </div>
		</form>
		</div>

		<div><h2>Marking Bus Arrival</h2>
		<form action="clerkView.php" method="post" style="width:500px;margin-left: 200px;">
			<div class="form-group">
			    <label for="formGroupExampleInput">BUS ID: </label>
			    	<select name="busno" id="" style="width:500px;">
						<option value="0">Select Bus</option>
						<?php echo $buslis1; ?>
					</select>
			 </div>
			 <div class="form-group">
	             <input type="submit" value="Arrival" name="arrive" class="btn btn-primary py-2 px-4">
	         </div>
		</form>
		</div>

	</main>
	
</body>
</html>





