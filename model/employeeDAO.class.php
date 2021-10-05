<?php
class EmployeeDAO implements CrudDAO{
    private $dbconnection;
    public function __construct(){
        $this->dbconnection= Dbh :: getInstance();
    }
    //-----------Employee DAO Sandaru-------------//
    public function save($savable){//enter a new row
        $empid=$savable->getEmpid();
        $FirstName=$savable->getFirstName();
        $LastName=$savable->getLastName();
        $NIC=$savable->getNIC();
        $Address=$savable->getAddress();
        $Gender=$savable->getGender();
        $Birthday=$savable->getBirthday();
        $Telephone=$savable->getTelephone();
        $Designation=$savable->getDesignation();
        $Email=$savable->getEmail();
        $StartDate=$savable->getStartDate();
        $EndDate=$savable->getEndDate();
        $IsDeleted=$savable->getIsDeleted();
        $Avialable=$savable->getAvialable();
        $sql = "INSERT INTO employee (empid,FirstName,LastName,NIC,Address,Gender,Birthday,Telephone,Designation,Email,StartDate,EndDate,IsDeleted,Available)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$empid,$FirstName,$LastName,$NIC,$Address,$Gender,$Birthday,$Telephone,$Designation,$Email,$StartDate,$EndDate,$IsDeleted,$Avialable]);

    }
    public function update($updatable){

    }

    public function delete($deletable){

    }

    public function search($searchable){
      $empid=$searchable->getEmpid();
      $sql_off="SELECT * FROM employee WHERE empid = ?";
      $stmt_off = $this->dbconnection->connect()->prepare($sql_off);
      $stmt_off->execute([$empid]);
      $result_off =$stmt_off->fetchAll();
      if ($result_off == NULL){
          return NULL;
      }else{
        return $result_off;
      }
    }



    public function getAll(){//get the all of the data
        $sql = 'SELECT *  FROM employee' ;
        $stmt = $this->dbconnection->connect()->prepare($sql);
		    $stmt->execute();

		return $stmt;


    }

}




?>
