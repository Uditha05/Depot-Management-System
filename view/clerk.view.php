<?php


include "../includes/class-autoload.inc.php";
session_start();


	if (!isset($_SESSION['userId'])) {
		header("location:index.php");
	}

	$CtrlFac = new ControllerFactory();
	$clerkObj = $CtrlFac->getController("CLERK");

	$buslis = $clerkObj->giveBus();
	$routelis = $clerkObj->giveDesti();
	$conlis = $clerkObj->giveConductor();
	$driverlis = $clerkObj->giveDriver();
	//$ticketbooklist = $clerkObj->giveTicketBook();


	if (isset($_POST['add'])) {
		$feild = $_POST;
		//print_r($feild);
		$clerkObj->addNewDuty($feild);
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	<title>Clerk Dashbord</title>
</head>
<body style="min-height: 100vh; background: #d3e5e5; ">
<?php include '../includes/headerpart.php'; ?>

	<main style="min-height: 450px;font-weight: bold;margin: 50px 300px;border: 3px solid #888888;padding-top: 23px;padding-bottom: 23px;border-radius: 38px;box-shadow: 7px 14px 20px #888888;background: rgb(157 157 157 / 36%);">

		<h2 style="font-family: 'Montserrat-Regular'!important;font-weight: bold;font-size: 42px;text-align: center;">Add New Duty Record</h2>
		<div>



		</div>
			<form action="clerk.view.php" method="post" style="width:500px;margin-left: 200px;">
			  <div class="form-group">
			    <label for="formGroupExampleInput">BUS ID: </label>
			    	<select name="busno" id="" style="width:500px;">
						<option value="0">Select Bus</option>
						<?php echo $buslis; ?>
					</select>
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput">DESTINATION: </label>
			    	<select name="desti" id="desti" onchange="changeTimeslot(this.value)" style="width:500px;">
						<option value="0">Select Destination</option>
						<?php echo $routelis; ?>
					</select>
			  </div>

				<script>
				function changeTimeslot(destination) {
					var xhttp;
					xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("slotdiv").innerHTML = this.responseText;
						}
					};
					xhttp.open("GET", "../includes/loadTimeSlots.php?destination="+destination, true);
					xhttp.send();

				}
				</script>
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


			<label for="" style="    font-size: 24px;">Today is <?php echo date("l"); ?></label>
			  <div id="slotdiv" class="form-group">
 					<label for="appt">Select a Time slot:</label>
  					<select name="timeslot" id="timeslot" style="width:500px;" disabled>
						<option value="0">Select Time</option>
					</select>
			  </div>
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

			   <div class="form-group">
	             <input type="submit" value="AddDuty" name="add" class="btn btn-primary py-2 px-4">
	           </div>
			</form>



			<!-- test chart -->


	</main>
</body>
<?php
include "../includes/footerpart.php";
?>
</html>
