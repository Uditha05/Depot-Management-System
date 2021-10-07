<?php
    class SystemDAO implements CrudDAO{
        private $dbconnection;
        public function __construct(){
            $this->dbconnection= Dbh::getInstance();
        }

        //------System DAO -Sandaru----//
        public function save($savable){
            $MSid=$savable->get_MSid();
            $date=$savable->get_date();
            $routeNo=$savable->get_routeNo();
            $from=$savable->get_from();
            $through=$savable->get_through();
            $to=$savable->get_to();
            $distance=$savable->get_distance();
            $diselUsage=$savable->get_diselUsage();
            $cashIncome=$savable->get_cashIncome();
            $incomePerkm=$savable->get_incomePerkm();

            $sql = "INSERT INTO monthlystatement (`MSid`,`date`,`routeNo`,`from`,`through`,`to`,distance,diselUsage,cashIncome,incomePerkm)VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->dbconnection->connect()->prepare($sql);
            $stmt->execute([$MSid,$date,$routeNo,$from,$through,$to,$distance,$diselUsage,$cashIncome,$incomePerkm]);
            
        }

        public function update($updatable){}
    
        public function delete($deletable){}
    
        public function search($searchable){}
    
        public function getAll(){}


    }


?>