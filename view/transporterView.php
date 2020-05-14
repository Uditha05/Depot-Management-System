<?php 
session_start();
include '../control/transportCtrl.php';

	if (!isset($_SESSION['userId'])) {
		header("location:index.php");
	}
 ?>

<?php 

	$transporterObj = new TransportCtrl();
	$buslis1 = $transporterObj->getBusNo(true);
	$buslis2 = $transporterObj->getBusNo(false);

	if (isset($_POST['dispatch'])) {
		$transporterObj->markDispatch($_POST['busno'],$_POST['diesel']);
	}
	if (isset($_POST['arrive'])) {
		$transporterObj->markArrive($_POST['busno']);
	}


 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/transporter.css">
	<title>Transporter Page</title>


</head>
<body>

	<?php include '../includes/headerpart.inc.php'; ?>
	<?php 
		if (isset($_GET['mark'])) {
			switch ($_GET['mark']) {
				case 'not':
					echo '<h3 style="background-color: red;">Plz Fill all field</h3>';
					break;
				case 'ok':
					echo '<h3 style="background-color: green;">Marking is ok</h3>';
					break;
				
				default:
					echo '<h3 style="background-color: green;">Marking is not ok</h3>';
					break;
			}

		}

	 ?>
	 
	<main>

		<label class="switch">
		  <input type="checkbox" id="toggler1" value="yes">
		   <span class="slider round"></span>
		</label>

		<div><h2>Marking Bus Depature</h2>
		<form action="transporterView.php" method="post" style="width:500px;margin-left: 200px;">
			<div class="form-group">
			    <label for="formGroupExampleInput">BUS ID: </label>
			    	<select name="busno" id="dis" style="width:500px;">
						<option value="0">Select Bus</option>
						<?php echo $buslis1; ?>
					</select>
			 </div>
			<div class="form-group">
				    <label for="formGroupExampleInput">ENTER DIESEL(in litres): </label>
					<input type="number" name="diesel" id="diesel">
			</div>
				 <div class="form-group">
		             <input type="submit" value="Dispatch" name="dispatch" class="btn btn-primary py-2 px-4">
		    	 </div>
		</form>
		</div>

		
		<label class="switch">
		  <input type="checkbox" id="toggler2" value="yes">
		   <span class="slider round"></span>
		</label>


		<div><h2>Marking Bus Arrival</h2>
			
		<form action="transporterView.php" method="post" style="width:500px;margin-left: 200px;">
			<div class="form-group">
			    <label for="formGroupExampleInput">BUS ID: </label>
			    	<select name="busno" id="arr" style="width:500px;">
						<option value="0">Select Bus</option>
						<?php echo $buslis2; ?>
					</select>
			 </div>
	
			 <div class="form-group">
	             <input type="submit" value="Arrival" name="arrive" class="btn btn-primary py-2 px-4">
	         </div>
		</form>
		</div>

	</main>






<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/transporter.js"></script>

	
</body>
</html>





