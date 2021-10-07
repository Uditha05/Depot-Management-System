<?php
include "../includes/class-autoload.inc.php";
session_start();



	if (!isset($_SESSION['userId'])) {
		header("location: index.php");
	}
 ?>

<?php
	$userid = $_SESSION['userId'];
	$CtrlFac = new ControllerFactory();
	$profileObj = $CtrlFac->getController("PROFILE");

	// echo $userid;
	$row = $profileObj->givedata($userid);



	if (isset($_POST['update'])) {

		if(!empty($_POST['pwd1'])){
			 $pwd =  $_POST['pwd1'];
			 $profileObj->changePwd($pwd,$userid);
		}else{
			header('location:../view/profile.php?change=no');
		}
	}


 ?>






<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width-device-width, initial-scaled=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>My Profile</title>
</head>
<body style="display: grid;grid-template-rows: 73.6px 1fr 171.200px;min-height: 100vh;">

  <header style="grid-row: 1;background: #6c757d!important;color: white;font-family: monospace;font-weight: bold;">
    <div class="p-3 mb-2 bg-secondary text-white" style="    margin-bottom: 0px!important;">


      <img style="float:left" src="../view/img/sltb_logo.jpg" width="80" height="45">
      <h2 style="text-align:center;margin-left:-8px;font-weight: bold;">Welcome to Horana Depot</h2>

      <!-- <a href="logout.php" style="float:right;margin-top: 40px;"><i class="fa fa-power-off" aria-hidden="true"></i>Log Out</a>
      <a href="profile.php" style="float:right;margin-top: 40px;"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a>-->


    </div>
  </header>
	<main style="grid-row: 2;display: grid;grid-template-columns: 1fr 1fr;min-width: 25%;margin: auto;text-align: center;border: 3px solid #888888;border-radius: 38px;box-shadow: 7px 14px 20px #888888;">
		<div style="grid-column: 1;">
			<img src="img/edit.png" style="width: 50%;    margin-top: 52px;" alt="">
		</div>
		<div style="grid-column:2;font-family: cursive;">
		<h3 style="font-family: cursive;font-size: 38px;">Edit My Profile</h3>
		<p>You can only change your login password....!</p>

		<form action="profile.php" method="post" style="width: 500px;margin-left: 0px;">
		  <div class="form-group">
		    <label for="text">Dsignation:</label>
		    <input type="text" class="form-control" <?php echo 'value="'.$row['designation'].'"'; ?>placeholder="" id="" disabled="">
		  </div>
		  <div class="form-group">
		    <label for="email">User Email:</label>
		    <input type="email" class="form-control" placeholder="" <?php echo 'value="'.$row['email'].'"'; ?> id="" disabled="">
		  </div>

		  <div class="form-group">
		    <label for="pwd">New Password: </label><label for=""><p> (password should less than 20 words)</p></label>
		    <input type="password" class="form-control" placeholder="Enter New password" name="pwd1">
		  </div>
		  <!-- <div class="form-group">
		    <label for="pwd">Again New Password:</label>
		    <input type="password" class="form-control" placeholder="Enter New password Again" name="pwd2" disabled="">
		  </div> -->

			<?php
				if (isset($_GET['change'])) {
					if ($_GET['change'] == 'ok') {
						echo "<p>password has been changed</p>";
					}else{
						echo "<p>password has not been changed!!!</p>";
					}

				}


			 ?>
		  <button style="margin-bottom: 14px;" type="submit" class="btn btn-primary" name="update" onclick='return confirm("Are You Sure?");'>Update Password</button>
		</form>
</div>


	</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<footer style="grid-row: 3;background:#343a40!important;color: white;">
<div style="position:relative;bottom:0px;width:100%;margin-bottom: 0px!important;" class="p-3 mb-2 bg-dark text-white">
<div align="center">

<p style="text-align:center">
<h2>Sri Lanka Transport Board</h2>
<h4>Depot of Horana</h4>
Terms & Conditions<br>
</p>
</div>
</footer>
</body>
</html>
