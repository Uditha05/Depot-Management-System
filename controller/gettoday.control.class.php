<?php

//concreate command class 1
class GettodayControl implements SuperCmd
{
	public $day;

	// command receiver Object
	public $querryDAO;

	public function __construct()
	{
		$this->day = date("l");
        $this->querryDAO = new QuerryDAO();

	}


	// return only today scheduling
	public function executefunction(){
    	$tableRow = '';
		$result = $this->querryDAO->todaySchedule($this->day);
		while ($row = $result->fetch()) {
			$routes = $row['routeid'];
			$times = $row['slotid'];
			$states = $this->querryDAO->getState($routes,$times);

			$tableRow.= "<tr>";
			$tableRow.= "<td>{$row['RouteName']}</td>";
			$tableRow.= "<td>{$row['time']}</td>";
			$tableRow.= "<td>{$states}</td>";
			$tableRow.= "<td>{$row['Description']}</td>";
			$tableRow.= "</tr>";
		}

		return $tableRow;
	}

}




 ?>
