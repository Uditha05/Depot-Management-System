<?php 
include 'dbh.class.php';


class User extends Dbh{
	// get user fron user list table
	protected function getUser($email,$pwd){
		$sql = 'SELECT * FROM userlist WHERE email = ? AND password = ? LIMIT 1 ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$email , $pwd]);
	

		$results = $stmt->fetch();
		return $results;
	}
}

