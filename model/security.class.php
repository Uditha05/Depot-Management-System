<?php 

include 'dbh.class.php';



//class to deal data table with security page
class Security extends Dbh{
	
	//function to return Name and Id
	protected function giveNameId(){
		$sql = 'SELECT id,first_name FROM employee';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	//function to return employee from table
	protected function getEmp($id,$firstName){
		$sql = $sql = 'SELECT * FROM employee WHERE id = ? AND first_name = ? LIMIT 1 ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$id,$firstName]);
		
		$results = $stmt->fetch();
		return $results;
	}

	// function to insert data to table
	protected function markAtt($id,$firstName){
		$date = date("Y-m-d");
		date_default_timezone_set("Asia/India");
		$strat = date("h:i:sa");
		$sql = "INSERT INTO `attendance` (`id`, `firstname`, `attend`,`date`, `startTime`, `endTime`) VALUES (?, ?,1, ?, ?, '00:00:00')";
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$id,$firstName,$date,$strat]);

		return true;
	}

	//function to check already attendence
	protected function checkAttend($id,$firstName){
		$sql  = 'SELECT * FROM attendance WHERE id = ?  AND attend = 1 ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$id]);
		$results= $stmt->fetch();
		

		if (!empty($results)) {
			return true;
		}
		else{
			
			return false;	
		}
		
	}

	//function to update offtime and mark off
	protected function offEMP($id,$firstName){
		$date = date("Y-m-d");
		date_default_timezone_set("Asia/India");
		$strat = date("h:i:sa");
		$sql =  'UPDATE attendance SET endTime = ? , attend = 0 WHERE attend = 1 AND firstname = ?  LIMIT 1 ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$strat,$firstName]);
		if ($stmt) {
			return true;
		}else{
			return false;
		}
	
	}

}// end class

?>