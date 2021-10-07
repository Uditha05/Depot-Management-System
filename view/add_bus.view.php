<?php

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
          .form{
            background-color:rgb(0,0,0,.2);
            width:600px;
            margin-left:300px;
            margin-top:100px;
            border-radius:10px;
          }
          h1{
            margin-left:450px;
          }


      </style>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

      <title>Document</title>

  <body  style="background: azure;">
    <header>
    <?php
    include "../includes/headerpart.php";
    ?>
    </header>
    <h1 style="padding-left: 18%;">Add Bus</h1>
</head>
  <div class="form pb" style="margin-left: 33%;margin-top: 33px;">

    <form action="add_bus.view.php" method="post">


      <div class="form-row">
        <!-- <div class="col-md-6 mb-3 ml-3">
          <label for="validationDefault01">Bus ID</label>
          <input type="text" class="form-control ml-4" name="busid" id="busid" placeholder="bus ID">
        </div> -->

      </div><!---first row-->
      <div class="form-row">
        <div class="col-md-6 mb-3 ml-3">
          <label for="validationDefault03"> number plate</label>

          <input type="text" class="form-control ml-4" name="Numplate" id="Numplate" placeholder="Number Plate" required>
        </div>


      </div><!--second row--->





      <div class="form-row">
        <div class="col-md-3 mb-3 ml-3">
          <label for="validationDefault05">Status</label>
          <input type="text" class="form-control ml-4" id="State" name="State" placeholder="State" required>
        </div>




      </div><!---forth row--->

      <div class="form-row">
        <div class="col-md-3 mb-3 ml-3">
          <label for="validationDefault03">Start Date</label>
          <input type="Date" class="form-control ml-4" style="width: 179px;" name="StartDate" id="StartDate" placeholder="Start Date">
        </div>
      </div><!---fifth row--->


    <div class="form-group ml-3 mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="check" value="" id="check" required>
        <label class="form-check-label" for="invalidCheck2">
          All the above details are true
        </label>
      </div>
    </div><!--form group--->

    <button class="btn btn-secondary ml-3 mb-3" name="submit" type="submit"data-toggle="modal" data-target="#exampleModal">Submit form</button>
    <a class="btn btn-secondary mb-3" href="buslist.view.php" role="button">back</a>



    </form>
  </div><!--full form-->


      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Warningl!!!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Re check the details and put the tick
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a class="btn btn-secondary" href="buslist.view.php" role="button">List</a>
        </div>
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
<?php


if (isset($_POST['check'])){
    if(isset($_POST['submit'])){
      if($_POST['State']==null){
        $_POST['State']="parked";
      }
      $_POST['StartDate']=date("Y/m/d");
      $busObj=new BusDTO("",$_POST['StartDate'],$_POST['State'],$_POST['Numplate']);
      $_POST['busObj']=$busObj;
      $adminkObj->addnew_bus($_POST['busObj']);
      //header("locatioin:buslist.view.php");

    }
}





?>
