<?php

class AttendancerecordDAO implements CrudDAO{
    private $dbconnection;
    public function __construct(){
        $this->dbconnection= Dbh:: getInstance();
    }
    public function save($savable){
        $id = $savable->getEmpid();
        $time = date("h:i:s");
        $date = date("Y-m-d");
        $sql="INSERT INTO attendancerecord(aid,empid, Date, ontime,offtime,available)
        VALUES ('',?,'$date','$time','','1')";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    public function update($updatable){
        $id = $updatable->getEmpid();
        $time = date("h:i:s");
        $sql="UPDATE attendancerecord SET offtime='$time', available='0' WHERE empid='$id'";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute();
    }

    public function search($searchable){
        $empid=$searchable->getEmpid();
        $sql_off="SELECT * FROM attendancerecord WHERE empid = ?";
        $stmt_off = $this->dbconnection->connect()->prepare($sql_off);
        $stmt_off->execute([$empid]);
        $result_off =$stmt_off->fetchAll();
        if ($result_off == NULL){
            return NULL;
        }else{
          return $result_off;
        }

    }

    public function delete($deletable){
        $date = date("Y-m-d");
        $time = date("h:i:s");
    }

    public function getAll(){
        $date = date("Y-m-d");
        $time = date("h:i:s");
    }


}
?>
