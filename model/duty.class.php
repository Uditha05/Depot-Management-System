<?php 
//include 'dbh.class.php';

class DutySave extends Dbh{
	public function objSave($busid,$routeid,$timeid,$ticketbook,$driverid,$conductorid)
	{
		$sql = 'INSERT INTO dutyRecord(busid,routeid,tid,ticketbookid,driverid,conductorid) VALUES (?,?,?,?,?,?)';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$busid,$routeid,$timeid,$ticketbook,$driverid,$conductorid]);

		if ($stmt) {
			echo "Duty has Added";
		}
	}

}


 ?>