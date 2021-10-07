<?php
class SalaryDTO{
    private $sid;
    private $Designation;
    private $DaySal;
    private $HourOt;

    public function __construct($sid,$Designation,$DaySal,$HourOt){
        $this->sid=$sid;
        $this->Designation=$Designation;
        $this->DaySal=$DaySal;
        $this->HourOt=$HourOt;
    }

    public function getSid(){
        return $this->sid;
    }
    public function getDesignation(){
        return $this->Designation;
    }
    public function getDaySal(){
        return $this->DaySal;
    }
    public function getHourOt(){
        return $this->HourOt;
    }
}
?>
