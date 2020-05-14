<?php 
include 'dbh.class.php';
class Transporter extends Dbh{

	//
	protected function getBusList($disP){

		// $sql = 'SELECT busNo FROM bustable WHERE status = "parking" ';
		if ($disP) {
			$sql = 'SELECT dutyrecordnew.busid ,bus.numplate FROM dutyrecordnew INNER JOIN bus ON dutyrecordnew.busid = bus.busid WHERE dutyrecordnew.state = "wating"';
		}else{
			$sql = 'SELECT dutyrecordnew.busid ,bus.numplate FROM dutyrecordnew INNER JOIN bus ON dutyrecordnew.busid = bus.busid WHERE dutyrecordnew.state = "dispatched"';
		}
		
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	protected function markDis($busno,$diesel){
		date_default_timezone_set("Asia/Colombo");
		$timenow = date("H:i:s");
		$sql = 'UPDATE dutyrecordnew SET state = "dispatched" , dieselusage = ? , DispatchTime = ? WHERE busid = ? AND state = "wating"';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$diesel,$timenow,$busno]);


	}
	protected function markArr($busno){
		$sql = 'UPDATE dutyrecordnew SET state = "Arrived"  WHERE busid = ? AND state = "dispatched" ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$busno]);

		
	}



}