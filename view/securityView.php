<?php 
session_start();
include "../control/securityCtrl.php";
 ?>


<?php 
	if (!isset($_SESSION['userId'])) {
		header("location:../index.php");
	}

	$securObj = new SecurityCtrl();
	$option1 = $securObj->displayIdOption();
	$option2 = $securObj->displayNameOption();


	if (isset($_POST['mark'])) {
		$id = $_POST['id'];
		$firstName = $_POST['EMPname'];

		$securObj->markAttend($id,$firstName);
	}
	if (isset($_POST['off'])) {
		$id = $_POST['id'];
		$firstName = $_POST['EMPname'];

		$securObj->markOff($id,$firstName);
	}




 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/so.css">

	<title>Securty Page</title>
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
	<div class="notifi">

		<?php 
			if (isset($_GET['errors'])) {
				echo "<h4>Notification... </h4>";
				
				switch ($_GET['errors']) {
					case 'emptyValue':
						echo "<p>Select ID and Name!</p>";
						break;	
					case 'notmatching':
						echo "<p>Selected ID and Name Not Matching!</p>";
						break;					
					case 'no':
						echo "<p>Marck Attendence Successfuly!</p>";
						break;
					case 'notAttend':
						echo "<p>Not Attend!</p>";
						break;
					case 'offsuccess':
						echo "<p>Off is Successful!</p>";
						break;					

				}
				
			}

		 ?>
		

	</div>
	<div class="container">
 		<div class="row">
    		<div class="col">

		<h2>Mark Attendence</h2>


			<form action="securityView.php" method="post" style="width:500px;margin-left: 200px;">
			  <div class="form-group">
			    <label for="formGroupExampleInput">Employee ID: </label>
			    	<select name="id" id="">
						<option value="0"></option>
						<?php echo $option1; ?>	
					</select>
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput4">Employee Name</label>
			    	<select name="EMPname" id="">
						<option value="0"></option>
						<?php echo $option2; ?>	
					</select>			    
			  </div>
			   <div class="form-group">
	             <input type="submit" value="Mark" name="mark" class="btn btn-primary py-2 px-4">
	           </div>
			</form>



    		</div>
   			 <div class="col">
     			<h2>Current Time</h2>
				<div id="clock"></div>
    			</div>
  			</div>




		<div class="row">
    		<div class="col">

		<h2>Mark OFF TIME</h2>

			<form action="securityView.php" method="post" style="width:500px;margin-left: 200px;">
			  <div class="form-group">
			    <label for="formGroupExampleInput">Employee ID: </label>
			    	<select name="id" id="">
						<option value="0"></option>
						<?php echo $option1; ?>	
					</select>
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput4">Employee Name</label>
			    	<select name="EMPname" id="">
						<option value="0"></option>
						<?php echo $option2; ?>	
					</select>			    
			  </div>
			   <div class="form-group">
	             <input type="submit" value="OFF" name="off" class="btn btn-primary py-2 px-4">
	           </div>
			</form>

    		</div>			
		</div>



  		</div>   
  

	
	<!-- view table of attendence -->


	</main>
	

<script src="js/so.js"></script>
</body>
</html>