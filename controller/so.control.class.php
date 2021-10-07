<?php

//include "FacadeMaker.inf.php";

class SoControl{
    public $attendanceT;
    public $querry;
    public function __construct(){
        $this->attendanceT = new AttendancerecordDAO();
        $this->querry = new QuerryDAO();
    }

    public function showusers($id){
        $results = $this->getUser($id);
        while ($row = $results){
            echo $row;
        }
    }

    public function addrecord($id){
        if ($this->checkID_employee($id) AND $this->checkID_att($id)){
            $this->addAttendance($id);
            echo "done";
        }
        else{
            echo "Incorrect ID";
        }

    }

    public function offrecord($id){
        if (!$this->markOff($id)){
            echo "record not found";
        }
        else{echo"done";}

    }

    //marking attendance
    public function markattendance($obj){
        //check whether it is an valid id
        if ($this->querry->checkID_employee($obj->getEmpid())){
            //check whether there is already a unleaved attendance record(true if not have live attended record)
            $res=$this->attendanceT->search($obj);

            if ($res==NULL){
                //mark the attendance
                $this->attendanceT->save($obj);
                echo 'done';
            }
            else{echo 'marked as attended before';}
        }
        else{
            echo"Incorrect ID";
        }
    }

    //mark off time of an attended employee
    public function markoff($obj){
        //check whether there is already a unleaved attendance record(true if not have live attended record)
        if ($this->querry->checkID_employee($obj->getEmpid())){
            $res=$this->attendanceT->search($obj);
            //if true that means there isnt a attendance record
            if ($res==NULL){
                echo 'not attended before';
            }
            else{
                $this->attendanceT->update($obj);
                echo "done";
            }
        }
        else{
            echo"Incorrect ID";
        }
    }
    //search emplyee by id and return the details to display
    public function displayEmployeeById($empid){
        return $this->querry->getEmployeeByID($empid);
    }
    //give the attended worker list to the admin on a curresponding date
    public function givetoadmin(){
        //funcion to call
        $display="<table class=\"table table-bordered\">";
        $attended=$this->querry-> getAttendedEmployee();
        $display.="<tr><th>Employee</th><th>ON_time</th></tr>";

        foreach($attended as $row){
            $display.="<tr>";
            $display.="<td>{$row['FirstName']}</td>";
            $display.="<td>{$row['ontime']}</td>";
            $display.="</tr>";
        }
        $display.="</table>";
        return $display;

    }

}



?>
