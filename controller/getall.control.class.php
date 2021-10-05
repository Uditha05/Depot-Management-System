<?php

//concreate command class 2
class GetallControl implements SuperCmd
{
    // command receiver Object
    private $querryDAO;

    public function __construct()
    {
        $this->querryDAO = new QuerryDAO();

    }


    // return all time table
    public function executefunction()
    {
        $tableRow = '';
		$result = $this->querryDAO->allSchedule();
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
