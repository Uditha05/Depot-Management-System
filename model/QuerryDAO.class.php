<?php

class QuerryDAO implements SuperDAO{
    private $dbconnection;

    public function __construct(){
        $this->dbconnection= Dbh::getInstance();
    }

//------------Uditha Isuranga--------------//

    //---------user -----------------//

    public function getUser($email,$pwd){
        $sql = 'SELECT * FROM userlist WHERE email = ? AND password = ? LIMIT 1 ';
       $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$email , $pwd]);


        $results = $stmt->fetch();
        return $results;
    }

    //--------------transporter=-----------------//

    public function getBusList($disP){

        if ($disP) {
            // $sql = 'SELECT dutyrecordnew.busid ,bus.numplate FROM dutyrecordnew INNER JOIN bus ON dutyrecordnew.busid = bus.busid WHERE dutyrecordnew.state = "wating"';
            $sql = 'SELECT busid,Numplate FROM bus WHERE State = "wating"';
        }else{
            // $sql = 'SELECT dutyrecordnew.busid ,bus.numplate FROM dutyrecordnew INNER JOIN bus ON dutyrecordnew.busid = bus.busid WHERE dutyrecordnew.state = "dispatched"';
            $sql = 'SELECT busid,Numplate FROM bus WHERE State = "dispatched"';
        }

       $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function markDis($busno,$diesel){
        date_default_timezone_set("Asia/Colombo");
        $timenow = date("H:i:s");
        $date1 = date("Y/m/d");
        $sql = 'UPDATE dutyrecordnew SET  dieselusage = ? , DispatchTime = ? WHERE busid = ? AND Date = date1';
       $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$diesel,$timenow,$busno]);

        $this->changeBusSate("markDis",$busno);


    }
    public function markArr($busno){
       //  $sql = 'UPDATE dutyrecordnew SET state = "Arrived"  WHERE busid = ? AND state = "dispatched" ';
       // $stmt = $this->dbconnection->connect()->prepare($sql);
       //  $stmt->execute([$busno]);
        $this->changeBusSate("markArr",$busno);


    }
    public function changeBusSate($info,$busno){
        if($info == "markDis"){
            $sql = 'UPDATE bus SET  State ="dispatched"  WHERE busid = ?';
        }
        else if($info == "markArr"){
            $sql = 'UPDATE bus SET  State = "arrived"  WHERE busid = ?';
        }

        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$busno]);
    }

    public function giveByTranspoter(){
        $date1 = date("Y-m-d");

        $sql = 'SELECT dutyrecord.dieselusage,dutyrecord.DispatchTime,timeslottable.time,bus.Numplate FROM ((dutyrecord INNER JOIN timeslottable ON dutyrecord.slotid = timeslottable.slotid) INNER JOIN bus ON dutyrecord.busid = bus.busid) WHERE dutyrecord.Date = ? ';
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$date1]);
        return $stmt->fetchAll();
    }

    //------------------Time table----------//

    public function todaySchedule($day){
        $sql = "SELECT route.routeid,timeslottable.slotid,timetable.status,timeslottable.time,route.RouteName,route.Description FROM ((timetable INNER JOIN timeslottable ON timetable.slotid = timeslottable.slotid) INNER JOIN route ON timetable.routeid = route.routeid) WHERE timeslottable.day = ?";
        //$sql = "SELECT * FROM route";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$day]);

       // $stmt->execute(); //[$day]

        // if ($stmt != null) {
        //  //echo "get today time table query ok";
        //   print_r($stmt->fetch());
        // }

        return $stmt;
    }
    public function getState($routes,$times){
        $today = date("Y-m-d");
        $sql = 'SELECT bus.State FROM `dutyrecord`,`bus` WHERE dutyrecord.busid=bus.busid AND dutyrecord.routeid=? AND dutyrecord.slotid=? AND dutyrecord.Date=?';
       $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$routes,$times,$today]);

        $result = $stmt->fetch();
        // print_r($result);

        if ($result) {
            return $result['State'];
        }
        else{
            return  "pending";
        }
    }

    public function allSchedule(){
        $sql = 'SELECT route.routeid,timeslottable.day,timeslottable.time,route.RouteName,route.Description FROM ((timetable INNER JOIN timeslottable ON timetable.slotid = timeslottable.slotid) INNER JOIN route ON timetable.routeid = route.routeid) ORDER BY timeslottable.day ';
       $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute();
        // if ($stmt != null) {
        //   echo "get all time table query ok";
        //   print_r($stmt->fetch());
        // }
        return $stmt;
    }

    //-------clerk--------------------//

    //function to add duty record in table
    public function updateBusDriCon($busNO,$driver,$conductor){

        $this->setAvaila($busNO);
        $this->setDriver_ConductorAvai($driver);
        $this->setDriver_ConductorAvai($conductor);


    }

    // function to update bus table available value
    public function setAvaila($busNO){
        $sql = 'UPDATE bus SET State = "waiting" WHERE busid = ?  LIMIT 1 ';
       $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$busNO]);
    }


    //function to set driver and conductor unable
    public function setDriver_ConductorAvai($empid){
        $sql = 'UPDATE employee SET available = 0 WHERE empid = ?  LIMIT 1 ';
       $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$empid]);
    }
    //function to set ticketbook unable


    //function to get Driver & Conductor
    public function getCon_Driver(){
        // $sql = "SELECT employee.empid, employee.FirstName,employee.Designation ,attendencerecord.available FROM employee INNER JOIN attendencerecord ON employee.empid = attendencerecord.empid WHERE attendencerecord.available = 1" ;

        $sql = "SELECT empid,Designation,FirstName,LastName FROM employee WHERE available = 1 ";

        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }


    // get available bus form bus table
    public function giveBusNO(){
        $sql = 'SELECT busid,Numplate FROM bus WHERE State = "parked"';
       $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    // function to get destination from route table
    public function giveDestination(){
        $sql = 'SELECT RouteName,routeid FROM route';
       $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute();
        return $stmt;
    }


    //function to get time slot from time slot
    public function giveTimes($day,$destination){


        $sql = 'SELECT slotid,time FROM timeslottable natural join timetable where day =? and routeid = ?';
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$day,$destination]);
        return $stmt;
    }

    public function giveByclerk(){

        $date1 = date("Y-m-d");

        $sql = 'SELECT employee.FirstName,route.RouteName,timeslottable.time,bus.Numplate FROM ((((dutyrecord INNER JOIN timeslottable ON dutyrecord.slotid = timeslottable.slotid) INNER JOIN bus ON dutyrecord.busid = bus.busid)INNER JOIN route ON dutyrecord.routeid = route.routeid)INNER JOIN employee ON dutyrecord.driverid = employee.empid) WHERE dutyrecord.Date = ? ';
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$date1]);
        return $stmt->fetchAll();



    }



    //-----profile update---------//

    public function giveDetails($userid){
        $sql = "SELECT designation,email FROM userlist WHERE id = ?";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$userid]);
        $result = $stmt->fetch();
        return $result;
    }
    public function updatePass($userid,$pass){
        $sql = "UPDATE userlist SET password = ? WHERE id = ?";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        if ($stmt->execute([$pass,$userid])) {
            header('location:../view/profile.php?change=ok');
        }else{
            header('location:../view/profile.php?change=no');
        }
    }

//------------End Uditha Isuranga--------------//

//------------Avishka Rathnavibushana--------------//

//tbInitiateView.php
  //from loadRecords.php
  public function getselectedDutyRecords($empname,$state)
  {
    $sql = "SELECT * FROM dutyrecord, employee, bus WHERE (dutyrecord.busid=bus.busid AND (dutyrecord.driverid=employee.empid OR dutyrecord.conductorid=employee.empid)) AND (employee.FirstName LIKE '%$empname%' OR employee.LastName LIKE '%$empname%') AND bus.state=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$state]);

    $result = $stmt->fetchAll();
    return $result;
  }

  public function getDutyRecords($state)
  {
    $sql = "SELECT * FROM dutyrecord, bus WHERE dutyrecord.busid=bus.busid AND bus.state= ?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$state]);

    $result = $stmt->fetchAll();
    return $result;
  }

  //showRecord.php
  public function getselectedDutyRecordbyid($did)
  {
    $sql = "SELECT * FROM dutyrecord, employee WHERE (dutyrecord.driverid=employee.empid OR dutyrecord.conductorid=employee.empid) AND (dutyrecord.dutyid=$did) ";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;
  }

  //page
  public function getTktBooks($state)
  {

    $sql = "SELECT * FROM ticketbook WHERE State=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$state]);

    $result = $stmt->fetchAll();
    return $result;

  }

  //from submitTktBk.php
  public function readyeDutyRecord($did,$tktbkid)
  {

    $sql = "UPDATE `dutyrecord` SET `state`='ready', `ticketbookid`=? WHERE `dutyid`=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$tktbkid,$did]);
  }

  public function issueTktBk($tktbkid)
  {

    $sql = "UPDATE `ticketbook` SET `state`='issued' WHERE `ticketbookid`=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$tktbkid]);
  }

  public function resettktnum($tktnum){
    $sql = "UPDATE `ticketbook` SET `CurruntNumber`=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$tktnum]);
  }


//dutyRecordClose.php
  //from submitTktBk.php
  public function closeDutyRecord($did,$amount)
  {

    $sql = "UPDATE dutyrecord,bus WHERE SET bus.state='closed', `CashAmount`=? WHERE dutyrecord.busid=bus.busid AND `dutyid`=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$amount,$did]);
  }

  public function returnTktBk($tktbkid,$tktnum)
  {

    $sql = "UPDATE `ticketbook` SET `state`='ready', `CurruntNumber`=? WHERE `ticketbookid`=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$tktnum,$tktbkid]);
  }

  public function getBusId($did)
  {

    $sql = "SELECT `busid` FROM dutyrecord WHERE dutyid = ?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$did]);

    $result = $stmt->fetchAll();
    return $result;
  }

  public function updateBusStatus($busid,$status)
  {

    $sql = "UPDATE `bus` SET `state`=? WHERE `busid`=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$status,$busid]);
  }


//createComplain.php
  //from loadRecords.php
  public function getselectedDutyRecordsToday($empname,$state)
  {

    $sql = "SELECT * FROM dutyrecord, employee, bus WHERE (dutyrecord.driverid=employee.empid OR dutyrecord.conductorid=employee.empid) AND (dutyrecord.busid=bus.busid) AND (employee.FirstName LIKE '%$empname%' OR employee.LastName LIKE '%$empname%') AND `Date`=CURRENT_DATE AND bus.State ='parked'";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$state]);

    $result = $stmt->fetchAll();
    return $result;
  }

  public function getDutyRecordsToday($state)
  {

    $sql = "SELECT * FROM dutyrecord,bus WHERE (dutyrecord.busid=bus.busid) AND dutyrecord.state=? AND `Date`=CURRENT_DATE AND bus.State ='parked'";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$state]);

    $result = $stmt->fetchAll();
    return $result;
  }

//createPaysheet.php
//loadPaysheetData.php
public function getEmployeesByDesignation($designation){
  $sql = "SELECT * FROM `employee` WHERE `Designation`= ? AND `IsDeleted`='No'";
  $stmt = $this->dbconnection->connect()->prepare($sql);
  $stmt->execute([$designation]);

  $result = $stmt->fetchAll();
  return $result;
}

public function getEmployeeSalaryDetails($id,$year,$month){
  $date = "{$year}-{$month}-";
  $sql = "SELECT * FROM `attendancerecord` WHERE `empid`=? AND `Date` LIKE '$date%'";
  $stmt = $this->dbconnection->connect()->prepare($sql);
  $stmt->execute([$id]);

  $result = $stmt->fetchAll();

  return $result;
}

public function searchPaysheetRecord($date,$empid){
  $sql = "SELECT * FROM `paysheet` WHERE `empid`=? AND `paidFor`=?";
  $stmt = $this->dbconnection->connect()->prepare($sql);
  $stmt->execute([$empid,$date]);
  $result = $stmt->fetchAll();

  if ($result == NULL){
      return false;
  }else{
    return true;
  }
}

////facade
public function getTodayTBInitiatedDutyRecords(){
  $sql = "SELECT * FROM dutyrecord, employee, bus WHERE (dutyrecord.driverid=employee.empid OR dutyrecord.conductorid=employee.empid) AND (dutyrecord.busid=bus.busid) AND `Date`=CURRENT_DATE AND (bus.state='ready' OR bus.state='dispatched' OR bus.state='returned' OR bus.state='closed' OR bus.state='broken')";
  $stmt = $this->dbconnection->connect()->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result == NULL){
      return NULL;
  }else{
    return $result;
  }
}
public function getTodayClosedDutyRecords(){
  $sql = "SELECT * FROM dutyrecord, employee, bus WHERE (dutyrecord.driverid=employee.empid OR dutyrecord.conductorid=employee.empid) AND (dutyrecord.busid=bus.busid) AND `Date`=CURRENT_DATE AND (bus.state='Closed' OR bus.state='broken')";
  $stmt = $this->dbconnection->connect()->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result == NULL){
      return NULL;
  }else{
    return $result;
  }
}
public function getTodayCreatedComplains(){
  $sql = "SELECT * FROM complain,dutyrecord, employee, bus WHERE (dutyrecord.driverid=employee.empid OR dutyrecord.conductorid=employee.empid) AND (dutyrecord.busid=bus.busid) AND (dutyrecord.dutyid=complain.dutyid) AND complain.Date = CURRENT_DATE AND complain.state='created'";
  $stmt = $this->dbconnection->connect()->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result == NULL){
      return NULL;
  }else{
    return $result;
  }
}
public function getTodayCreatedPaysheets(){
  $sql = "SELECT * FROM paysheet, employee WHERE (paysheet.empid=employee.empid) AND `Date`=CURRENT_DATE";
  $stmt = $this->dbconnection->connect()->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result == NULL){
      return NULL;
  }else{
    return $result;
  }
}
public function getTodayAddedTBs(){
  $sql = "SELECT * FROM dutyrecord, employee, bus WHERE (dutyrecord.driverid=employee.empid OR dutyrecord.conductorid=employee.empid) AND (dutyrecord.busid=bus.busid) AND `Date`=CURRENT_DATE AND bus.state='ready'";
  $stmt = $this->dbconnection->connect()->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  if ($result == NULL){
      return NULL;
  }else{
    return $result;
  }
}

//------------End Avishka Rathnavibushana--------------//

//------------Sandaru Kaveesha--------------//

//bus functions--Sandaru
public function remove_bus($deletable){  //delete or change the state of a bus
    $busid=$deletable->getBusid();
    $sql="UPDATE bus SET State='removed' WHERE busid=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$busid]);
}
public function updateBus_column($updatable,$column,$value){    // update a column of the bu list
    $busid=$updatable->getBusid();
    $sql="UPDATE bus SET $column='{$value}' WHERE busid=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$busid]);
}
public function search_for_bus($searchable){   //search for a object avilability
    $busid=$searchable;
    $sql = 'SELECT busid,StartDate,State,Numplate  FROM bus WHERE busid=?' ;
    $stmt = $this->dbconnection->connect()->prepare($sql);
$stmt->execute([$busid]);

return $stmt;

}

//--------------------------------------------------------------//


//employee functions--Sandaru

public function updateEmployee_column($updatable,$column,$value){// update a column of the bus list
    $empid=$updatable->getEmpid();
    $sql="UPDATE employee SET $column='{$value}' WHERE empid=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$empid]);

}
public function resign_employee($deletable){//delete or change the state of a bus
    $empid=$deletable->getEmpid();
    $today=date("Y/m/d");
    $sql="UPDATE employee SET IsDeleted='1',Available='0',EndDate='{$today}' WHERE empid=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$empid]);

}
public function search_for_employee($searchable){//search for a object avilability
    $empid=$searchable;
    $sql = 'SELECT empid,FirstName,LastName,NIC,Address,Gender,Birthday,Telephone,Designation,Email,StartDate,EndDate,IsDeleted,Available  FROM employee WHERE empid=?' ;
    $stmt = $this->dbconnection->connect()->prepare($sql);
$stmt->execute([$empid]);
return $stmt;
}
//--------------------------------------------------------------------//


//system functions--Sandaru
public function get_monthlystatement($date){
    $sql = "SELECT * FROM monthlystatement WHERE date LIKE '$date%'";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute();
    return $stmt;

}

public function search_monthlystatement($date){
    $sql = "SELECT * FROM monthlystatement WHERE `date` LIKE '$date%'";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if ($result==null){
        return false;
    }
    else{
        return true;
    }
}
public function get_lastDutyrecord($day,$routeNo){
    $sql = "SELECT * FROM dutyrecord WHERE routeid=? AND `Date` LIKE '$day%'";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$routeNo]);
    $result = $stmt->fetchAll();
    return $result;

}

public function saveFeedback($name,$email,$comment){
  $sql="INSERT INTO `feedback`(`name`, `email`, `comment`) VALUES (?,?,?)";
  $stmt = $this->dbconnection->connect()->prepare($sql);
  $stmt->execute([$name,$email,$comment]);
}

public function getAdminEmail(){
  $sql="SELECT `Email` FROM `employee` WHERE `employee`.`Designation`='Admin'";
  $stmt = $this->dbconnection->connect()->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return $result;
}
//------------End Sandaru Kaveesha--------------//

//------------Tharinda Thamaranga--------------//

//---SO functions -tharinda-----------//


//check whether the employee id is valid or not by SO
public function checkID_employee($id){
    $sql = "SELECT empid FROM employee WHERE empid = ?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$id]);

    $results = $stmt->fetchAll();
    if ($results==NULL){
        return false;
    }
    else{
        return true;
    }

}
//return the attended emplyee list on a curresponding date
public function getAttendedEmployee(){
    $date = date("Y-m-d");
    $sql = "SELECT attendancerecord.Date, attendancerecord.ontime, attendancerecord.available, employee.FirstName FROM attendancerecord INNER JOIN employee ON attendancerecord.empid=employee.empid WHERE attendancerecord.available='1' AND attendancerecord.Date=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$date]);
    $result=$stmt->fetchAll();
    return $result;
}
//search for employee this should be in emp DAO..search for emplyee ids and return details
public function getEmployeeByID($id){
    $sql = "SELECT empid,FirstName,LastName,Address,Telephone,Designation FROM employee WHERE empid = ?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$id]);
    $results=$stmt->fetchAll();
    return $results;
}
//-----------------------//
//--------Engineer -Tharinda--------//
    //get complains which are only created
public function getComplains(){
    $sql= "SELECT complain.compid, bus.Numplate, complain.description, complain.date, complain.state FROM complain INNER JOIN dutyrecord ON complain.dutyid=dutyrecord.dutyid INNER JOIN bus ON dutyrecord.busid=bus.busid WHERE complain.state='created'";
    $stmt=$this->dbconnection->connect()->prepare($sql);
    $stmt->execute();

    $results=$stmt->fetchAll();
    if ($results==NULL){
        return false;
    }
    else{
        return $results;
        echo "done";
    }
}
     //get the workers who are free
public function getFreeWorkers(){
    $sql= "SELECT empid,FirstName,Available,Designation FROM employee where Available='1' AND Designation='Worker'";
    $stmt=$this->dbconnection->connect()->prepare($sql);
    $stmt->execute();
    $results=$stmt->fetchAll();
    return $results;
}
public function addworkertodb($compid,$workerid){
    $sql="INSERT INTO workerassign(compid,empid)
    VALUES ('$compid','$workerid')";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute();
    $sql2="UPDATE complain SET state='processed' WHERE compid=$compid";
    $stmt2 = $this->dbconnection->connect()->prepare($sql2);
    $stmt2->execute();
    $sql3="UPDATE employee SET Available='0' WHERE empid=$workerid";
    $stmt3 = $this->dbconnection->connect()->prepare($sql3);
    $stmt3->execute();
}
//get the complians which are in processed state
public function getWorkerAddedComplain(){
    $sql = "SELECT complain.compid,bus.Numplate,complain.description,complain.date,complain.state,.workerassign.empid FROM complain INNER JOIN workerassign on complain.compid=workerassign.compid INNER JOIN dutyrecord on complain.dutyid=dutyrecord.dutyid INNER JOIN bus on dutyrecord.busid=bus.busid WHERE complain.state='processed' ORDER BY complain.compid";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute();
    $results=$stmt->fetchAll();
    return $results;
}
public function closeComplainDb($compid){
    $sql = "UPDATE complain SET state='closed' WHERE compid = ?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$compid]);
    $result = $stmt->fetch();
    $sql2="SELECT compid,empid FROM workerassign WHERE compid=?";
    $stmt2 = $this->dbconnection->connect()->prepare($sql);
    return $result;
}
public function getAssignWorkers($compid){
    $sql="SELECT compid,empid FROM workerassign WHERE compid=?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$compid]);
    $results=$stmt->fetchAll();
    return $results;
}

public function freeTheWorker($empid){
    $sql="UPDATE employee SET Available='1' WHERE empid = ?";
    $stmt = $this->dbconnection->connect()->prepare($sql);
    $stmt->execute([$empid]);
}

//change bus state as parked
    public function busToRun($compid){
        $sql="SELECT complain.compid, dutyrecord.dutyid, bus.busid,bus.Numplate FROM complain INNER JOIN dutyrecord ON complain.dutyid=dutyrecord.dutyid INNER JOIN bus ON dutyrecord.busid=bus.busid WHERE complain.compid=?";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$compid]);
        $results=$stmt->fetchAll();
        foreach($results as $result){
            $sql2="UPDATE bus SET State='parked' WHERE busid=?";
            $stmt2=$this->dbconnection->connect()->prepare($sql2);
            $stmt2->execute([$result['busid']]);
        }

    }

//------------End Tharinda Thamaranga--------------//

}


?>
