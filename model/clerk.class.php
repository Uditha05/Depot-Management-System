<?php 

include 'dbh.class.php';

class Clerk extends Dbh{

	//function to add duty record in table
	protected function addDuty($busNO,$destination,$conductor,$driver,$ticket,$timeslot){
		$today = date("Y-m-d");
		
		$sql = 'INSERT INTO dutyRecordNew (busid,routeid,slotid,ticketbookid,driverid,conductorid,Date) VALUES (?,?,?,?,?,?,?)';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$busNO,$destination,$timeslot,$ticket,$driver,$conductor,$today]);
		
		$this->setAvaila($busNO);
		$this->setDriver_ConductorAvai($driver);
		$this->setDriver_ConductorAvai($conductor);
		$this->setTicketBookAvai($ticket);

	}

	// function to update bus table available value
	protected function setAvaila($busNO){
		$sql = 'UPDATE bus SET State = "running" WHERE busid = ?  LIMIT 1 ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$busNO]);
	}

	//function to set driver and conductor unable
	protected function setDriver_ConductorAvai($empid){
		$sql = 'UPDATE attendencerecord SET available = 0 WHERE empid = ?  LIMIT 1 ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$empid]);
	}
	//function to set ticketbook unable
	protected function setTicketBookAvai($ticketbookid){
		$sql = 'UPDATE ticketBook SET State = "unavailable" WHERE ticketbookid = ?  LIMIT 1 ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$ticketbookid]);
	}

	//function to get Driver & Conductor
	protected function getCon_Driver(){
		$sql = "SELECT employee.empid, employee.FirstName,employee.Designation ,attendencerecord.available FROM employee INNER JOIN attendencerecord ON employee.empid = attendencerecord.empid WHERE attendencerecord.available = 1" ;
	
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();

		return $stmt;
	}


	// get available bus form bus table
	protected function giveBusNO(){
		$sql = 'SELECT busid,numplate FROM bus WHERE State = "parking"';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	// function to get destination from route table
	protected function giveDestination(){
		$sql = 'SELECT RouteName,routeid FROM route';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	//function to get ticket book from ticket table
	protected function giveTicketB(){
		$sql = 'SELECT ticketbookid FROM ticketBook WHERE State = "available"';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	//function to get time slot from time slot
	protected function giveTimes(){
		$day = date("l");

		$sql = 'SELECT slotid,time FROM timeslottable WHERE day = ?';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$day]);
		return $stmt;
	}

}
 ?>