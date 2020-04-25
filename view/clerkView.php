<?php 
session_start();
include "../control/clerkCtrl.php";

	if (!isset($_SESSION['userId'])) {
		header("location:../index.php");
	}

	$clerkObj = new ClerkCtrl();
	$buslis = $clerkObj->giveBus();
	$routelis = $clerkObj->giveDesti();



	if (isset($_POST['add'])) {
		$feild = $_POST;
		// print_r($feild);
		$clerkObj->addNewDuty($feild);
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	
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
		<div>
			<?php 
				if (isset($_GET['error'])) {
					if ($_GET['error']=='no') {
						echo "<p>Add New Duty</p>";
					}
					else{
						echo "<p>Sellect All Values</p>";
					}
					
				}

			 ?>
	

		</div>
			<form action="clerkView.php" method="post" style="width:500px;margin-left: 200px;">
			  <div class="form-group">
			    <label for="formGroupExampleInput">BUS ID: </label>
			    	<select name="busno" id="" style="width:500px;">
						<option value="0">Select Bus</option>
						<?php echo $buslis; ?>	
					</select>
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput">DESTINATION: </label>
			    	<select name="desti" id="" style="width:500px;">
						<option value="0">Select Destination</option>
						<?php echo $routelis; ?>	
					</select>
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
 					<label for="appt">Select a Dispatch time:</label>
  					<input type="time" id="appt" name="appt">
			  </div>
			   <div class="form-group">
	             <input type="submit" value="AddDuty" name="add" class="btn btn-primary py-2 px-4">
	           </div>
			</form>
	
	</main>
</body>
</html>


