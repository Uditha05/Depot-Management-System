<?php

//include_once "../control/admin.control.class.php";
include "../includes/class-autoload.inc.php";
session_start();

  if(!isset($_SESSION['userId'])){
    header("location:index.php");
  }
$factory = new ControllerFactory();
$adminkObj = $factory->getController("ADMIN");
$emplist=$adminkObj->get_emplist();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body{
            background-image:url(../images/bg-registration-form-7.jpg);
        }
        .table{
            background-color:rgb(0,0,0,0.2);

        }
        .form{
            margin-left:50px;
            background-color:rgb(0,0,0,0.4);
            border-radius:10px;
            width:300px;
        }

        .btn-emp{
              margin-top: 8px;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Document</title>
    <header>
    <?php
    include "../includes/headerpart.php";
    ?>
    </header>
  </head>
  <body style="background: azure;">
    <h1 style="padding-left: 43%;">Employee Details</h1>
    <table class="table table-hover col-md-12">
        <thead class="thead-dark">
        <tr>
            <th>Emp ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>NIC</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Dirthday</th>
            <th>Telephone</th>
            <th>Designation</th>
            <th>Email</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Is Deleted</th>
            <th>Avialable</th>
        </tr>
        </thead>

            <?php echo $emplist; ?>
</table>

<form class="form" action="emplist.view.php" method="post" style="height: 53px;">
    <a class="btn btn-secondary mb-2 ml-3 btn-emp" href="remove_employee.view.php" role="button">remove/edit</a>
    <a class="btn btn-secondary mb-2 ml-3 btn-emp" href="add_employee.view.php" role="button">add</a>

    <a class="btn btn-secondary mb-2 ml-3 btn-emp" href="admin.view.php" role="button">back</a>

</form>

</body>
  <?php
  include "../includes/footerpart.php";
  ?>
</html>
