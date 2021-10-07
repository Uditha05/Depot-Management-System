<?php
include "../includes/class-autoload.inc.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>
    h1{
      padding-left: 40%;
      font-size: 27px;
      text-decoration: underline;
    }
    </style>

    <title>Check today </title>
</head>
<body style="background: azure;">
  <?php
  include "../includes/headerpart.php";
  ?>
    <h1 style="padding-left: 38%;font-size: 32px;text-decoration: none;">Check Employee Daily Work</h1>
    <form method="post">
        <div class="btn-toolbar" name='employee' id='employee' role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="submit" name="cashier" class="btn btn-secondary">Cashier</button>
                <button type="submit" name="transporter" class="btn btn-secondary">Transporter</button>
                <button type="submit" name="engineer" class="btn btn-secondary">Engineer</button>
                <button type="submit" name="clark" class="btn btn-secondary">Clark</button>
                <button type="submit" name="sequirity" class="btn btn-secondary">Sequirity</button>
            </div>
        </div>
    </form>
    <?php
        $name=null;
        if (isset($_POST['cashier'])){
            echo "<div>
            <h1>Initiated Ticket Books</h1>
            <table class=\"table table-bordered\">
              <thead>
                  <tr>
                    <th>NumberPlate</th>
                    <th>Driver</th>
                    <th>Conductor</th>
                    <th>Current State</th>
                  </tr>
              </thead>";
              $a = new FacadeInvoker();
              $s = $a->getCashier();
              $tbini = $s[0];
              $did = -1;
              if ($tbini!=null) {
                foreach ($tbini as $row) {
                  if ($did == $row['dutyid']) {
                    continue;
                  }
                  $did = $row['dutyid'];
                  echo "<tr>
                  <td class=\"Numplate\">{$row['Numplate']}</td>
                  <td>{$row['driverid']}</td>
                  <td>{$row['conductorid']}</td>
                  <td>{$row['state']}</td>
                        </tr>";
                }
              }
              echo "</table>
              </div>

              <div>
              <h1>Closed Duty Records</h1>
              <table class=\"table table-bordered\">
                <thead>
                    <tr>
                      <th>NumberPlate</th>
                      <th>Driver</th>
                      <th>Conductor</th>
                      <th>Current State</th>
                    </tr>
                </thead>";
                $a = new FacadeInvoker();
                $s = $a->getCashier();
                $tbclose = $s[1];
                $did = -1;
                if ($tbclose!=null) {
                  foreach ($tbclose as $row) {
                    if ($did == $row['dutyid']) {
                      continue;
                    }
                    $did = $row['dutyid'];
                    echo "<tr>
                    <td class=\"Numplate\">{$row['Numplate']}</td>
                    <td>{$row['driverid']}</td>
                    <td>{$row['conductorid']}</td>
                    <td>{$row['state']}</td>
                          </tr>";
                  }
                }
                echo "</table>
                </div>

                <div>
                <h1>Created Complains</h1>
                <table class=\"table table-bordered\">
                  <thead>
                      <tr>
                        <th>Employee</th>
                        <th>Driver</th>
                        <th>Conductor</th>
                        <th>Description</th>
                      </tr>
                  </thead>";
                  $a = new FacadeInvoker();
                  $s = $a->getCashier();
                  $complains = $s[2];
                  $did = -1;
                  if ($complains!=null) {
                    foreach ($complains as $row) {
                      if ($did == $row['dutyid']) {
                        continue;
                      }
                      $did = $row['dutyid'];
                      echo "<tr>
                      <td class=\"Numplate\">{$row['Numplate']}</td>
                      <td>{$row['driverid']}</td>
                      <td>{$row['conductorid']}</td>
                      <td>{$row['Description']}</td>
                            </tr>";
                    }
                  }
                echo "</table>
                </div>
                <div>
                <h1>Created Paysheets</h1>
                <table class=\"table table-bordered\">
                  <thead>
                      <tr>
                        <th>Employee</th>
                        <th>Designation</th>
                        <th>Paid Month</th>
                        <th>Working Days</th>
                        <th>Basic Salary</th>
                        <th>OT Hours</th>
                        <th>OT Total</th>
                        <th>Salary</th>
                      </tr>
                  </thead>";
                  $a = new FacadeInvoker();
                  $s = $a->getCashier();
                  $paysheets = $s[3];
                  if ($paysheets!=null) {
                    foreach ($paysheets as $row) {
                      echo "<tr>
                      <td class=\"Numplate\">{$row['employeeName']}</td>
                      <td>{$row['designation']}</td>
                      <td>{$row['paidFor']}</td>
                      <td>{$row['workingdays']}</td>
                      <td>{$row['basicsalary']}</td>
                      <td>{$row['othours']}</td>
                      <td>{$row['ottotal']}</td>
                      <td>{$row['totalsalary']}</td>
                            </tr>";
                    }
                  }
                  echo "</table>
                  </div>";
        }
        elseif (isset($_POST['engineer'])){
            $name="This is transporter today";
        }
        elseif (isset($_POST['transporter'])){
            $name="This is engineer today";
        			 $fi = new FacadeInvoker();
        		echo "<table class=\"table table-bordered\">
                <thead>
                  <tr>
                    <th>Bus Number</th>
                    <th>Dispatch Time</th>
                    <th>Time</th>
                    <th>Diesel</th>
                  </tr>
                </thead>
                <tbody>";
                  $bod = $fi->getTransporter();
                echo "</tbody>
              </table>";
        }
        elseif (isset($_POST['clark'])){
             $fi = new FacadeInvoker();

          echo "<table class=\"table table-bordered\">
              <thead>
                <tr>
                  <th>Bus Number</th>
                  <th>Driver Name</th>
                  <th>Time</th>
                  <th>Route</th>
                </tr>
              </thead>
              <tbody>";
                $bod = $fi->getClerk();
              echo "</tbody>
            </table>";
        }
        elseif (isset($_POST['sequirity'])){
          $facade=new FacadeInvoker();
          $display=$facade->getSO();
          echo $display;
        }
        else{
          echo "<div>
          <h1>Initiated Ticket Books</h1>
          <table class=\"table table-bordered\">
            <thead>
                <tr>
                  <th>NumberPlate</th>
                  <th>Driver</th>
                  <th>Conductor</th>
                  <th>Current State</th>
                </tr>
            </thead>";
            $a = new FacadeInvoker();
            $s = $a->getCashier();
            $tbini = $s[0];
            $did = -1;
            if ($tbini!=null) {
              foreach ($tbini as $row) {
                if ($did == $row['dutyid']) {
                  continue;
                }
                $did = $row['dutyid'];
                echo "<tr>
                <td class=\"Numplate\">{$row['Numplate']}</td>
                <td>{$row['driverid']}</td>
                <td>{$row['conductorid']}</td>
                <td>{$row['state']}</td>
                      </tr>";
              }
            }
            echo "</table>
            </div>

            <div>
            <h1>Closed Duty Records</h1>
            <table class=\"table table-bordered\">
              <thead>
                  <tr>
                    <th>NumberPlate</th>
                    <th>Driver</th>
                    <th>Conductor</th>
                    <th>Current State</th>
                  </tr>
              </thead>";
              $a = new FacadeInvoker();
              $s = $a->getCashier();
              $tbclose = $s[1];
              $did = -1;
              if ($tbclose!=null) {
                foreach ($tbclose as $row) {
                  if ($did == $row['dutyid']) {
                    continue;
                  }
                  $did = $row['dutyid'];
                  echo "<tr>
                  <td class=\"Numplate\">{$row['Numplate']}</td>
                  <td>{$row['driverid']}</td>
                  <td>{$row['conductorid']}</td>
                  <td>{$row['state']}</td>
                        </tr>";
                }
              }
              echo "</table>
              </div>

              <div>
              <h1>Created Complains</h1>
              <table class=\"table table-bordered\">
                <thead>
                    <tr>
                      <th>Employee</th>
                      <th>Driver</th>
                      <th>Conductor</th>
                      <th>Description</th>
                    </tr>
                </thead>";
                $a = new FacadeInvoker();
                $s = $a->getCashier();
                $complains = $s[2];
                $did = -1;
                if ($complains!=null) {
                  foreach ($complains as $row) {
                    if ($did == $row['dutyid']) {
                      continue;
                    }
                    $did = $row['dutyid'];
                    echo "<tr>
                    <td class=\"Numplate\">{$row['Numplate']}</td>
                    <td>{$row['driverid']}</td>
                    <td>{$row['conductorid']}</td>
                    <td>{$row['Description']}</td>
                          </tr>";
                  }
                }
              echo "</table>
              </div>
              <div>
              <h1>Created Paysheets</h1>
              <table class=\"table table-bordered\">
                <thead>
                    <tr>
                      <th>Employee</th>
                      <th>Designation</th>
                      <th>Paid Month</th>
                      <th>Working Days</th>
                      <th>Basic Salary</th>
                      <th>OT Hours</th>
                      <th>OT Total</th>
                      <th>Salary</th>
                    </tr>
                </thead>";
                $a = new FacadeInvoker();
                $s = $a->getCashier();
                $paysheets = $s[3];
                if ($paysheets!=null) {
                  foreach ($paysheets as $row) {
                    echo "<tr>
                    <td class=\"Numplate\">{$row['employeeName']}</td>
                    <td>{$row['designation']}</td>
                    <td>{$row['paidFor']}</td>
                    <td>{$row['workingdays']}</td>
                    <td>{$row['basicsalary']}</td>
                    <td>{$row['othours']}</td>
                    <td>{$row['ottotal']}</td>
                    <td>{$row['totalsalary']}</td>
                          </tr>";
                  }
                }
                echo "</table>
                </div>";
        }

    ?>
    <a class="btn btn-secondary" href="admin.view.php" role="button">back</a>

</body>
<?php
include "../includes/Footerpart.php";
?>
</html>
