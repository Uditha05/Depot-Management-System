<?php 
session_start();
include "../control/clerkCtrl.php";

	if (!isset($_SESSION['userId'])) {
		header("location:../index.php");
	}

	if (isset($_POST['add'])) {
		$busNO = $_POST['busno'];
		$destination = $_POST['destination'];
		$driver = $_POST['driver'];
		$conductor = $_POST['conductor'];

		$clerkObj = new ClerkCtrl();
		$clerkObj->addNewDuty($busNO,$destination,$conductor,$driver);
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/main.css">
	<title>Clerk Dashbord</title>
</head>
<body>
	<header style="background :#ff3333; overflow: auto;">
		<div>
			<h1 style="float: left;">Welcome <p><?php echo($_SESSION['first_name']) ; ?></p></h1>
			<a href="profile.php" style="float:right;margin-top: 40px;">My Profile</a>
			<a href="logout.php" style="float:right;margin-top: 40px;">Log Out</a>		
		</div>
	</header>
	
	<main>

		<h2>Add New Duty Record</h2>
			<form action="clerkView.php" method="post" style="width:500px;margin-left: 200px;">
			  <div class="form-group">
			    <label for="formGroupExampleInput">BUS NO: </label>
			    <input type="text" class="form-control" name="busno" id="busno" placeholder="Bus No">
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput4">Destination</label>
			    <input type="text" class="form-control" name="destination" placeholder="Destination">
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput2">Driver</label>
			    <input type="text" class="form-control" name="driver" placeholder="Driver">
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput3">Conductor</label>
			    <input type="text" class="form-control" name="conductor" placeholder="Conductor">
			  </div>
			   <div class="form-group">
	             <input type="submit" value="addDuty" name="add" class="btn btn-primary py-2 px-4">
	           </div>
			</form>
	
	</main>
</body>
</html>