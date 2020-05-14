<?php
session_start();
include '../control/profileCtrl.php' ;


	if (!isset($_SESSION['userId'])) {
		header("location:../index.php");
	}
 ?>

<?php 
	$userid = $_SESSION['userId'];
	$profileObj = new ProfileCtrl();
	$row = $profileObj->givedata($userid);

	if (isset($_POST['update'])) {
		if(!empty($_POST['pwd1'])){
			 $profileObj->changePwd($pwd,$userid);
		}else{
			header('location:../view/profile.php?change=no');
		}
	}


 ?>






<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>My Profile</title>
</head>
<body>
	<header style="background :#ff3333; overflow: auto;">
		<div>
			<h1 style="float: left;">Welcome <?php echo($_SESSION['first_name']) ; ?></h1>
			<a href="logout.php" style="float:right;margin-top: 40px;"><i class="fa fa-power-off" aria-hidden="true"></i>Log Out</a>	
			<span onclick="history.back()" style="float:right;margin-top: 40px;margin-right: 5px;"><i class="fa fa-backward" aria-hidden="false"></i></span>
		</div>
	</header>
	<main>
		<h3>Edit My Profile</h3>
		<p>You can only change your login password....!</p>

		<form action="profile.php" method="post" style="width: 500px;margin-left: 50px;">
		  <div class="form-group">
		    <label for="text">Frist Name:</label>
		    <input type="text" class="form-control" <?php echo 'value="'.$row['first_name'].'"'; ?> placeholder="" id="" disabled>
		  </div>
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
		  <div class="form-group">
		    <label for="pwd">Again New Password:</label>
		    <input type="password" class="form-control" placeholder="Enter New password Again" name="pwd2" disabled="">
		  </div>
			<?php 
				if (isset($_GET['change'])) {
					if ($_GET['change'] == 'ok') {
						echo "<p>password has been changed</p>";
					}else{
						echo "<p>password has not been changed!!!</p>";
					}

				}


			 ?>
		  <button type="submit" class="btn btn-primary" name="update" onclick='return confirm("Are You Sure?");'>Update Password</button>
		</form>
			
		

	</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>