<?php


class TimeslottableDAO implements CrudDAO{
    private $dbconnection;
    public function __construct(){
        $this->dbconnection= Dbh :: getInstance();
    }
    public function save($savable){
        $time = $savable->givetime();
        $day = $savable->giveday();

        $sql="INSERT INTO timeslottable(time,day) 
        VALUES (?,?)";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$time,$day]);
    }

    public function update($updatable){
        $id = $updatable->giveSlot();
        $time = $savable->givetime();
        $day = $savable->giveday();
        $sql="UPDATE timeslottable SET time= '?',day='?' WHERE slotid='$id'";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$time,$day]);
    }

    public function search($searchable){
        $id=$searchable->giveSlot();
        $sql="SELECT slotid FROM timeslottable WHERE slotid =? ";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result =$stmt->fetchAll();
        if ($result == NULL){
            return true;
        }
        else{return false;}

    }

    public function delete($deletable){
       $id=$deletable->giveSlot();

       $sql="DELETE FROM timeslottable WHERE slotid = ?";
       $stmt= $this->dbconnection->connect()->prepare($sql);
       $stmt->execute([$id]);
    }

    public function getAll(){
       $sql="SELECT * FROM timeslottable";
       $stmt= $this->dbconnection->connect()->prepare($sql);
       $stmt->execute();
       $result =$stmt->fetchAll();
       return $result;
    }


}
?>