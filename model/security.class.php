<?php 

include 'dbh.class.php';

class Security extends Dbh{
	public function giveNameId(){
		$sql = 'SELECT id,first_name FROM employee';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();
		

		return $stmt;
	}
}// end class

?>