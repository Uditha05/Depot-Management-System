<?php



class timetableDAO implements CrudDAO
{
    private $dbconnection;
    public function __construct()
    {
        $this->dbconnection= Dbh :: getInstance();
    }

    public function save($savable){
        
        $routeid = $savable->giverid();
        $status = $savable->givestate();
        $slotid = $savable->givesloid();
        
        

        $sql="INSERT INTO timetable(routeid,status,slotid) 
        VALUES (?,?,?)";

        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$routeid,$status,$slotid]);
    }

    public function update($updatable){
         $tid = $updatable->givetid();
         $routeid = $updatable->giverid();
        $status = $updatable->givestate();
        $slotid = $updatable->givesloid();
        
        $sql="UPDATE timetable SET routeid='?',status='?',slotid='?' WHERE tid='$tid'";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$routeid,$status,$slotid]);
    }

    public function search($searchable){
         $tid = $searchable->givetid();
        $sql="SELECT tid FROM timetable WHERE tid =? ";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result =$stmt->fetchAll();
        if ($result == NULL){
            return true;
        }
        else{return false;}

    }

    public function delete($deletable){
        $tid = $deletable->givetid();

       $sql="DELETE FROM timetable WHERE tid = ?";
       $stmt= $this->dbconnection->connect()->prepare($sql);
       $stmt->execute([$id]);
    }

    public function getAll(){
       $sql="SELECT * FROM timetable";
       $stmt= $this->dbconnection->connect()->prepare($sql);
       $stmt->execute();
       $result =$stmt->fetchAll();
       
       return $result;
    }


}
?>