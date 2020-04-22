<?php 

include 'dbh.class.php';

class Clerk extends Dbh{
	protected function addDuty($busNo,$desti,$conductor,$driver){
		$sql = 'INSERT INTO dutytable(busNo,destination,driver,conductor) VALUES (?,?,?,?)';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$busNo,$desti,$conductor,$driver]);
		echo "successfully add";
	}
	protected function getAttendence(){
		#return driver and conductor table
	}
	protected function getAvilableBus(){
		#return available bus no
	}
}
 ?>