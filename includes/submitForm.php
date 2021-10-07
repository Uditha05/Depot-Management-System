<?php
include 'class-autoload.inc.php';

  if($_GET['page']=="tbInitiate"){
    $factory = new ControllerFactory();
    $cashierObj = $factory->getController("CASHIER");
    $cashierObj->submitForm($_GET['dutyId'],$_GET['bookId'],$_GET['tktnum']);
  }elseif ($_GET['page']=="dRecClose") {
    $factory = new ControllerFactory();
    $cashierObj = $factory->getController("CASHIER");
    $cashierObj->submitDRCloseForm($_GET['dutyId'],$_GET['bookId'],$_GET['tktnum'],$_GET['amount'],$_GET['busStatus']);
  }elseif ($_GET['page']=="complainCreate") {
    $factory = new ControllerFactory();
    $cashierObj = $factory->getController("CASHIER");
    $cashierObj->submitComplainForm($_GET['dutyId'],$_GET['complainText']);
  }elseif ($_GET['page']=="createPaysheet") {
    $factory = new ControllerFactory();
    $cashierObj = $factory->getController("CASHIER");
    $out = $cashierObj->savePaysheet($_GET['year'],$_GET['month'],$_GET['designation'],$_GET['employee'],$_GET['empid'],$_GET['workingdays'],$_GET['dailyamount'],$_GET['basicsalary'],$_GET['othours'],$_GET['hourlyotamount'],$_GET['ottotal'],$_GET['totalsalary'],$_GET['bonusNames'],$_GET['bonusValues']);

    echo $out;
  }elseif ($_GET['page']=="givePermission") {
    $factory = new ControllerFactory();
    $userObj = $factory->getController("USER");
    $pwd = sha1($_GET['pwd']);
    $userObj->setEmailPass($_GET['username'],$pwd);
    if ($userObj->can_login()) {
      echo "true";
    } else {
      echo "false";
    }

  }

?>
