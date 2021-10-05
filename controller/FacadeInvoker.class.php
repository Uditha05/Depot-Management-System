<?php

class FacadeInvoker
{

public function getClerk(){
	$CtrlFac = new ControllerFactory();
	$Obj = $CtrlFac->getController("CLERK");
	$result = $Obj->giveToAdmin();

}

public function getTransporter(){
	$CtrlFac = new ControllerFactory();
	$Obj = $CtrlFac->getController("TRANSPORTER");
	$result = $Obj->giveToAdmin();
}

public function getCashier(){
	$CtrlFac = new ControllerFactory();
	$Obj = $CtrlFac->getController("CASHIER");
	$result = $Obj->giveToAdmin();

	return $result ;
}

public function getEngineer(){
	$CtrlFac = new ControllerFactory();
	$Obj = $CtrlFac->getController("ENGINEER");
	$result = $Obj->giveToAdmin();

	return $result ;
}

public function getSO(){
	$CtrlFac = new ControllerFactory();
	$Obj = $CtrlFac->getController("SO");
	$result = $Obj->giveToAdmin();

	return $result ;
}


}



 ?>
