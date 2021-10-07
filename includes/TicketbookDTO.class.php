<?php
class TicketbookDTO{
    private $ticketbookid;
    private $Tickets;
    private $CurrentNumber;
    private $StartNumber;
    private $EndNumber;
    private $State;

    public function __construct($ticketbookid,$Tickets,$CurrentNumber,$StartNumber,$EndNumber,$State){
        $this->ticketbookid=$ticketbookid;
        $this->Tickets=$Tickets;
        $this->CurrentNumber=$CurrentNumber;
        $this->StartNumber=$StartNumber;
        $this->EndNumber=$EndNumber;
        $this->State=$State;
    }

    public function getTicketbookid(){
        return $this->ticketbookid;
    }
    public function getTickets(){
        return $this->Tickets;
    }
    public function getCurrentNumber(){
        return $this->CurrentNumber;
    }
    public function getStartNumber(){
        return $this->StartNumber;
    }
    public function getEndNumber(){
        return $this->EndNumber;
    }
    public function getState(){
        return $this->State;
    }

}
?>
