<?php
    class EmployeeDTO{

        private $empid;
        private $FirstName;
        private $LastName;
        private $Birthday;
        private $Gender;
        private $Address;
        private $Telephone;
        private $NIC;
        private $Designation;
        private $Email;
        private $StartDate;
        private $EnadDate;
        private $IsDeleted;
        private $Avialable;


        public function __construct($empid,$FirstName,$LastName,$NIC,$Address,$Gender,$Birthday,$Telephone,$Designation,$Email,$StartDate,$EndDate,$IsDeleted,$Avialable){
            $this->empid=$empid;
            $this->FirstName=$FirstName;
            $this->LastName=$LastName;
            $this->Birthday=$Birthday;
            $this->Gender=$Gender;
            $this->Address=$Address;
            $this->Telephone=$Telephone;
            $this->NIC=$NIC;
            $this->Designation=$Designation;
            $this->Email=$Email;
            $this->StartDate=$StartDate;
            $this->EndDate=$EndDate;
            $this->IsDeleted=$IsDeleted;
            $this->Avialable=$Avialable;



        }
        public function getEmpid(){
            return $this->empid;
        }
        public function getFirstname(){
            return $this->FirstName;
        }
        public function getLastname(){
            return $this->LastName;
        }
        public function getBirthday(){
            return $this->Birthday;
        }
        public function getGender(){
            return $this->Gender;
        }
        public function getAddress(){
            return $this->Address;
        }
        public function getTelephone(){
            return $this->Telephone;
        }
        public function getNIC(){
            return $this->NIC;
        }
        public function getDesignation(){
            return $this->Designation;
        }
        public function getEmail(){
            return $this->Email;
        }
        public function getStartDate(){
            return $this->StartDate;
        }
        public function getEndDate(){
            return $this->EndDate;
        }
        public function getIsDeleted(){
            return $this->IsDeleted;
        }
        public function getAvialable(){
            return $this->Avialable;
        }

    }





?>
