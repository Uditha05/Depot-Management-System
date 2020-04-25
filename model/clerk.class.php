<?php 

include 'dbh.class.php';

class Clerk extends Dbh{

	//function to add duty record in table
	protected function addDuty($busNo,$desti,$conductor,$driver,$disTime){
		$sql = 'INSERT INTO dutytable(busNo,destination,driver,conductor,dispathTime) VALUES (?,?,?,?,?)';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$busNo,$desti,$conductor,$driver,$disTime]);
	
	}


	// protected function getAttendence(){
	// 	#return driver and conductor table
	// }
	// protected function getAvilableBus(){
	// 	#return available bus no
	// }

	// get available bus form bus table
	protected function giveBusNO(){
		$sql = 'SELECT busno FROM bustable WHERE availability = 0';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	// function to get destination from route table
	protected function giveDestination(){
		$sql = 'SELECT destination FROM route';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

}
 ?>