<?php 
	// declare(strict_types = 1);
	 include 'control/userCtrl.php';
	 // session_start();
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



<!DOCTYPE html>
<html lang="en">
<head>

<!-- 	<link rel="stylesheet" type="text/css" href="view/css/main.css"> -->
  <meta charset="utf-8">	  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	
	<style>
			
	</style>




	<title>Login Page</title>
</head>
<body>
	


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
  
	

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
</body>
</html>