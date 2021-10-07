<?php
  include 'class-autoload.inc.php';

    if ($_GET['destination'] == "0") {
      echo "<label for=\"appt\">Select a Time Slot:</label>
        <select name=\"timeslot\" id=\"timeslot\" style=\"width:500px;\" disabled>
        <option value=\"0\">Select Time</option>
      </select>";
    }else {
      $day = date("l");
      $destination = $_GET['destination'];
      $factory = new ControllerFactory();
      $clerkObj = $factory->getController("CLERK");
      $timeslot = $clerkObj->giveTimeslot($day,$destination);

      echo "<label for=\"appt\">Select a Time Slot:</label>
        <select name=\"timeslot\" id=\"timeslot\" style=\"width:500px;\">
        <option value=\"0\">Select Time</option>$timeslot
      </select>";
    }


?>
