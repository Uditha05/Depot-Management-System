<?php


class ComplainDAO implements CrudDAO{

    private $dbconnection;

    public function __construct(){
        $this->dbconnection = Dbh::getInstance();
    }

    public function save($savable){
      $dutyid=$savable->getdutyid();
      $description=$savable->getdescription();
      $state=$savable->getstate();
      $sql = "INSERT INTO `complain`(`dutyid`, `Description`, `Date`, `state`) VALUES (?,CURRENT_DATE,?,?)";
      $stmt = $this->dbconnection->connect()->prepare($sql);
      $stmt->execute([$dutyid,$description,$state]);
    }

    public function update($updatable){
        $time = date("h:i:s");
        $date = date("Y-m-d");
    }

    public function search($searchable){
        $time = date("h:i:s");
        $date = date("Y-m-d");
        $sql = "SELECT compid,dutyid,description,date,state FROM complain WHERE compid = ?";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$searchable]);
        $results=$stmt->fetchAll();
        return $results;
    }

    public function delete($deletable){
        $time = date("h:i:s");
        $date = date("Y-m-d");
    }

    public function getAll(){
        $time = date("h:i:s");
        $date = date("Y-m-d");
    }
}
?>
