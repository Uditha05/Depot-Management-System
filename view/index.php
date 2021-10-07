<?php


 ?>


<!DOCTYPE html>
<html lang="en">
<head>

<!-- 	<link rel="stylesheet" type="text/css" href="view/css/main.css"> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <li class="active"><a href="index.php">Home</a></li>
      <li ><a href="todaytimetable.view.php">Today Time Table</a></li>
      <li ><a href="timetable.view.php">Find your way</a></li>
      <li><a href="contactus.php">Contact us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

  <main style="grid-row: 3;">

    <!-- Automatic slider -->

    <div class="slideshow-container">

    <div class="mySlides fade">
      <div class="text">1 / 3</div>
      <img class="slideImage" src="img/1.jpg" style="width:100%; height: 100vh;">
    </div>

    <div class="mySlides fade">
      <div class="text">2 / 3</div>
      <img class="slideImage" src="img/2.jpg" style="width:100%; height: 100vh;">
    </div>

    <div class="mySlides fade">
      <div class="text">3 / 3</div>
      <img class="slideImage" src="img/3.jpg" style="width:100%; height: 100vh;">
    </div>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
    <br>
    <br>
    <br>

    <script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    </script>

    <div style="font-size: 20px;">
      <div style="margin: 22px 106.63px 60px 46.6px;">
        <div style="display: flex; background: azure; padding: 15px 30px 15px 30px; border: 1px solid #7a3737; box-shadow: -6px -3px 20px 0px #756a6a;">
          <div style="border-right: 2px solid #1f1f1f; padding: 0px 22px 0px 0px;">
            <p style="width: 600px; padding: 0px 43px; text-align: center;">To provide the public a safe, dependable and comfortable road passenger transport at a reasonable fare system through a staff dedicated to service and obtain the optimum utilization of all resources functioning as a financially viable organization.</p>
          </div>
          <div style="width: 100%; text-align: center; margin: auto;">
            <p style="font-size: 36px;">Our Mission</p>
          </div>
        </div>
      </div>

      <div style="margin: 22px 46.63px 60px 106.6px;">
        <div style="display: flex; background: azure; padding: 15px 30px 15px 30px; border: 1px solid #7a3737; box-shadow: -6px -3px 20px 0px #756a6a;">
          <div style="width: 100%; text-align: center; margin: auto;">
            <p style="font-size: 36px;">Our Services</p>
          </div>
          <div style="border-left: 2px solid #1f1f1f; padding: 0px 0px 0px 22px;">
            <p style="width: 500px; padding: 0px 43px; text-align: center;">There are many ways we can help you. And we are very pleased offer our best service for our passengers. Please leave a comment or if you have any complain please report it through this form.</p>
          </div>
        </div>
      </div>

      <div style="margin: 22px 106.63px 60px 46.6px;">
        <div style="display: flex; background: azure; padding: 15px 30px 15px 30px; border: 1px solid #7a3737; box-shadow: -6px -3px 20px 0px #756a6a;">
          <div style="border-right: 2px solid #1f1f1f; padding: 0px 22px 0px 0px;">
            <p style="width: 500px; padding: 0px 43px; text-align: center;">To provide the public a safe, dependable and comfortable road passenger transport at a reasonable fare system through a staff dedicated to service and obtain the optimum utilization of all resources functioning as a financially viable organization.</p>
          </div>
          <div style="width: 100%; text-align: center; margin: auto;">
            <p style="font-size: 36px;">Contact Us</p>
          </div>
        </div>
      </div>

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
