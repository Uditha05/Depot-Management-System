<?php
/*include "CrudDAO.inf.php";*/
//include "dbh.class.php";


class salaryDAO implements CrudDAO{
    private $dbconnection;
    public function __construct(){
        $this->dbconnection= Dbh :: getInstance();
    }
    public function save($savable){
        $Designation = $savable->Designation;
        $DaySal = $savable->DaySal;
        $HourOt = $savable->HourOt;
        $sql="INSERT INTO `salary`(`Designation`, `DaySal`, `HourOt`) VALUES (?,?,?)";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$Designation,$DaySal,$HourOt]);
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
        $sid=$searchable->getSid();
        $sql_off="SELECT * FROM `salary` WHERE `sid`=?";
        $stmt_off = $this->dbconnection->connect()->prepare($sql_off);
        $stmt_off->execute([$sid]);
        $result_off =$stmt_off->fetchAll();
        if ($result_off == NULL){
            return NULL;
        }else{
          return $result_off;
        }

    }

    public function delete($deletable){
      $sid = $deletable->sid;
      $sql="DELETE FROM `salary` WHERE `sid`=?";
      $stmt = $this->dbconnection->connect()->prepare($sql);
      $stmt->execute([$sid]);
    }

    public function getAll(){
        $sql = "SELECT * FROM `salary`";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }


}
?>
