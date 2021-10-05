<?php
class BusDAO implements CrudDAO {
    private $dbconnection;
    public function __construct(){
        $this->dbconnection= Dbh::getInstance();
    }

    //---bus dao -Sandaru----------------//
    public function save($savable){   //enter a new row
        $busid=$savable->getBusid();
        $StartDate=$savable->getStartDate();
        $State=$savable->getState();
        $Numplate=$savable->getNumplate();
        $sql = "INSERT INTO bus (StartDate,State,Numplate)VALUES (?,?,?)";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$StartDate,$State,$Numplate]);
        //header("location:buslist.view.php");

    }
    public function update($updatable){

    }

    public function delete($deletable){

    }

    public function search($searchable){
      $busid=$searchable->getBusid();
      $sql_off="SELECT * FROM bus WHERE busid = ?";
      $stmt_off = $this->dbconnection->connect()->prepare($sql_off);
      $stmt_off->execute([$busid]);
      $result_off =$stmt_off->fetchAll();
      if ($result_off == NULL){
          return NULL;
      }else{
        return $result_off;
      }

    }




    public function getAll(){     //get the all of the data
        $sql = 'SELECT busid,StartDate,State,Numplate  FROM bus' ;
        $stmt = $this->dbconnection->connect()->prepare($sql);
		    $stmt->execute();

		return $stmt;

    }

}
?>
