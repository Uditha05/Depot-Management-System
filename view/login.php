<?php 
	// declare(strict_types = 1);
	 include '../control/userCtrl.php';
	 // session_start();
 ?>

<?php 
	
	

	//check for submit
	if (isset($_POST['login'])) {
		$error_msg = '';
		$name = $_POST["email"];
		$pass = $_POST["password"];
		$pwd = sha1($pass);
		echo $pwd;
		$userC = new UserCtrl($name,$pwd);
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
<body>
	<header>
		
	</header>
	<main>
	        <div class="login col-12 col-md-6" style="margin-top: 20px;">

	        	<br>
	        	<h4>User Login:</h4>
					<?php 
						if (isset($error_msg) && !empty($error_msg)) {
								echo '<p style="background-color:red; padding-left:5px;">'.$error_msg.'</p>';
							}
						
					 ?>


				<form action="login.php" method="post">
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



</body>
</html>