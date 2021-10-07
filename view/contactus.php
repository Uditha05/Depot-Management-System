<?php

include "../includes/class-autoload.inc.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<title>Contact Us</title>
	<style>
			input[type=text], textarea {
		  width: 100%;
		  padding: 12px;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		  margin-top: 6px;
		  margin-bottom: 16px;
		  resize: vertical;
		}

		input[type=submit] {
		  background-color: #4CAF50;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		}

		input[type=submit]:hover {
		  background-color: #45a049;
		}

		.container {
		  border-radius: 5px;
		  background-color: #f2f2f2;
		  padding: 20px;
		}
	</style>
</head>
<body style="display: grid;grid-template-rows: 73.6px 50px 1fr 171.200px;min-height: 100vh; background: #d3e5e5;">

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
      <li ><a href="index.php">Home</a></li>
			<li ><a href="todaytimetable.view.php">Today Time Table</a></li>
      <li ><a href="timeTable.view.php">Find your way</a></li>
      <li class="active"><a href="contactus.php">Contact us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

  <main class="container-fluid" style="grid-row: 3;display: grid;grid-template-columns:1fr 1fr;margin: 50px auto;width: 82%;border: 3px solid #888888;padding-top: 23px;padding-bottom: 23px;border-radius: 38px;box-shadow: 7px 14px 20px #888888;     background: #f1fafa;">
  	<!-- <h2>Horana Depot</h2>
	<h3>Address</h3><p>No 23,horana Rd,Horana</p>
	<h3>Contact</h3><p>0333333222</p> -->
	<div class="container" style="grid-column:1;width: 80%; border-radius: 27px;">
		<form action="contactus.php" method="POST">
    <label for="name" >Name</label>
    <input type="text" id="name" name="name" placeholder="Your name.." required>

    <label for="email">E-mail</label>
    <input type="text" id="email" name="email" placeholder="E-mail.." required>

    <label for="comment">Comment</label>
    <textarea id="comment" name="comment" placeholder="Write something.." style="height:200px" required></textarea>

    <input type="submit" name="contact" value="Submit">
  </form>
	<?php
	if (isset($_POST['contact'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$comment = $_POST['comment'];
		$controlFactory = new ControllerFactory();
		$adminCntrol = $controlFactory->getController("ADMIN");
		$adminCntrol->sendFeedback($name,$email,$comment);
	}
	// echo "$_POST['email']";
	// echo "$_POST['comment']";
		// if (isset($_GET['change'])) {
		// 	if ($_GET['change'] == 'ok') {
		// 		echo "<p>password has been changed</p>";
		// 	}else{
		// 		echo "<p>password has not been changed!!!</p>";
		// 	}
		//
		// }


	?>
	</div>


	<div style="grid-column:2;width: 80%;text-align: center;margin: 164px 0px;">
		<h1>Contact US</h1>
		<p>There are many ways we can help you. And we are very pleased offer our best service for our passengers.
			Please leave a comment or if you have any complain please report it through this form.</p>
	</div>
  </main>
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
