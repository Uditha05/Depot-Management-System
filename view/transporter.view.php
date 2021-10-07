
<?php

include "../includes/class-autoload.inc.php";


session_start();

	if (!isset($_SESSION['userId'])) {
		header("location:index.php");
	}
 ?>

<?php

	 $CtrlFac = new ControllerFactory();
	 $transporterObj= $CtrlFac->getController("TRANSPORTER");
	// $t = true;
	// $f = false;
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
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/transporter.css">
	<title>Transporter Page</title>


</head>
<body>

	<?php include '../includes/headerpart.php'; ?>
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

	<main style="display: grid;grid-template-columns: 1fr 1fr; background: #d3e5e5;">

		<!-- <label class="switch">
		  <input type="checkbox" id="toggler1" value="yes">
		   <span class="slider round"></span>
		</label> -->

		<div style="grid-column: 1;min-height: 360px;font-weight: bold;margin: 50px 50px;border: 3px solid #888888;padding-top: 23px;padding-bottom: 23px;border-radius: 38px;box-shadow: 7px 14px 20px #888888;background: rgb(157 157 157 / 36%);">
			<h2 style="    font-family: 'Montserrat-Regular'!important;font-weight: bold;font-size: 42px;text-align: center;">Marking Bus Depature</h2>
		<form action="transporter.view.php" method="post" style="width:400px;margin-left: 50px; margin-top: 35px;">
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


		<!-- <label class="switch">
		  <input type="checkbox" id="toggler2" value="yes">
		   <span class="slider round"></span>
		</label> -->


		<div  style="grid-column: 2;min-height: 360px;font-weight: bold;margin: 50px 50px;border: 3px solid #888888;padding-top: 23px;padding-bottom: 23px;border-radius: 38px;box-shadow: 7px 14px 20px #888888;background: rgb(157 157 157 / 36%);">
			<h2 style="    font-family: 'Montserrat-Regular'!important;font-weight: bold;font-size: 42px;text-align: center;">Marking Bus Arrival</h2>

		<form action="transporter.view.php" method="post" style="width:300px;margin-left: 50px; margin-top: 35px;">
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



		<!-- test chart -->



	</main>






<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- <script src="js/transporter.js"></script> -->


</body>
<?php
include "../includes/footerpart.php";
?>
</html>
