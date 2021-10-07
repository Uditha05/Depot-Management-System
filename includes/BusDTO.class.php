<?php

class BusDTO{
  private $busid;
  private $StartDate;
  private $State;
  private $Numplate;
  
  public function __construct($busid,$StartDate,$State,$Numplate){
      $this->busid=$busid;
      $this->StartDate=$StartDate;
      $this->State=$State;
      $this->Numplate=$Numplate;
  }
  public function getBusid(){
      return $this->busid;
  }
  public function getStartDate(){
      return $this->StartDate;
  }
  public function getState(){
      return $this->State;
  }
  public function getNumplate(){
      return $this->Numplate;
  }

}
