<?php
include '../includes/class-autoload.inc.php';
session_start();

if(!isset($_SESSION['userId'])){
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>SO_LOGIN</title>
    <link rel="stylesheet" href="../include/style.css">

</head>
<body>
<header>
<?php
include "../includes/headerpart.php";
?>
</header>
    <div>
        <h1 style="text-align:center">Security Officer Login</h1>
        <br>

<form style="float:left;margin-left: 425px;" class="ON" action = "so.view.php" method="POST">
        <h1>Mark Attendance</h1>
        <input id="attended_id" type="text" name="att_id_no" placeholder="Enter ID" oninput="displaySearchedEmployee()">
        <button class="btn btn-dark" type="submit" >Mark Attendence</button>

</form>


<form style="text-align:right;margin-right: 425px;" class ="OFF" action ="so.view.php" method ="POST">
    <h1>Mark Departure</h1>
    <input id="off_id" type="text" name="off_id_no" placeholder="Enter ID" oninput="displaySearchedEmployeeOff()">
    <button class="btn btn-dark" type="submit"> Mark OFF </button>
</form>
</div>
<br>
<br>

<div style="margin-left:25%;margin-right:25%" id="empDisplay" class="shadow p-3 mb-5 bg-white rounded">

<div >
<H3 style="text-align:center">Employee Details</H3>
<p>Employee ID:<br>
           First Name:<br>
           Last Name:<br>
           Address:<br>
           Telephone No:<br>
           Designation:<br>
</div>

</div>


<div style="margin-left:800px;margin-right:800px" class="alert alert-warning alert-dismissible fade show" id="display">



<?php

$factory=new ControllerFactory();
$ctrl=$factory->getController("SO");


if (isset($_POST["att_id_no"])){
    $time = date("h:i:s");
    $date = date("Y-m-d");
    $id=$_POST["att_id_no"];
    $mark_on=new AttendancerecordDTO($id,$date,$time,'','1');
    $ctrl->markattendance($mark_on);
}

if (isset($_POST["off_id_no"])){
    $time = date("h:i:s");
    $id=$_POST["off_id_no"];
    $mark_off=new AttendancerecordDTO($id,'','',$time,'');
    $ctrl->markoff($mark_off);
}

?>
</div>
<script>
function displaySearchedEmployee(){
        var empid=document.getElementById("attended_id").value;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("empDisplay").innerHTML = this.responseText;
            }
        };

        xhttp.open("GET", "../includes/showEmployee.class.php?empid="+empid, true);
        xhttp.send();
    }
    function displaySearchedEmployeeOff(){
        var empid=document.getElementById("off_id").value;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("empDisplay").innerHTML = this.responseText;
            }
        };

        xhttp.open("GET", "../includes/showEmployee.class.php?empid="+empid, true);
        xhttp.send();
    }
</script>

<?php
$facade=new FacadeInvoker();
$display=$facade->getSO();
//echo $display;
?>
<?php
include "../includes/footerpart.php";
?>
</body>
</html>
