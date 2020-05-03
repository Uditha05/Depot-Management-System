<<<<<<< HEAD
=======
<?php 
	 session_start();
	// declare(strict_types = 1);
	 include 'control/userCtrl.php';
	
?>
<?php 
	
	

	//check for submit
	if (isset($_POST['login'])) {
		$error_msg = '';
		$name = $_POST["email"];
		$pass = $_POST["password"];
		$pwd = sha1($pass);

		$userC = new UserCtrl($name,$pass);
		$error_msg = $userC->run_user();	
	}

 ?>
>>>>>>> 11517a8d77e3db796e976fbc02308f4aae5b6d7f



<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
=======
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/main.css">
	  
	 

	<meta charset="UTF-8">
	
	<style>
			
	</style>


>>>>>>> 11517a8d77e3db796e976fbc02308f4aae5b6d7f

<!-- 	<link rel="stylesheet" type="text/css" href="view/css/main.css"> -->
  <meta charset="utf-8">	  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	
	<title>Welcome SLTB</title>
</head>
<body>
<<<<<<< HEAD
=======
	<nav class="navbar navbar-expand-sm navbar-custom" style="background-color: red; ">
		<span class="navbar-brand"><img src="view/img/logo.png" alt="" style="width: 200px;"></span>
	  	<h1 style="margin-right: 20px;">S.L.T.B.</h1>
	  	<br>
	  	<p style="margin-bottom: 0px;margin-top: 10px;">Our Vision</p>


	</nav>


	<header id="home">
	<div class="container">
		<div class="row">
		

		<div class="col-12 col-md-6" style="margin-top: 100px; margin-right: 0px;">
			<h2 style="color: #00ff00;"><b>Welcome to S.L.T.B. - Horana</b></h2>
			<p style="font-size: 18px; color: #ffff;">
				This is S.Ltb user system.....lorjkjf.
		    </p>
		    <center>
				 <a href="view/passengerpageView.php" class="btn btn-dark" role="button">View As Passenger>>></a>
>>>>>>> 11517a8d77e3db796e976fbc02308f4aae5b6d7f
	


<<<<<<< HEAD
<nav class="navbar navbar-inverse" style="border-radius: 0px;">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>

      <li><a href="#">Contact us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="view/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
  <main>
  	<div class="row" style="margin-left: 30px;">			
			<form class="form-inline" action="#">
				<label for="" style="margin-right: 20px;">Find Your Way</label>
			    <input class="form-control mr-sm-2" type="text" placeholder="Enter Your Destination" style="width: 300px;">
			    <button class="btn btn-success" type="submit">Search</button>
			</form>			
  	</div>
		<div class="container" style="margin-top: 10px;">
		  <h2>Time Table Of Bus From Horana</h2>
		  <p>All information according to daily routine.someday this will not corect</p>            
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>Destination</th>
		        <th>Start time</th>
		        <th>End Time</th>
		        <th>Current State</th>
		        <th>Route</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <td>Panadura</td>
		        <td>11.00am</td>
		        <td>1.00pm</td>
		        <td>dispatched</td>
		        <td>Horana/Raigama/Bandaragama/Mahabellaana</td>
		      </tr>
		      <tr>
		        <td>Panadura</td>
		        <td>11.00am</td>
		        <td>1.00pm</td>
		        <td>Not Setoff</td>
		        <td>Horana/Raigama/Bandaragama/Mahabellaana</td>
		      </tr>
		      <tr>
		        <td>Panadura</td>
		        <td>11.00am</td>
		        <td>1.00pm</td>
		        <td>No Today work</td>
		        <td>Horana/Raigama/Bandaragama/Mahabellaana</td>
		      </tr>
		      <tr>
		        <td>Panadura</td>
		        <td>11.00am</td>
		        <td>1.00pm</td>
		        <td>dispatched</td>
		        <td>Horana/Raigama/Bandaragama/Mahabellaana</td>
		      </tr>

		    </tbody>
		  </table>
		</div>	
  </main>
	

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
=======
	        <div class="login col-12 col-md-6" style="margin-top: 20px;">

	        	<br>
	        	<h4>User Login:</h4>
					<?php 
						if (isset($error_msg) && !empty($error_msg)) {
								echo '<p style="background-color:red; padding-left:5px;">'.$error_msg.'</p>';
							}
					 ?>
					 <?php 
						if (isset($_GET['logout'])) {
								echo '<p style="background-color:green; padding-left:5px;">'.'You Have Successfuly Logout!'.'</p>';
							}
					 ?>
					<?php 
						if (isset($_GET['sessionError'])) {
								echo '<p style="background-color:orenge; padding-left:5px;">'.'!!!Something Went Wrong!!!..Call to Engineer'.'</p>';
							}
					 ?>


				<form action="index.php" method="post">
				  <div class="form-group">
				    <label for="formGroupExampleInput">User Name</label>
				    <input type="email" class="form-control" name="email" id="username" placeholder="User Name">
				  </div>
				  <div class="form-group">
				    <label for="formGroupExampleInput2">Password</label>
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

		</div>

	</div>
</header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
>>>>>>> 11517a8d77e3db796e976fbc02308f4aae5b6d7f
	
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

</body>
</html>