<?php
  include 'class-autoload.inc.php';

    if ($_GET['key'] != "" and $_GET['task'] == "loadOptions") {
      $factory = new ControllerFactory();
      $cashierObj = $factory->getController("CASHIER");
      $results = $cashierObj->showEmployees($_GET['key']);
      foreach ($results as $row){
        echo "<option id=\"{$row['empid']}\" value=\"{$row['FirstName']} {$row['LastName']}\">";
      }
    }else if ($_GET['key'] != "" and $_GET['task'] == "loadSalaryDetails") {
      $factory = new ControllerFactory();
      $cashierObj = $factory->getController("CASHIER");
      $results = $cashierObj->showSalaryDetails($_GET['key']);
      foreach ($results as $row) {
        echo "{$row['DaySal']}.00,{$row['HourOt']}.00";
      }
    }else if ($_GET['key'] != "" and $_GET['task'] == "loadEmployeeDetails") {
      $factory = new ControllerFactory();
      $cashierObj = $factory->getController("CASHIER");
      $results = $cashierObj->showEmployeeSalaryDetails($_GET['key'],$_GET['year'],$_GET['month'],$_GET['dailyamount'],$_GET['hourlyotamount']);
      echo $results;
    }else{

    }


?>
