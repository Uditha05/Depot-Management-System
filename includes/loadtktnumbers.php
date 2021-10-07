<?php
  include 'class-autoload.inc.php';

    if ($_GET['tktBookId'] == "default") {
      echo "<input type=\"text\" id=\"tktnum\" name=\"tktnum\" disabled value=\"\">";
    }else {
      $factory = new ControllerFactory();
      $cashierObj = $factory->getController("CASHIER");
      $results = $cashierObj->showSelectedtktbook($_GET['tktBookId']);

      echo "<input type=\"text\" id=\"tktnum\" name=\"tktnum\" disabled value=\"{$results[0]['CurruntNumber']}\">";
    }


?>
