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

		$userC = new UserCtrl($name,$pass);
		$error_msg = $userC->run_user();	
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
	              <input type="submit" value="Login" name="login" class="btn btn-primary py-2 px-4">
	            	</div>
				</form>
			</div>
	</main>
</body>
</html>