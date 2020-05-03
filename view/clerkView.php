<?php 
session_start();
include "../control/clerkCtrl.php";

	if (!isset($_SESSION['userId'])) {
		header("location:../index.php");
	}

	$clerkObj = new ClerkCtrl();
	$buslis = $clerkObj->giveBus();
	$routelis = $clerkObj->giveDesti();
	$conlis = $clerkObj->giveConductor();
	$driverlis = $clerkObj->giveDriver();


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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	
	<title>Clerk Dashbord</title>
</head>
<body>
<?php include '../includes/headerpart.inc.php'; ?>
	
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
			    <label for="formGroupExampleInput">DRIVER: </label>
			    	<select name="driver" id="" style="width:500px;">
						<option value="0">Select Driver</option>
						<?php echo $driverlis; ?>	
					</select>
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput">CONDUCTOR: </label>
			    	<select name="conductor" id="" style="width:500px;">
						<option value="0">Select Conductor</option>
						<?php echo $conlis; ?>	
					</select>
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


