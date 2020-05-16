<?php
  include 'class-autoload.inc.php';

    if ($_GET['q'] == "default") {
      echo "<input type=\"text\" id=\"tktnum\" name=\"tktnum\" disabled value=\"\">";
    }else {
      $cashierObj = new CashierContrl();
      $results = $cashierObj->showSelectedtktbook($_GET['q']);
      foreach ($results as $row){
        echo "<input type=\"text\" id=\"tktnum\" name=\"tktnum\" disabled value=\"{$row['CurruntNumber']}\">";
      }
    }


?>
