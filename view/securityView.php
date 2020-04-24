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

//	$connect = mysqli_connect('localhost','root','','logindb' );

// 	// if (!$connect) {
// 	// 	die("data fail");
// 	// }
	if (isset($_POST['add'])) {
		print_r($_POST);
	}
// //	$qu= "SELECT id,first_name FROM employee";
// //	$res = mysqli_query($connect,$qu);
// 	$emls= '';
// 	$namels='';
// 	while($rests = mysqli_fetch_assoc($res)){
// 		$emls.= "<option value=\"{$rests['id']}\">{$rests['id']}</option>";
// 		$namels.= "<option value=\"{$rests['first_name']}\">{$rests['first_name']}</option>";
		
// 	}











 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="view/css/main.css">

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
		<h2>Mark Attendence</h2>

			<form action="securityView.php" method="post" style="width:500px;margin-left: 200px;">
			  <div class="form-group">
			    <label for="formGroupExampleInput">Employee ID: </label>
			    	<select name="frist_name" id="">
						<option value=""></option>
						<?php echo $option1; ?>	
					</select>
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput4">Employee Name</label>
			    	<select name="frist_name" id="">
						<option value=""></option>
						<?php echo $option2; ?>	
					</select>			    
			  </div>
			   <div class="form-group">
	             <input type="submit" value="Mark" name="add" class="btn btn-primary py-2 px-4">
	           </div>
			</form>
	</main>
	
</body>
</html>