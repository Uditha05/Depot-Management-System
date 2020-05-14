<?php 
include "../control/timeTableCtrl.php";

$today = date("l");
$timetableCtrl = new TimeTableCtrl($today);
$showTable =  $timetableCtrl->getTodaySchedule();

 ?>


<!DOCTYPE html>
<html lang="en">
<head>

<!-- 	<link rel="stylesheet" type="text/css" href="view/css/main.css"> -->
  <meta charset="utf-8">	  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	
	<title>Welcome SLTB</title>
</head>
<body>
	


<nav class="navbar navbar-inverse" style="border-radius: 0px;">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li ><a href="timeTable.php">Time Table</a></li>
      <li><a href="#">Contact us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
  <main>

  		<!-- dynamic time table -->
 <div class="container" style="margin-top: 10px;">
      <h2>Time Table Of Bus From Horana</h2>
      <h3>Today Is <?php echo $today; ?></h3>
      <p>All information according to daily routine.someday this will not corect</p>
      <p>Today time table is below (status := pending/not Dispatch/ Dispatched / Arived / not working)</p>            
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Destination</th>
            <th>Start time</th>
            <th>Current State</th>
            <th>Route</th>
          </tr>
        </thead>
        <tbody>
          <?php echo $showTable; ?>

        </tbody>
      </table>
</div>  
		
    <br>

  </main>
	

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
</body>
</html>