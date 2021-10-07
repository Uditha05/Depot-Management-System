
<?php
	include "../includes/class-autoload.inc.php";


	//check for submit
	if (isset($_POST['login'])) {
		$error_msg = '';
		$name = $_POST["email"];
		$pass = $_POST["password"];
		$pwd = sha1($pass);

		$CtrlFac = new ControllerFactory();

		//echo $pwd;
		$userC = $CtrlFac->getController("USER");
		$userC->setEmailPass($name,$pwd);
		$error_msg = $userC->run_user();
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<title>Login</title>
</head>
<body style="display: grid;grid-template-rows: 73.6px 50px 1fr 171.200px;min-height: 100vh;">

  <header style="grid-row: 1;background: #6c757d!important;color: white;font-family: monospace;font-weight: bold;">
    <div class="p-3 mb-2 bg-secondary text-white" style="    margin-bottom: 0px!important;">


      <img style="float:left" src="../view/img/sltb_logo.jpg" width="80" height="45">
      <h2 style="text-align:center;margin-left:-8px;font-weight: bold;">Welcome to Horana Depot</h2>

      <!-- <a href="logout.php" style="float:right;margin-top: 40px;"><i class="fa fa-power-off" aria-hidden="true"></i>Log Out</a>
      <a href="profile.php" style="float:right;margin-top: 40px;"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a>-->


    </div>
  </header>

<nav class="navbar navbar-inverse" style="border-radius: 0px;grid-row: 2;" >
	  <div class="container-fluid">

	    <ul class="nav navbar-nav">
	      <li class=""><a href="index.php">Home</a></li>
				<li ><a href="todaytimetable.view.php">Today Time Table</a></li>
	      <li ><a href="timetable.view.php">Find your way</a></li>
	      <li><a href="contactus.php">Contact us</a></li>
	    </ul>

	  </div>
	</nav>

	<main style="grid-row: 3;display: flex;min-width: 25%;margin: 50px 200px;text-align: center;display: grid;grid-template-columns: 1fr 1fr;border:7px solid black;    border: 3px solid #888888;border-radius: 38px;box-shadow: 7px 14px 20px #888888;">
					<div style="grid-column: 1;">
						<img src="img/login.png" style="width: 50%;    margin-top: 24px;" alt="">
					</div>
	        <div class="login col-12 col-md-6" style="margin-top: 20px;width: 66%!important;grid-column: 2;">

	        	<br>
	        	<h1 style="font-family: cursive;font-size: 38px;font-weight: bold;margin-top: -19px;">Login</h1>

					<?php
						if (isset($error_msg) && !empty($error_msg)) {
								echo '<p style="    background-color: #ce2c2c; padding: 3px;padding-left: 5px;font-size: 15px;color: white;height: 24px;border-radius: 12px;font-weight: bold;;">'.$error_msg.'</p>';
							}
					 ?>
					 <?php
						if (isset($_GET['logout'])) {
								echo '<p style="background-color: #3ea241;padding: 3px;padding-left: 5px;font-size: 15px;color: white;height: 24px;border-radius: 12px;font-weight: bold;">'.'Successfuly Logout!'.'</p>';
							}
					 ?>
					<?php
						if (isset($_GET['sessionError'])) {
								echo '<p style="background-color:orenge; padding-left:5px;">'.'!!!Something Went Wrong!!!..Call to Engineer'.'</p>';
							}
					 ?>

				<form action="login.php" method="post">
				  <div class="form-group">
				    <!-- <label for="formGroupExampleInput">User Name</label> -->
				    <input type="email" class="form-control" name="email" id="username" placeholder="User Name">
				  </div>
				  <div class="form-group">
				    <!-- <label for="formGroupExampleInput2">Password</label> -->
				    <input type="password" class="form-control" name="password" id="formGroupExampleInput2" placeholder="Password">
				  </div>
				  <div class="form-group">
				  	<label for="formGroupExampleInput3">Show Password</label>
				  	<input type="checkbox" id="showpass" style="width: 15px;height: 15px;margin-left: 10px;">
				  </div>

				   <div class="form-group">
	              <input type="submit" value="Login" name="login" class="btn btn-primary py-2 px-4">
	            	</div>
				</form>
			</div>
	</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script>
	$(document).ready(function(){
		$('#showpass').click(function(){
			if ($('#showpass').is(':checked')) {
				$('#formGroupExampleInput2').attr('type','text');
			}else{
				$('#formGroupExampleInput2').attr('type','password');
			}
		});
	});

</script>

<footer style="grid-row: 4;background:#343a40!important;color: white;">
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
