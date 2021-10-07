<?php

class ComplainDTO{
    private $compid;
    private $dutyid;
    private $description;
    private $date;
    private $state;

    public function __construct($compid, $dutyid, $description, $date, $state){
        $this->compid=$compid;
        $this->dutyid=$dutyid;
        $this->description=$description;
        $this->date=$date;
        $this->state=$state;
    }

    public function getCompid(){
        return $this->compid;
    }
    public function getdutyid(){
        return $this->dutyid;
    }
    public function getdescription(){
        return $this->description;
    }
    public function getdate(){
        return $this->date;
    }
    public function getstate(){
        return $this->state;
    }
}

?>
