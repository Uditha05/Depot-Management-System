<?php 
include 'dbh.class.php';
class Transporter extends Dbh{

	//
	protected function getBusList($isdis){
		if ($isdis) {
			$sql = 'SELECT busNo FROM dutytable WHERE is_disP = 1';
		}else{
			$sql = 'SELECT busNo FROM dutytable WHERE is_disP = 0';
		}

		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

}