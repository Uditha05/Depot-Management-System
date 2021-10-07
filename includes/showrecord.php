<?php
  include 'class-autoload.inc.php';

  if ($_GET['dutyId'] != "" and $_GET['page']=="dRecClose") {
    $factory = new ControllerFactory();
    $cashierObj = $factory->getController("CASHIER");
    $result = $cashierObj->showSelectedDutyRecordbyid($_GET['dutyId']);

    echo "<div id=\"recordDiv\" value=\"{$result[0]['dutyid']}\"><p>Plate Number : {$result[0]['busid']}<br>
          Driver Name : {$result[0]['driverid']}<br>
          Conductor Name : {$result[0]['conductorid']}</p>
          </div>
          <div>
            <div id=\"tktbknumdiv\">
              <label for=\"tktbknuminput\">Ticket Book number:</label>
              <div id=\"tktbktxt\">
                <input type=\"text\" class=\"tktbkinput\" id=\"tktbknuminput\" name=\"tktbknuminput\" disabled value=\"{$result[0]['ticketbookid']}\">
              </div>
            </div>
            <div id=\"tktnumdiv\">
              <label id=\"tktnumlbl\" for=\"tktnum\" >Ticket number:</label>
              <div id=\"tktnumtxt\">
                <input type=\"text\" class=\"tktbkinput\" id=\"tktnum\" name=\"tktnum\" value=\"\">
              </div>
            </div>
            <div id=\"cashamountdiv\">
              <label id=\"cashamountlbl\" for=\"amountinput\" >Cash amount(Rs):</label>
              <div id=\"amountinputdiv\">
                <input type=\"text\" class=\"amountinput\" id=\"amount\" name=\"amountinput\" value=\"\">
              </div>
            </div>
          </div>";

  }else if ($_GET['dutyId'] != "" and $_GET['page']=="tbInitiate"){
    $factory = new ControllerFactory();
    $cashierObj = $factory->getController("CASHIER");
    $result = $cashierObj->showSelectedDutyRecordbyid($_GET['dutyId']);

    echo "<div id=\"recordDiv\" value=\"{$result[0]['dutyid']}\"><p>Plate Number : {$result[0]['busid']}<br>
          Driver Name : {$result[0]['driverid']}<br>
          Conductor Name : {$result[0]['conductorid']}</p></div>";

  }else if ($_GET['dutyId'] != "" and $_GET['page']=="createComplain"){
    $factory = new ControllerFactory();
    $cashierObj = $factory->getController("CASHIER");
    $result = $cashierObj->showSelectedDutyRecordbyid($_GET['dutyId']);

    echo "<div id=\"recordDiv\" value=\"{$result[0]['dutyid']}\"><p>Plate Number : {$result[0]['busid']}<br>
          Driver Name : {$result[0]['driverid']}<br>
          Conductor Name : {$result[0]['conductorid']}</p></div>";

  }

  ?>
