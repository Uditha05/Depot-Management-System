<?php
    include_once "../includes/class-autoload.inc.php";
    session_start();

      if(!isset($_SESSION['userId'])){
        header("location:index.php");
      }
    $factory = new ControllerFactory();
    $systemObj = $factory->getController("SYSTEM");

    if (isset($_POST["submit"])){
        if (isset($_POST["month"])){
            $month=$_POST["month"];
            $year=$_POST["year"];

        }
        else{
            echo "set the month before press ok";
        }
    }
    else{
        $month=date("m")-1;
        $year=date("Y");
        if ($month<10){
            $month="0"."{$month}";
        }

    }
    $date="{$year}-{$month}-";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        #sailorTableArea{
            max-height: 1000px;
            overflow-x: auto;
            overflow-y: auto;
        }
        #sailorTable{
            white-space: normal;
        }
        tbody {
            display:block;
            overflow:auto;
            text-align:center;
        }
        thead, tbody tr {
            display:table;
            width:100%;
            table-layout:fixed;
            text-align:center;
            padding:5px;
        }
        th{
            text-align:center;
        }
    </style>
    <title>Monthly Statement view</title>
</head>
<body style="background: azure;">
  <header>
  <?php
  include "../includes/headerpart.php";
  ?>
  </header>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <div class="h1">
        <h1 style="padding-left: 42%;">Monthly Statement</h1>
    </div>
    <form class ="form"action="monthly_statement.view.php" method="post">
        <div class="button-group">
            <div class="form-row">
                <select class="custom-select my-1 mr-sm-2 col-md-4 ml-3" id="month" name="month" required>
                    <!-- <option selected value="<?php echo $month; ?>"><?php  echo $month; ?></option> -->
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <div class="col-md-4 mb-3 ml-3">
                    <input type="text" class="form-control col-md-4 ml-2" name="year" id="year" placeholder="enter year" required>
                </div>
                <button type="submit" class="btn btn-secondary mb-2" name="submit">Submit</button>
                <a class="btn btn-secondary mb-2 ml-2" href="admin.view.php" role="button">back</a>
            </div><!---form row--->

        </div>
        <!------ Include the above in your HEAD tag ---------->
    </form>

    <div class="table-responsive" id="sailorTableArea">
        <table id="sailorTable" class="table table-hover table-striped table-bordered" width="100%" >

            <thead class="thead-dark thead-bordered" >
                <tr style="border:px solid black">
                    <th rowspan="2" style= "border:2px solid white">Route NO</th>
                    <th colspan="3" style="text-align:center; border:2px solid white">Description</th>
                    <th rowspan="2" style= "border:2px solid white">Disel Usage</th>
                    <th rowspan="2" style= "border:2px solid white">Cash Income</th>
                    <th rowspan="2" style= "border:2px solid white">Income per 1km</th>
                </tr>
                <tr >
                    <th>from</th>
                    <th>through</th>
                    <th>to</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $statement=$systemObj->get_monthlystatement($date);
                    echo $statement;
                ?>

            </tbody>
        </table>

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
