<?php 
include 'dbh.class.php';
class Transporter extends Dbh{

	//
	protected function getBusList(){
		$sql = 'SELECT busNo FROM bustable WHERE status = "parking" ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	protected function markDis($busno,$diesel){
		$
		$sql = 'UPDATE dutyRecord SET  ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$busno,$diesel]);

		$this->setAvailablity($busno,true);
	}
	protected function markArrive($busno){
		$sql = 'UPDATE ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$busno]);

		$this->setAvailablity($busno,false);
	}

	protected function setAvailablity($busno,$dipatch){
		if ($dipatch) {
			$state = 'running'
		}else{
			$state = 'parking'
		}
		$sql = 'UPDATE ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$busno,$state]);
	}	
	protected function updateTime($busno){
		$sql = 'UPDATE ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$busno]);
	}

}