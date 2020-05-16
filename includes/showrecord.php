<?php
  include 'class-autoload.inc.php';

  if ($_GET['r'] != "") {
    $cashierObj = new CashierContrl();
    $result = $cashierObj->showSelectedDutyRecordbyid($_GET['r']);

    echo "<div id=\"recordDiv\" value=\"{$result[0]['dutyid']}\"><p>Plate Number : {$result[0]['busid']}<br>
          Driver Name : {$result[0]['driverid']}<br>
          Conductor Name : {$result[0]['conductorid']}</p></div>";

  }

  ?>
