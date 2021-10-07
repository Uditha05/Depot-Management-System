<?php
include 'class-autoload.inc.php';

$factory = new ControllerFactory();
$cashierObj = $factory->getController("CASHIER");
$cashierObj->submitTicketBook($_GET['bookid'],$_GET['strttktnum'],$_GET['endtktnum']);

?>
