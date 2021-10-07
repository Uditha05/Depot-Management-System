<?php
class PaysheetDTO{
    private $paysheetid;
    private $empid;
    private $date;
    private $paidFor;
    private $designation;
    private $employee;
    private $workingdays;
    private $dailyamount;
    private $basicsalary;
    private $othours;
    private $hourlyotamount;
    private $ottotal;
    private $totalsalary;
    private $bonusNames;
    private $bonusValues;

    public function __construct($paysheetid,$empid,$date,$paidFor,$designation,$employee,$workingdays,$dailyamount,$basicsalary,$othours,$hourlyotamount,$ottotal,$totalsalary,$bonusNames,$bonusValues){
        $this->paysheetid=$paysheetid;
        $this->empid=$empid;
        $this->date=$date;
        $this->paidFor=$paidFor;
        $this->designation=$designation;
        $this->employee=$employee;
        $this->workingdays=$workingdays;
        $this->dailyamount=$dailyamount;
        $this->basicsalary=$basicsalary;
        $this->othours=$othours;
        $this->hourlyotamount=$hourlyotamount;
        $this->ottotal=$ottotal;
        $this->totalsalary=$totalsalary;
        $this->bonusNames=$bonusNames;
        $this->bonusValues=$bonusValues;
    }

    public function getPaysheetid(){
        return $this->paysheetid;
    }
    public function getEmpid(){
        return $this->empid;
    }
    public function getDate(){
        return $this->date;
    }
    public function getPaidFor(){
        return $this->paidFor;
    }
    public function getDesignation(){
        return $this->designation;
    }
    public function getEmployee(){
        return $this->employee;
    }
    public function getWorkingdays(){
        return $this->workingdays;
    }
    public function getDailyamount(){
        return $this->dailyamount;
    }
    public function getBasicsalary(){
        return $this->basicsalary;
    }
    public function getOthours(){
        return $this->othours;
    }
    public function getHourlyotamount(){
        return $this->hourlyotamount;
    }
    public function getOttotal(){
        return $this->ottotal;
    }
    public function getTotalsalary(){
        return $this->totalsalary;
    }
    public function getBonusNames(){
        return $this->bonusNames;
    }
    public function getBonusValues(){
        return $this->bonusValues;
    }
}
?>
