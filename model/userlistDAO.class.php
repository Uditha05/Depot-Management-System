<?php
class userlistDAO implements CrudDAO{
    private $dbconnection;
    public function __construct(){
        $this->dbconnection= Dbh :: getInstance();
    }
    public function save($savable){

         //$frist_name= $savable->givefname();
         $designation= $savable->givedesig();
         $email= $savable->giveema();
         $password= $savable->givepass();
         $is_deleted= $savable->giveisdel();

        $sql="INSERT INTO userlist(designation,email,password,is_deleted)
        VALUES (?,?,?,?,?)";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    public function update($updatable){
        $id = $updatable->giveid();
        //$frist_name= $updatable->givefname();
         $designation= $updatable->givedesig();
         $email= $updatable->giveema();
         $password= $updatable->givepass();
         $is_deleted= $updatable->giveisdel();

        $sql="UPDATE userlist SET designation='?',email='?',password='?',is_deleted='?' WHERE id='$id'";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$designation,$email,$password,$is_deleted]);
    }

    public function search($searchable){
        $id=$searchable->giveid();
        $is_deleted= $searchable->giveisdel();
        $sql="SELECT id FROM userlist WHERE id =? AND is_deleted='0'";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$id,$is_deleted]);
        $result =$stmt->fetchAll();
        if ($result == NULL){
            return true;
        }
        else{return false;}

    }
     public function delete($deletable){
        $id = $deletable->giveid();

        $sql="UPDATE userlist SET is_deleted='1' WHERE id='?'";
       $stmt= $this->dbconnection->connect()->prepare($sql);
       $stmt->execute([$id]);
    }

    public function getAll(){
       $sql="SELECT * FROM userlist";
       $stmt= $this->dbconnection->connect()->prepare($sql);
       $stmt->execute();
       $result =$stmt->fetchAll();
       return $result;
    }



}
?>
