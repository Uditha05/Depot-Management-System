<?php
include "../includes/class-autoload.inc.php";
session_start();

  if(!isset($_SESSION['userId'])){
    header("location:index.php");
  }
    $factory = new ControllerFactory();
    $systemObj = $factory->getController("SYSTEM");
    $systemObj->check();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style type="text/css">
        .diva{

          width: 42%;
          margin: 13px;
          height: 67px;
        }
        body{
            background-image:url(../images/bg-registration-form-6.jpg);
            justify-items:center;
        }
        .box{
            height:fit-content;
            width:722px;
            background-color:rgb(0,0,0,.2);
            position: relative;
            top: 138px; bottom: 0; left: 0; right: 0;
            margin: auto;
            justify-items:center;
            border-radius:10px;


        }
        .h1{
            margin-left:80px;
        }
        .nav-item{
            color:rgb(0,0,0);
        }



    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body style="background: azure;">
  <header>
  <?php
  include "../includes/headerpart.php";
  ?>
  </header>
  <div>
    <div class="box">

        <div class="button-group mb-2 ml-5 mt-6" style="">
            <a class="btn btn-secondary diva" style="font-size: 30px;" href="emplist.view.php" role="button">Employee list</a>
            <a class="btn btn-secondary diva" style="font-size: 30px;" href="buslist.view.php" role="button">Bus list</a>
            <a class="btn btn-secondary diva" style="font-size: 30px;" href="monthly_statement.view.php" role="button">Monthly Statement</a>
            <a class="btn btn-secondary diva" style="font-size: 30px;" href="check_today.view.php" role="button">Check Today</a>

        </div>
</div>
    </div>

</body>

  <footer style="grid-row: 3;">
  <div style="position:absolute;bottom:0px;width:100%;margin-bottom: 0px!important;" class="p-3 mb-2 bg-dark text-white">
  <div align="center">

  <p style="text-align:center">
  <h2>Sri Lanka Transport Board</h2>
  <h4>Depot of Horana</h4>
  Terms & Conditions<br>
  </p>
  </div>
  </footer>

</html>
