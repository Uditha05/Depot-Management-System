<?php 
include_once "dbh.class.php";


class TimeTable extends Dbh{
	protected function todaySchedule($day){
		$sql = 'SELECT route.routeid,timeslottable.slotid,timetablenew.status,timeslottable.time,route.RouteName,route.Description FROM ((timetablenew INNER JOIN timeslottable ON timetablenew.slotid = timeslottable.slotid) INNER JOIN route ON timetablenew.routeid = route.routeid) WHERE timeslottable.day = ? ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$day]);

		return $stmt;
	}
	protected function getState($routes,$times){
		$today = date("Y-m-d");
		$sql = 'SELECT state FROM dutyrecordnew WHERE routeid = ? AND slotid = ? AND Date = ? LIMIT 1';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([$routes,$times,$today]);

		$result = $stmt->fetch();

		if ($result) {
			
			return $result['state'];
		}
		else{
			return  "pending";
		}
	}

	protected function allSchedule(){
		$sql = 'SELECT route.routeid,timeslottable.day,timeslottable.time,route.RouteName,route.Description FROM ((timetablenew INNER JOIN timeslottable ON timetablenew.slotid = timeslottable.slotid) INNER JOIN route ON timetablenew.routeid = route.routeid) ORDER BY timeslottable.day ';
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
}

 ?>