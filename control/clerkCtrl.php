
<?php 
include "../model/clerk.class.php";
class ClerkCtrl extends Clerk{

	public function addNewDuty($busNO,$destination,$conductor,$driver){
		$this->addDuty($busNO,$destination,$conductor,$driver);
	}
} 


 ?>