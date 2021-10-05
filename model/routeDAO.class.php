<?php



class routeDAO implements CrudDAO{
    private $dbconnection;
    public function __construct(){
        $this->dbconnection= Dbh :: getInstance();
    }

    public function save($savable){

        $routeN=$savable->giveRname();
        $des=$savable->givedes();

        $sql="INSERT INTO route(RouteName,Description)
        VALUES (?,?)";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$routeN,$des]);
    }

    public function update($updatable){
        $rid=$updatable-giveRid();
        $routeN=$updatable->giveRname();
        $des=$updatable->givedes();

        $sql="UPDATE route SET RouteName ='?', Description='?' WHERE empid='$rid'";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$routeN,$des]);
    }

    public function search($searchable){
        $rid=$searchable->giveRid();

        $sql="SELECT * FROM route WHERE empid =?";
        $stmt= $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$rid]);
        $result_off =$stmt->fetchAll();
        if ($result_off == NULL){
            return true;
        }
        else{return false;}

    }

    public function delete($deletable){
       $rid=$deletable->giveRid();

       $sql="DELETE FROM route WHERE rid = ?";
       $stmt= $this->dbconnection->connect()->prepare($sql);
       $stmt->execute([$rid]);
    }

    public function getAll(){
       $sql="SELECT * FROM route";
       $stmt= $this->dbconnection->connect()->prepare($sql);
       $stmt->execute();
       $result =$stmt->fetchAll();
       return $result;
    }


}
?>
