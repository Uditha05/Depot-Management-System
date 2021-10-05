<?php
include "facademaker.inf.php";

class ClerkControl implements Facademaker{
	public $querryDAO;
	public $dutyDAO;

	public function __construct(){
        $this->querryDAO = new QuerryDAO();
        $this->dutyDAO = new dutyrecordDAO();
    }

	public function addNewDuty($feild){

		if ($this->checkEmpty($feild)) {
			header('location:../view/clerk.view.php?error=yes');
		}
		else{
			$dutyid ='';
			$busNO = $feild['busno'];
			$destination = $feild['desti'];
			$driver = $feild['driver'];
			$conductor = $feild['conductor'];
			$ticket = '';
			$timeslot = $feild['timeslot'];
			$date = date("Y/m/d");
			$dispatch = '';
			$dieselusage = 0;
			$cashamount = "";


			$DTObj1 = new dutyrecordDTO($dutyid,$busNO,$destination,$timeslot,$ticket,$driver,$conductor,$date,$dispatch,$dieselusage,$cashamount);


			$this->dutyDAO->save($DTObj1);
			$this->querryDAO->updateBusDriCon($busNO,$driver,$conductor);
			//header('location:../view/clerk.view.php?error=no');
		}

	}

	// give conductor list
	public function giveConductor(){
		$opt = '';
		$out = $this->querryDAO->getCon_Driver();

		while($row = $out->fetch()){

				if ($row['Designation'] == 'Conductor') {

					$opt.= "<option value=\"{$row['empid']}\">{$row['FirstName']}  {$row['LastName']}</option>";
				}

		}
		return $opt;
	}

	// give driver list
	public function giveDriver(){
		$opt = '';
		$out = $this->querryDAO->getCon_Driver();

		while($row = $out->fetch()){
				if ($row['Designation'] == 'Driver') {
					$opt.= "<option value=\"{$row['empid']}\">{$row['FirstName']} {$row['LastName']}</option>";
				}

		}
		return $opt;
	}

	// give bus list
	public function giveBus(){
		$opt = '';
		$out = $this->querryDAO->giveBusNO();

		while($row = $out->fetch()){
				$opt.= "<option value=\"{$row['busid']}\">{$row['Numplate']}</option>";
		}
		return $opt;
	}


	// give distination list
	public function giveDesti(){
		$opt = '';
		$out = $this->querryDAO->giveDestination();
		while($row = $out->fetch()){
				$opt.= "<option value=\"{$row['routeid']}\">{$row['RouteName']}</option>";
		}
		return $opt;
	}

	//give correct time slot
	public function giveTimeslot($day,$destination){
		$opt = '';

		$out = $this->querryDAO->giveTimes($day,$destination);
		while($row = $out->fetch()){
				$opt.= "<option value=\"{$row['slotid']}\">{$row['time']}</option>";
		}

		return $opt;
	}

	//check field is not empty
	public function checkEmpty($feild){
		foreach ($feild as $value) {
			if (empty($value) or $value=="Select Bus" or $value=="Select Destination" or $value=="Select Driver" or $value=="Select Conductor" or $value=="Select Time" or $value== null) {
				return true;
			}
		}
		return false;
	}


	public function giveToAdmin()
	{

		$opt = '';
		$out = $this->querryDAO->giveByclerk();

		//employee.FirstName,route.RouteName,timeslottable.time,bus.numplate
		foreach ($out as $row) {
			echo  "<tr><td>{$row['Numplate']}</td><td>{$row['FirstName']}</td><td>{$row['time']}</td><td>{$row['RouteName']}</td></tr>";

		}
	}






}





 ?>
