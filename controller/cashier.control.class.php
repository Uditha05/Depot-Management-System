<?php
  include 'IController.inf.php';
  include 'facademaker.inf.php';

 class CashierControl implements IController,Facademaker
 {

//tbInitiateView.php
   //from loadRecords.php
   public function showSelectedDutyRecords($empname,$state)
   {

    $querrydaoObj = new QuerryDAO();
    if ($state=="closed") {
      $results = $querrydaoObj->getselectedDutyRecordsToday($empname,$state);
    } else {
      $results = $querrydaoObj->getselectedDutyRecords($empname,$state);
    }
     $count = 0;
     foreach ($results as $row){
       $busDAO = new BusDAO();
       $record = $busDAO->search(new BusDTO($row['busid'],"","",""));
       $results[$count]['busid'] = $record[0]['Numplate'];
       $empDAO = new EmployeeDAO();
       $record = $empDAO->search(new EmployeeDTO($row['driverid'],"","","","","","","","","","","","",""));
       $results[$count]['driverid'] = $record[0]['FirstName']." ".$record[0]['LastName'];
       $record = $empDAO->search(new EmployeeDTO($row['conductorid'],"","","","","","","","","","","","",""));
       $results[$count]['conductorid'] = $record[0]['FirstName']." ".$record[0]['LastName'];
       $count++;
     }

     return $results;
   }

   public function showDutyRecords($state)
   {

     $querrydaoObj = new QuerryDAO();
     if ($state=="closed") {
       $results = $querrydaoObj->getDutyRecordsToday($state);
     } else {
       $results = $querrydaoObj->getDutyRecords($state);
     }

     $count = 0;
     foreach ($results as $row){
       $busDAO = new BusDAO();
       $record = $busDAO->search(new BusDTO($row['busid'],"","",""));
       $results[$count]['busid'] = $record[0]['Numplate'];
       $empDAO = new EmployeeDAO();
       $record = $empDAO->search(new EmployeeDTO($row['driverid'],"","","","","","","","","","","","",""));
       $results[$count]['driverid'] = $record[0]['FirstName']." ".$record[0]['LastName'];
       $record = $empDAO->search(new EmployeeDTO($row['conductorid'],"","","","","","","","","","","","",""));
       $results[$count]['conductorid'] = $record[0]['FirstName']." ".$record[0]['LastName'];
       $count++;
     }

     return $results;

   }

   //from showRecord.php
   public function showSelectedDutyRecordbyid($did)
   {
     $querrydaoObj = new QuerryDAO();
     $results = $querrydaoObj->getselectedDutyRecordbyid($did);


     $count = 0;
     foreach ($results as $row){
       $busDAO = new BusDAO();
       $record = $busDAO->search(new BusDTO($row['busid'],"","",""));
       $results[$count]['busid'] = $record[0]['Numplate'];
       $empDAO = new EmployeeDAO();
       $record = $empDAO->search(new EmployeeDTO($row['driverid'],"","","","","","","","","","","","",""));
       $results[$count]['driverid'] = $record[0]['FirstName']." ".$record[0]['LastName'];
       $record = $empDAO->search(new EmployeeDTO($row['conductorid'],"","","","","","","","","","","","",""));
       $results[$count]['conductorid'] = $record[0]['FirstName']." ".$record[0]['LastName'];
       $count++;
     }

     return $results;
   }

   //from page
   public function showTktBooks($state)
   {
     $querrydaoObj = new QuerryDAO();
     $results = $querrydaoObj->getTktBooks($state);

     return $results;

   }

   //from loadTktNumbers.php
   public function showSelectedtktbook($tktbkid)
   {
     $ticketbookDAO = new ticketbookDAO();
     $results = $ticketbookDAO->search(new TicketbookDTO($tktbkid,"","","","","",""));

     return $results;
   }

   //from submitForm.php
   public function submitForm($did,$tktbkid,$tktnum)
   {
     $querrydaoObj = new QuerryDAO();
     $querryDAO->resettktnum($tktnum);
     $querrydaoObj->readyeDutyRecord($did,$tktbkid);
     $querrydaoObj->issueTktBk($tktbkid);

   }


//dutyRecordClose.php
  //from submitForm.php
  public function submitDRCloseForm($did,$tktbkid,$tktnum,$amount,$status)
  {
    $querrydaoObj = new QuerryDAO();
    $querrydaoObj->closeDutyRecord($did,$amount);
    $querrydaoObj->returnTktBk($tktbkid,$tktnum);

    $result = $querrydaoObj->getBusId($did);
    $querrydaoObj->updateBusStatus($result[0]['busid'],$status);
  }


//createComplain.php
  //from submitForm.php
  public function submitComplainForm($did,$complain)
  {
    $complainDAO = new ComplainDAO();
    $querrydaoObj->insertComplain(new ComplainDTO("",$did,$complain,"",'created'));

    $result = $querrydaoObj->getBusId($did);
    $querrydaoObj->updateBusStatus($result[0]['busid'],"broken");
  }


//addTicketBook.php
  //from submitTktBook.php
  public function submitTicketBook($bookId,$startNumber,$endNumber)
  {
    $ticketbookDAO = new ticketbookDAO();
    $numOfTickets = $endNumber - $startNumber + 1 ;
    $curruntNumber = $startNumber;
    $ticketbookDTO = new TicketbookDTO($bookId,$numOfTickets,$curruntNumber,$startNumber,$endNumber,'ready');
    $ticketbookDAO->save($ticketbookDTO);

  }

//createPaysheet.php
  //from page
  public function showDesignations()
  {
    $salaryDAO = new salaryDAO();
    $results = $salaryDAO->getAll();

    return $results;
  }

 public function showEmployees($designation)
 {
   $querryDAO = new QuerryDAO();
   $results = $querryDAO->getEmployeesByDesignation($designation);
   return $results;
 }

 public function showSalaryDetails($id)
 {
   $salaryDAO = new salaryDAO();
   $salaryDTO = new SalaryDTO($id,"","","");
   $results = $salaryDAO->search($salaryDTO);

   return $results;
 }

 public function showEmployeeSalaryDetails($id,$year,$month,$dailyamount,$hourlyotamount)
 {
   $querryDAO = new QuerryDAO();
   $numOfDays = 0;
   $minutes = 0;
   $hours = 0;
   $workDays = array();
   //$attendancerecordDTO = new AttendancerecordDTO($id,"","","","");
   $months = array('January','February','March','April','May','June','July ','August','September','October','November','December',);
   $i = 1;
   foreach ($months as $value) {
     if ($value == $month) {
       break;
     }
     $i++;
   }
   if ($i<10) {
     $i = "0{$i}";
   }
   $results = $querryDAO->getEmployeeSalaryDetails($id,$year,$i);
   //echo json_encode($results);
   foreach ($results as $row) {
     $date = $row['Date'];
     $date_d = (int)substr($date,8,2);

     $ontime = $row['ontime'];
     $ontime_h = (int)substr($ontime,0,2);
     $ontime_m = (int)substr($ontime,3,2);
     $ontime = (int)$ontime;

     $offtime = $row['offtime'];
     $offtime_h = (int)substr($offtime,0,2);
     $offtime_m = (int)substr($offtime,3,2);
     $offtime = (int)$offtime;

     if ($ontime_h>=8 and $ontime_h<17) {
       if (in_array($date_d, $workDays)) {
         // code...
       }else{
         array_push($workDays,$date_d);
         $numOfDays = $numOfDays + 1;
       }
     }else if(($ontime_h>=17 and $ontime_h<24) or ($ontime_h>=0 and $ontime_h<8)){
       if (in_array($date_d, $workDays)) {
         // code...
       }else{
         array_push($workDays,$date_d);
         $numOfDays = $numOfDays + 1;
       }

       if (($ontime_h>=17 and $ontime_h<24) and ($offtime_h>17 and $offtime_h<24)) {
         $minutes = $minutes + ($offtime-$ontime-1)*60 + (60-$ontime_m) + $offtime_m;
       } else if (($ontime_h>=17 and $ontime_h<24) and ($offtime_h>=0 and $offtime_h<=8)) {
         $minutes = $minutes + (24-$ontime-1)*60 + (60-$ontime_m) + $offtime_h*60 + $offtime_m;
       } else if (($ontime_h>=0 and $ontime_h<8) and ($offtime_h>0 and $offtime_h<=8)) {
         $minutes = $minutes + ($offtime-$ontime-1)*60 + (60-$ontime_m) + $offtime_m;
       }

     }
   }

   $hours = ceil($minutes/60);
   $basicsalary = $dailyamount*$numOfDays;
   $ottotal = $hours*$hourlyotamount;

   $total = $basicsalary+$ottotal;

   $final = "{$numOfDays},{$basicsalary},{$hours},{$ottotal},{$total}";
   return $final;
 }


 public function savePaysheet($year,$month,$designation,$employee,$empid,$workingdays,$dailyamount,$basicsalary,$othours,$hourlyotamount,$ottotal,$totalsalary,$bonusNames,$bonusValues){

   $months = array('January','February','March','April','May','June','July ','August','September','October','November','December',);
   $monthNum = 1;
   foreach ($months as $value) {
     if ($value == $month) {
       break;
     }
     $monthNum++;
   }
   if ($monthNum<10) {
     $monthNum = "0{$monthNum}";
   }
   $date = "{$year}-{$monthNum}";
   $querryDAO = new QuerryDAO();

   if ($querryDAO->searchPaysheetRecord($date,$empid)) {
     return "Already created paysheet of {$employee} for {$year}-{$month}.";
   }else{
     $paysheetDAO = new PaysheetDAO();
     $a = new PaysheetDTO("",$empid,"",$date,$designation,$employee,$workingdays,$dailyamount,$basicsalary,$othours,$hourlyotamount,$ottotal,$totalsalary,$bonusNames,$bonusValues);
     $paysheetDAO->save($a);
     return "Successfuly submited";
   }

 }

 public function giveToAdmin(){
   $querryDAO = new QuerryDAO();

   $alltables = array();

   $results = $querryDAO->getTodayTBInitiatedDutyRecords();
   if ($results!=null) {
     $count = 0;
     foreach ($results as $row){
       $busDAO = new BusDAO();
       $record = $busDAO->search(new BusDTO($row['busid'],"","",""));
       $results[$count]['busid'] = $record[0]['Numplate'];
       $empDAO = new EmployeeDAO();
       $record = $empDAO->search(new EmployeeDTO($row['driverid'],"","","","","","","","","","","","",""));
       $results[$count]['driverid'] = $record[0]['FirstName']." ".$record[0]['LastName'];
       $record = $empDAO->search(new EmployeeDTO($row['conductorid'],"","","","","","","","","","","","",""));
       $results[$count]['conductorid'] = $record[0]['FirstName']." ".$record[0]['LastName'];
       $count++;
     }
   }
   array_push($alltables,$results);

   $results = $querryDAO->getTodayClosedDutyRecords();
   if ($results!=null) {
     $count = 0;
     foreach ($results as $row){
       $busDAO = new BusDAO();
       $record = $busDAO->search(new BusDTO($row['busid'],"","",""));
       $results[$count]['busid'] = $record[0]['Numplate'];
       $empDAO = new EmployeeDAO();
       $record = $empDAO->search(new EmployeeDTO($row['driverid'],"","","","","","","","","","","","",""));
       $results[$count]['driverid'] = $record[0]['FirstName']." ".$record[0]['LastName'];
       $record = $empDAO->search(new EmployeeDTO($row['conductorid'],"","","","","","","","","","","","",""));
       $results[$count]['conductorid'] = $record[0]['FirstName']." ".$record[0]['LastName'];
       $count++;
     }
   }
   array_push($alltables,$results);

   $results = $querryDAO->getTodayCreatedComplains();
   if ($results!=null) {
     $count = 0;
     foreach ($results as $row){
       $busDAO = new BusDAO();
       $record = $busDAO->search(new BusDTO($row['busid'],"","",""));
       $results[$count]['busid'] = $record[0]['numplate'];
       $empDAO = new EmployeeDAO();
       $record = $empDAO->search(new EmployeeDTO($row['driverid'],"","","","","","","","","","","","",""));
       $results[$count]['driverid'] = $record[0]['FirstName']." ".$record[0]['LastName'];
       $record = $empDAO->search(new EmployeeDTO($row['conductorid'],"","","","","","","","","","","","",""));
       $results[$count]['conductorid'] = $record[0]['FirstName']." ".$record[0]['LastName'];
       $count++;
     }
   }
   array_push($alltables,$results);

   $results = $querryDAO->getTodayCreatedPaysheets();

   array_push($alltables,$results);

   return $alltables;

 }

}
?>
