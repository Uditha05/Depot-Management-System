<?php

/**
 *
 */
class Cashier extends Dbh
{

  protected function getRoutes()
  {

    $sql = "SELECT * FROM route";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;

  }

  protected function getTktBooks()
  {

    $sql = "SELECT * FROM ticketbook";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;

  }

  public function getSelectedtktbook($tktbkid)
  {
    $sql = "SELECT * FROM ticketbook WHERE ticketbookid = $tktbkid";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;
  }

  protected function getDutyRecords()
  {
    $sql = "SELECT * FROM dutyrecord";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;
  }

  protected function getbusRecord($busid)
  {
    $sql = "SELECT * FROM bus WHERE busid = $busid";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;
  }

  protected function getemployeeRecord($empid)
  {
    $sql = "SELECT * FROM employee WHERE empid = $empid";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;
  }

  public function getselectedDutyRecords($empname)
  {
    $sql = "SELECT * FROM dutyrecord, employee WHERE (dutyrecord.driverid=employee.empid OR dutyrecord.conductorid=employee.empid) AND (employee.FirstName LIKE '%$empname%' OR employee.LastName LIKE '%$empname%')";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;
  }

  public function getselectedDutyRecordbyid($did)
  {
    $sql = "SELECT * FROM dutyrecord, employee WHERE (dutyrecord.driverid=employee.empid OR dutyrecord.conductorid=employee.empid) AND (dutyrecord.dutyid=$did)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;
  }

}
?>
