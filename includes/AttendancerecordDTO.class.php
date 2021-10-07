<?php
class AttendancerecordDTO{
    private $empid;
    private $date;
    private $ontime;
    private $offtime;
    private $available;

    public function __construct($empid,$date,$ontime,$offtime,$available){
        $this->empid=$empid;
        $this->date=$date;
        $this->ontime=$ontime;
        $this->offtime=$offtime;
        $this->available=$available;
    }

    public function getEmpid(){
        return $this->empid;
    }
    public function getDate(){
        return $this->date;
    }
    public function getOntime(){
        return $this->ontime;
    }
    public function getOfftime(){
        return $this->offtime;
    }
    public function getAvailable(){
        return $this->available;
    }
}
?>
