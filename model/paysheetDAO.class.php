<?php
/*include "CrudDAO.inf.php";*/
//include "dbh.class.php";


class PaysheetDAO implements CrudDAO{
    private $dbconnection;
    public function __construct(){
        $this->dbconnection= Dbh :: getInstance();
    }
    public function save($savable){
        $empid=$savable->getEmpid();
        $date=$savable->getDate();
        $paidFor=$savable->getPaidFor();
        $designation=$savable->getDesignation();
        $employee=$savable->getEmployee();
        $workingdays=$savable->getWorkingdays();
        $dailyamount=$savable->getDailyamount();
        $basicsalary=$savable->getBasicsalary();
        $othours=$savable->getOthours();
        $hourlyotamount=$savable->getHourlyotamount();
        $ottotal=$savable->getOttotal();
        $totalsalary=$savable->getTotalsalary();
        $bonusNames=$savable->getBonusNames();
        $bonusValues=$savable->getBonusValues();
        $sql="INSERT INTO `paysheet`(`empid`, `Date`, `paidFor`, `designation`, `employeeName`, `workingdays`, `dailyamount`, `basicsalary`, `othours`, `hourlyotamount`, `ottotal`, `totalsalary`, `bonusNames`, `bonusValues`) VALUES (?,CURRENT_DATE,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$empid,$paidFor,$designation,$employee,$workingdays,$dailyamount,$basicsalary,$othours,$hourlyotamount,$ottotal,$totalsalary,$bonusNames,$bonusValues]);
    }

    public function update($updatable){
        $sid = $updatable->sid;
        $Designation = $savable->Designation;
        $DaySal = $savable->DaySal;
        $HourOt = $savable->HourOt;
        $sql="UPDATE `salary` SET `Designation`=?,`DaySal`=?,`HourOt`=? WHERE `sid`=?";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$Designation,$DaySal,$HourOt,$sid]);
    }

    public function search($searchable){
        $sid=$searchable->sid;
        $sql_off="SELECT `Designation`, `DaySal`, `HourOt` FROM `salary` WHERE `sid`=?";
        $stmt_off = $this->dbconnection->connect()->prepare($sql_off);
        $stmt_off->execute([$sid]);
        $result_off =$stmt_off->fetchAll();
        if ($result_off == NULL){
            return true;
        }
        else{return false;}

    }

    public function delete($deletable){
      $sid = $deletable->sid;
      $sql="DELETE FROM `salary` WHERE `sid`=?";
      $stmt = $this->dbconnection->connect()->prepare($sql);
      $stmt->execute([$sid]);
    }

    public function getAll(){
        $sql = "SELECT * FROM `paysheet`";
        $stmt = $dbh->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result == NULL){
            return NULL;
        }else{
          return $result;
        }
    }


}
?>
