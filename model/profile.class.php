<?php 
include 'dbh.class.php';

/**
 * 
 */
class Profile extends Dbh
{
	protected function giveDetails($userid){
		$sql = "SELECT first_name,designation,email FROM userlist WHERE id = ?";
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$userid]);
		$result = $stmt->fetch();
		return $result;
	}
	protected function updatePass($userid,$pass){
		$sql = "UPDATE userlist SET password = ? WHERE id = ?";
		$stmt = $this->connection()->prepare($sql);
		if ($stmt->execute([$pass,$userid])) {
			header('location:../view/profile.php?change=ok');
		}else{
			header('location:../view/profile.php?change=no');
		}			
	}

}


 ?>