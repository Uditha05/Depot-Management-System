<?php 

include_once "../model/timeTable.class.php";


class TimeTableCtrl extends TimeTable
{
	private $day;
	public function __construct($day)
	{
		$this->day = $day;
	}

	public function getTodaySchedule(){
		$tableRow = '';
		$result = $this->todaySchedule($this->day);
		while ($row = $result->fetch()) {
			$routes = $row['routeid'];
			$times = $row['slotid'];
			$states = $this->getState($routes,$times);
			 
			$tableRow.= "<tr>";
			$tableRow.= "<td>{$row['RouteName']}</td>";
			$tableRow.= "<td>{$row['time']}</td>";
			$tableRow.= "<td>{$states}</td>";
			$tableRow.= "<td>{$row['Description']}</td>";
			$tableRow.= "</tr>";
		}

		return $tableRow;
	}
	public function getAllTable(){
		$tableRow = '';
		$result = $this->allSchedule();
		while ($row = $result->fetch()) {

			$tableRow.= "<tr>";
			$tableRow.= "<td>{$row['RouteName']}</td>";
			$tableRow.= "<td>{$row['day']}</td>";
			$tableRow.= "<td>{$row['time']}</td>";
			$tableRow.= "<td>{$row['Description']}</td>";
			$tableRow.= "</tr>";
		}

		return $tableRow;
	}
}




 ?>

