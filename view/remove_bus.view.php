<?php
//include "../control/adminctrl.php";
include "../includes/class-autoload.inc.php";
session_start();

  if(!isset($_SESSION['userId'])){
    header("location:index.php");
  }
$factory = new ControllerFactory();
$adminkObj = $factory->getController("ADMIN");
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
        .btn-new{
          background-color: #737dab!important;
          color: white!important;
        }
        .btn-new:hover {
          color: #000000!important;
          background-color: #6d79ae3d!important;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <title>Document</title>



</head>
<body  style="background: azure;">
  <header>
  <?php
  include "../includes/headerpart.php";
  ?>
  </header>
  <h1 style="padding-left: 42%;">Remove/Edit Bus</h1>
<div class="form-row col-md-12"  style="margin-top: 34px;">
  <div class="col-md-6 mb-0 p-3 bg-warning"  style="background-color: #adb5bd!important;">
    <div class="form-row">
      <h3>REMOVE DETAILS</h3>
    </div><!--heading-->
    <form action="remove_bus.view.php" method="post">
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationDefault01">Bus ID</label>
        <input type="text" class="form-control" name="busid" id="busid" placeholder="Bus ID" required>
      </div>

    </div><!---first row-->
    <div class="form-row">
      <div class="col-md-6 mb-4">
        <label for="validationDefault03">Number Plate</label>

        <input type="text" class="form-control" name="Numplate" id="Numplate" placeholder="Number Plate" required>
      </div>
    </div><!---second row-->
    <div class="button-group">
      <button class="btn btn-new" name="submit" type="submit"data-toggle="modal">Remove bus</button>
      <a class="btn btn-new" href="buslist.view.php" role="button">back</a>
    </div><!--button group-->

    </form><!---Removing Form--->
  </div><!--first form-->

  <div class="col-md-6 p-3 bg-dark text-white" style="background-color: #5b5e60!important;">
    <div class="form-row">
      <h3>EDIT DETAILS</h3>
    </div><!--heading-->
    <form action="remove_bus.view.php" method="post"><!--Editing form--->


      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationDefault01">Bus ID</label>
          <input type="text" class="form-control" name="busid" id="busid" placeholder="Bus ID" required>
        </div>

      </div><!---first row-->

      <div class="form-row">
        <select class="custom-select my-1 mr-sm-3 col-md-3" id="edit" name="column" required>
          <option selected>Choose...</option>
          <option value="StartDate">Start Date</option>
          <option value="State">State</option>
          <option value="Numplate">Number Plate</option>
        </select>


      </div><!--second row-->
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="validationDefault03">New value</label>
          <input type="text" class="form-control" name="newValue" id="newValue" placeholder="new Value" required>
        </div>
      </div><!--third row-->
      <div class="button-group">
        <button class="btn btn-new" name="edit" type="submit" data-toggle="modal">Edit the detail</button>
        <a class="btn btn-new" href="buslist.view.php" role="button">back</a>
      </div>

    </form>
  </div><!--second form-->
</div><!--all two forms-->
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

</body>
</html>
<?php
  if (isset($_POST['submit'])){
    //when press the remove button to change the state to removed
    $busid=$_POST['busid'];

    $adminkObj->remove_bus($busid);



  }
  if(isset($_POST['edit'])){

    $busid=$_POST['busid'];
    $column=$_POST['column'];
    $value=$_POST['newValue'];
    $adminkObj->edit_bus($busid,$column,$value);//when press the edit butto to update column
  }


?>
