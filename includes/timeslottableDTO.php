<?php 

class TimeslottableDTO
{
    private $slotid;
    private $time;
    private $day;

    public function __construct($slotid,$time,$day){
        $this->slotid=$slotid;
        $this->time=$time;
        $this->day=$day;
        
    }

    public function giveSlot(){
    	return $this->slotid;
    }
    public function givetime(){
    	return $this->time;
    }
    public function giveday(){
    	return $this->day;
    }


}

?>