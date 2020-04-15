<?php 
include 'dbh.class.php';


class User extends Dbh{
	protected function getUser($email,$pwd){

		// try{
			$sql = 'SELECT * FROM userlist WHERE email = ? AND password = ? LIMIT 1 ';
			$stmt = $this->connection()->prepare($sql);
			$stmt->execute([$email , $pwd]);
		// }catch(Exception $e){
		// 	return $e;
		// }

		$results = $stmt->fetch();
		return $results;
	}
}

