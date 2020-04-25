
<?php 
include "../model/clerk.class.php";


class ClerkCtrl extends Clerk{

	public function addNewDuty($feild){
		$busNO = $feild['busno'];
		$destination = $feild['desti'];
		$driver = $feild['driver'];
		$conductor = $feild['conductor'];
		$disTime = $feild['appt'];
		if ($this->checkEmpty($feild)) {
			header('location:../view/clerkView.php?error=yes');
		}
		else{
			$this->addDuty($busNO,$destination,$conductor,$driver,$disTime);
			header('location:../view/clerkView.php?error=no');
		}
		
	}

	// public function GiveConductor(){
	// 	$opt = '';
	// 	$out = $this->giveConductorName();

	// 	while($row = $out->fetch()){
	// 			$opt.= "<option value=\"{$row['firstname']}\">{$row['firstname']}</option>";				
	// 	}	
	// 	return $opt;	
	// }
	// public function GiveDriver(){
	// 	$opt = '';
	// 	$out = $this->giveDriverName();

	// 	while($row = $out->fetch()){
	// 			$opt.= "<option value=\"{$row['firstname']}\">{$row['firstname']}</option>";				
	// 	}	
	// 	return $opt;	
	// }
	public function giveBus(){
		$opt = '';
		$out = $this->giveBusNO();

		while($row = $out->fetch()){
				$opt.= "<option value=\"{$row['busno']}\">{$row['busno']}</option>";				
		}	
		return $opt;	
	}
	public function giveDesti(){
		$opt = '';
		$out = $this->giveDestination();
		while($row = $out->fetch()){
				$opt.= "<option value=\"{$row['destination']}\">{$row['destination']}</option>";				
		}	
		return $opt;	
	}

	public function checkEmpty($feild){
		foreach ($feild as $value) {
			if (empty($value)) {
				return true;
			}
		}
		return false;
	}
} 


 ?>