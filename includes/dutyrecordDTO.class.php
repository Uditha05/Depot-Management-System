<?php

class dutyrecordDTO{
    private $duty;
    private $bus;
    private $route;
    private $slot;
    private $ticketbook;
    private $driver;
    private $conducter;
    private $date;
    private $dispatch;
    private $dieselusage;
    private $cashamount;

    public function __construct($dutyid,$busid,$routeid,$slotid,$ticketbookid,$driverid,$conducterid,$date,$dispatch,$dieselusage,$cashamount){
        $this->duty = $dutyid;        
        $this->bus = $busid;        
        $this->route = $routeid;        
        $this->slot = $slotid;        
        $this->ticketbook = $ticketbookid;        
        $this->driver = $driverid;        
        $this->conducter = $conducterid;        
        $this->date = $date;        
        $this->dispatch = $dispatch;        
        $this->dieselusage = $dieselusage;
        $this->cashamount = $cashamount;

    }

    public function giveduty()
    {
        return $this->duty;
    }
    public function givebus ()
    {
        return $this->bus;
    }
    public function giveroute()
    {
        return $this->route;
    }
    public function giveslot()
    {
        return $this->slot;
    }
    public function giveticket()
    {
        return $this->ticketbook;
    }
    public function givedriv()
    {
        return $this->driver;
    }
    public function givecond()
    {
        return $this->conducter;
    }
    public function givedate()
    {
        return $this->date;
    }
    public function givedis()
    {
        return $this->dispatch;
    }
    public function givedies()
    {
        return $this->dieselusage;
    }
    public function givecashamount()
    {
        return $this->cashamount;
    }

}
?>