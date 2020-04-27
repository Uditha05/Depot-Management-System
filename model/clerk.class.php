<?php 

include 'dbh.class.php';

class Clerk extends Dbh{

	//function to add duty record in table
	protected function addDuty($busNo,$desti,$conductor,$driver,$disTime){
		$sql = 'INSERT INTO dutytable(busNo,destination,driver,conductor,dispathTime) VALUES (?,?,?,?,?)';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$busNo,$desti,$conductor,$driver,$disTime]);
		
		$this->setAvaila($busNo);
	}

	// function to update bus table available value
	protected function setAvaila($busNo){
		$sql = 'UPDATE bustable SET availability = 1 WHERE busno = ?  LIMIT 1 ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$busNo]);
	}

	//function to get Driver & Conductor
	protected function getCon_Driver(){
		$sql = "SELECT firstname,attend,designation FROM attendance  INNER JOIN employee ON attendance.id = employee.id WHERE attend = 1";
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();

		return $stmt;
	}


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