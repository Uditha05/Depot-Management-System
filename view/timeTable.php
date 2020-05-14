<?php 

include '../control/TimeTableCtrl.php';

$today = date("l");
$timetableCtrl = new TimeTableCtrl($today);
$showAll = $timetableCtrl->getAllTable();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">	  
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	
	<title>Time Table</title>
</head>
<body>

	<nav class="navbar navbar-inverse" style="border-radius: 0px;">
	  <div class="container-fluid">

	    <ul class="nav navbar-nav">
	      <li ><a href="index.php">Home</a></li>
	      <li class="active"><a href="timeTable.php">Time Table</a></li>
	      <li><a href="#">Contact us</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	    </ul>
	  </div>
	</nav>

	<main>
		<div class="row" style="margin-left: 30px;">      
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
</body>
</html>
