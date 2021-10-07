<?php

include "../includes/class-autoload.inc.php";

// new
$today = date("l");
$CtrlFac = new ControllerFactory();
$timetableCtrl = $CtrlFac->getController("TIMETABLE");
$cmd1 = new GettodayControl();
$cmd2 = new GetallControl();
$timetableCtrl->addCmd($cmd1,$cmd2);
$showTable =  $timetableCtrl->execute("Now");
 ?>


<!DOCTYPE html>
<html lang="en">
<head>

<!-- 	<link rel="stylesheet" type="text/css" href="view/css/main.css"> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/styles.css">

	<title>Welcome SLTB</title>
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
      <li ><a href="index.php">Home</a></li>
      <li class="active"><a href="todaytimetable.view.php">Today Time Table</a></li>
      <li ><a href="timetable.view.php">Find your way</a></li>
      <li><a href="contactus.php">Contact us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

  <main style="grid-row: 3;     min-height: 450px; margin: 50px 150px;text-align: center;border: 3px solid #888888;padding-bottom: 23px;border-radius: 38px;box-shadow: 7px 14px 20px #888888;background: #f1fafa;">


  		<!-- dynamic time table -->
 <div class="container" style="margin-top: 10px;">
      <h2 style="    font-size: 40px;font-family: cursive;font-weight: bold;color: #5e6167;"><?php echo $today; ?> Timetable</h2>
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
