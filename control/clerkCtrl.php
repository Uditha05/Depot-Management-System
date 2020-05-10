
<?php 
include "../model/clerk.class.php";
include "../model/duty.class.php";


class ClerkCtrl extends Clerk{

	public function addNewDuty($feild){

		if ($this->checkEmpty($feild)) {
			header('location:../view/clerkView.php?error=yes');
		}
		else{
			$busNO = $feild['busno'];
			$destination = $feild['desti'];
			$driver = $feild['driver'];
			$conductor = $feild['conductor'];
			$ticket = $ticket['ticketbook'];
			$timeslot = $feild['timeslot'];
			$this->addDuty($busNO,$destination,$conductor,$driver,$disTime);
			header('location:../view/clerkView.php?error=no');
		}
		
	}

	// give conductor list
	public function giveConductor(){
		$opt = '';
		$out = $this->getCon_Driver();
		
		while($row = $out->fetch()){
				if ($row['designation'] == 'conductor') {
					$opt.= "<option value=\"{$row['empid']}\">{$row['FirstName']}</option>";
				}
								
		}	
		return $opt;	
	}

	// give driver list
	public function giveDriver(){
		$opt = '';
		$out = $this->getCon_Driver();

		while($row = $out->fetch()){
				if ($row['designation'] == 'driver') {
					$opt.= "<option value=\"{$row['empid']}\">{$row['FirstName']}</option>";
				}
								
		}	
		return $opt;	
	}

	// give bus list
	public function giveBus(){
		$opt = '';
		$out = $this->giveBusNO();

		while($row = $out->fetch()){
				$opt.= "<option value=\"{$row['busid']}\">{$row['busid']}</option>";				
		}	
		return $opt;	
	}

	// give ticket book list
	public function giveTicketBook(){
		$opt = '';
		$out = $this->giveTicketB();

		while($row = $out->fetch()){
				$opt.= "<option value=\"{$row['ticketbookid']}\">{$row['tiketbookid']}</option>";				
		}	
		return $opt;	
	}

	// give distination list
	public function giveDesti(){
		$opt = '';
		$out = $this->giveDestination();
		while($row = $out->fetch()){
				$opt.= "<option value=\"{$row['routeid']}\">{$row['RoutrName']}</option>";				
		}	
		return $opt;	
	}

	//give correct time slot 
	public function giveTimeslot(){
		$opt = '';
		$out = $this->giveTime();
		while($row = $out->fetch()){
				$opt.= "<option value=\"{$row['tid']}\">{$row['time']}</option>";				
		}	
		return $opt;	
	}

	//check field is not empty
	public function checkEmpty($feild){
		foreach ($feild as $value) {
			if (empty($value)) {
				return true;
			}
		}
		return false;
	}
} 


/**
 * 
 */
class Duty extends DutySave
{	
	private $busid ;
	private $routeid ;
	private $timeid;
	private $ticketbook;
	private $driverid;
	private $conductorid;
	

	public function __construct($busid,$routeid,$timeid,$ticketbook,$driverid,$conductorid)
	{
		$this->busid = $busid;
		$this->routeid = $routeid;
		$this->timeid= $timeid;
		$this->ticketbook= $ticketbook;
		$this->driverid = $driverid;
		$this->conductorid = $conductorid;

	}

	public function saveDuty(){
		$this->objSave($this->busid,$this->routeid,$this->timeid,$this->ticketbook,$this->driverid,$this->conductorid);
	}
}


 ?>