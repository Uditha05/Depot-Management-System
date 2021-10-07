<?php
class routeDTO{
    private $routeid;
    private $routename;
    private $description;
    private $routenumber;
    private $distance;

    public function __construct($routeid,$routename,$description,$routenumber,$distance){
        $this->routeid=$routeid;
        $this->routename=$routename;
        $this->description=$description;
        $this->routenumber=$routenumber;
        $this->distance=$distance;

    }

    public function giveRid(){
    	return  $this->routeid;
    }
    public function giveRname(){
    	return  $this->routename;
    }
    public function givedes(){
    	return  $this->description;
    }
    public function giveroutenumber(){
    	return  $this->routenumber;
    }
    public function givedistance(){
        return $this->distance;
    }


}
?>
