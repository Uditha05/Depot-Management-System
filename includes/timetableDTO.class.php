<?php
class TimetableDTO{
    private $tid;
    private $routeid;
    private $status;
    private $slotid;

    public function __construct($tid,$routeid,$status,$slotid){
        $this->tid=$tid;
        $this->routeid=$routeid;
        $this->status=$status;
        $this->slotid=$slotid;
        
    }

    public function givetid(){
        return $this->tid;
    }
    public function giverid(){
        return $this->routeid;
    }
    public function givestate(){
        return $this->status;
    }
    public function givesloid(){
        return $this->slotid;
    }


}
?>