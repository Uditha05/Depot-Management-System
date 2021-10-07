<?php

include "../includes/class-autoload.inc.php";


// new
$today = date("l");
$CtrlFac = new ControllerFactory();
$timetableCtrl = $CtrlFac->getController("TIMETABLE");
$cmd1 = new GettodayControl();
$cmd2 = new GetallControl();
$timetableCtrl->addCmd($cmd1,$cmd2);
$showAll =  $timetableCtrl->execute("All");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


	<title>Time Table</title>
</head>
<body style="display: grid;grid-template-rows: 73.6px 50px 1fr 171.200px;min-height: 100vh; background: #d3e5e5; ">

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
	      <li class="active"><a href="timetable.view.php">Find your way</a></li>
	      <li><a href="contactus.php">Contact us</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	    </ul>
	  </div>
	</nav>

	<main  style="grid-row: 3;     min-height: 450px;margin: 50px 100px;text-align: center;border: 3px solid #888888;padding-top: 23px;padding-bottom: 23px;border-radius: 38px;box-shadow: 7px 14px 20px #888888;background: #f1fafa;">
		<div class="row" style="margin-left: 30px;margin-right: 0px;">
	      <form class="form-inline" action="#">
	        <label for="" style="margin-right: 20px;">Find Your Way</label>
	        <input type="text" class="form-control mr-sm-2" id="myInput" onkeyup="myFunction()" placeholder="Enter Your Destination" title="Type in a name" style="width: 300px;">

	          <!-- <input class="form-control mr-sm-2" type="text" placeholder="Enter Your Destination" > -->
	          <button class="btn btn-success" type="submit">Search</button>
	      </form>
	    </div>
		<div class="container" style="margin-top: 10px;">

				  <table class="table table-bordered" id="myTable">
				    <thead>
				      <tr>
				        <th>Destination</th>
				        <th>Day</th>
				        <th>Dispatch Time</th>
				        <th>Route</th>
				      </tr>
				    </thead>
				    <tbody>
				      <?php echo $showAll; ?>

				    </tbody>
				  </table>
		</div>
	</main>



<script src="js/timetable.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
