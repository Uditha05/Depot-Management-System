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
        .form{

          background-color:rgb(0,0,0,.3);
          width:1000px;
          margin-left:200px;
          padding:20px;
          border-radius:10px;
        }
        .alert{
          background-color:rgb(0,0,0,0.1);
        }
        .h1{
          justify:right;
        }




    </style>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      <title>Document</title>
  </head>
  <body style="background: azure;">
    <header>
    <?php
    include "../includes/headerpart.php";
    ?>
    </header>
    <h1 style="padding-left: 44%;">Add Employee</h1>
      <div class="alert" role="alert">
        <?php
            $type='edit';

            if(isset($_GET['type'])){
              if($_GET['type']=$type){
                //print_r(<div class="alert alert-success" role="alert">
                //A simple success alert—check it out!
                //</div>);
                //include "js/alert_error.js";
                echo "Re enter the details!!!";
              }
            }
        ?>
      </div><!--alert to re enter the details-->
      <div class="form">
        <form action="add_employee.view.php" method="post">


          <div class="form-row">
            <!-- <div class="col-md-2 mb-3">
              <label for="validationDefault01">Employee ID</label>
              <input type="text" class="form-control" name="empid" id="empid" placeholder="Employee ID" >
            </div> -->
            <div class="col-md-4 mb-3">
              <label for="validationDefault01">First name</label>
              <input type="text" class="form-control" name="FirstName" id="FirstName" placeholder="first name" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationDefault02">Last name</label>
              <input type="text" class="form-control" name="LastName" id="LastName" placeholder="last name" required>
            </div>
          </div><!---first row-->


          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault03">Address</label>
              <input type="text" class="form-control" name="Address" id="Address" placeholder="address" required>
            </div>

            <div class="col-md-3 mb-3">
              <label for="validationDefault05">Designation</label>
              <input type="text" class="form-control" id="Designation" name="Designation" required>
            </div>
          </div><!--second row--->



          <div class="form-row">
            <div class="col-md-3 mb-3">
              <label for="validationDefault05">Birthday</label>
              <input type="date" class="form-control" id="validationDefault05" name=" Birthday" required>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationDefault04">Gender</label>
              <select class="custom-select" name="Gender" id="validationDefault04" required>
                <option selected disabled value="">Gender</option>
                <option name="male">male</option>
                <option name="female">Female</option>
              </select>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationDefault05">NIC</label>
              <input type="text" class="form-control" id="validationDefault05" name="NIC" required>
            </div>
          </div><!---third row--->


          <div class="form-row">
            <div class="col-md-3 mb-3">
              <label for="validationDefault05">Telephpne no</label>
              <input type="int" class="form-control" id="validationDefault05" name="Telephone" required>
            </div>

            <div class="col-md-4 mb-3">
              <label for="validationDefault05">Email</label>
              <input type="email" class="form-control" id="validationDefault05" name="Email" required>
            </div>

          </div><!---forth row--->

          <div class="form-row">
            <div class="col-md-3  mb-3">
              <label for="validationDefault03">Start Date</label>
              <input type="Date" class="form-control" name="StartDate" id="StartDate" placeholder="Start Date">
            </div>
          </div><!---fifth row--->


          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="check" value="" id="invalidCheck2" required>
              <label class="form-check-label" for="invalidCheck2">
                All the above details are true
              </label>
            </div>
          </div><!--form group--->
          <button class="btn btn-secondary" name="submit" type="submit"data-toggle="modal">Submit form</button>
          <a class="btn btn-secondary" href="emplist.view.php" role="button">back</a>



        </form>

      </div><!--add empoyee form-->



  </body>
  <?php
  include "../includes/footerpart.php";
  ?>
</html>
<?php


  if (isset($_POST['check'])){
    if($_POST['StartDate']==null){$_POST['StartDate']=Date("Y/M/D");}
    if(isset($_POST['submit'])){
      $employee=new EmployeeDTO("",$_POST['FirstName'],$_POST['LastName'],$_POST['NIC'],$_POST['Address'],$_POST['Gender'],$_POST['Birthday'],$_POST['Telephone'],$_POST['Designation'],$_POST['Email'],$_POST['StartDate'],null,0,0);

      $adminkObj->addnew_employee($employee);
    }
  }





?>
