<?php
include "IController.inf.php";

class AdminControl implements IController{
    private $BusDAO_obj;
    private $EmployeeDAO_obj;
    private $QuerryDAO_obj;


    public function __construct(){
        $this->BusDAO_obj=new BusDAO();     //busDAO object
        $this->EmployeeDAO_obj=new EmployeeDAO();    //employeeDAO object
        $this->QuerryDAO_obj=new QuerryDAO();

    }
    public function get_emplist(){
        $tableRow = '';
        $out = $this->EmployeeDAO_obj->getAll();

		while($row = $out->fetch()){

            $tableRow.= "<tr>";
			$tableRow.= "<td>{$row['empid']}</td>";
            $tableRow.= "<td>{$row['FirstName']}</td>";
            $tableRow.= "<td>{$row['LastName']}</td>";
            $tableRow.= "<td>{$row['NIC']}</td>";
            $tableRow.= "<td>{$row['Address']}</td>";
            $tableRow.= "<td>{$row['Gender']}</td>";
            $tableRow.= "<td>{$row['Birthday']}</td>";
            $tableRow.= "<td>{$row['Telephone']}</td>";
            $tableRow.= "<td>{$row['Designation']}</td>";
            $tableRow.= "<td>{$row['Email']}</td>";
            $tableRow.= "<td>{$row['StartDate']}</td>";
            $tableRow.= "<td>{$row['EndDate']}</td>";
            $tableRow.= "<td>{$row['IsDeleted']}</td>";
            $tableRow.= "<td>{$row['Available']}</td>";

            $tableRow.= "</tr>";



        }

        return $tableRow;


    }
    public function addnew_employee($employeeObj){
        $this->EmployeeDAO_obj->save($employeeObj);

    }
    public function search_employee($empid){   //search bus avilability
        $output=$this->QuerryDAO_obj->search_for_employee($empid);
        $row = $output->fetch();
        if ($row==null){
            $empObj=null;
        }
        else{
            $empObj=new EmployeeDTO($row['empid'],$row['FirstName'],$row['LastName'],$row['NIC'],$row['Address'],$row['Gender'],$row['Birthday'],$row['Telephone'],$row['Designation'],$row['Email'],$row['StartDate'],$row['EndDate'],$row['IsDeleted'],$row['Available']);
        }

        return $empObj;


    }

    public function edit_employee($empid,$column,$value){   //edit bus object from the database
        $empObj=$this->search_employee($empid);
        if ($empObj==null){
            echo "Check again the employee ID";
        }
        else{
            $this->QuerryDAO_obj-> updateEmployee_column($empObj,$column,$value);
        }



    }
    public function remove_employee($empid){     //change the state of the bus to remaoved state
        $empObj=$this->search_employee($empid);
        if ($empObj==null){
            echo "Check again the emp ID";
        }
        else{
            $this->QuerryDAO_obj->resign_employee($empObj);
        }
    }


    public function get_buslist(){      //display the list
        $tableRow = '';
        $out = $this->BusDAO_obj->getAll();

		while($row = $out->fetch()){

            $tableRow.= "<tr>";
			$tableRow.= "<td>{$row['busid']}</td>";
            $tableRow.= "<td>{$row['StartDate']}</td>";
            $tableRow.= "<td>{$row['State']}</td>";
            $tableRow.= "<td>{$row['Numplate']}</td>";
            $tableRow.= "</tr>";



        }

        return $tableRow;




    }

    public function addnew_bus($busObj){     //add a new bus object

        $this->BusDAO_obj->save($busObj);


    }

    public function search_bus($busid){   //search bus avilability
        $output=$this->QuerryDAO_obj->search_for_bus($busid);
        $row = $output->fetch();
        if ($row==null){
            $busObj=null;
        }
        else{
            $busObj=new BusDTO($row['busid'],$row['StartDate'],$row['State'],$row['Numplate']);
        }

        return $busObj;


    }



    public function edit_bus($busid,$column,$value){   //edit bus object from the database
        $busObj=$this->search_bus($busid);
        if ($busObj==null){
            echo "Check again the bus ID";
        }
        else{
            $this->QuerryDAO_obj->updateBus_column($busObj,$column,$value);
        }



    }
    public function remove_bus($busid){     //change the state of the bus to remaoved state
        $busObj=$this->search_bus($busid);
        if ($busObj==null){
            echo "Check again the bus ID";
        }
        else{
            $this->QuerryDAO_obj->remove_bus($busObj);
        }
    }

    public function sendFeedback($name,$email,$comment){
      $this->QuerryDAO_obj->saveFeedback($name,$email,$comment);
      $to_email = $this->QuerryDAO_obj->getAdminEmail();
      $headers = "From : ".$name."\nE-mail : ".$email;

      $subject = "Feedback";
      $body = $headers."\nComment : ".$comment;

      if (mail($to_email[0]['Email'], $subject, $body, $headers)) {
          //echo "Email successfully sent to $to_email...";
      } else {
          //echo "Email sending failed...";
      }
    }
}
?>
