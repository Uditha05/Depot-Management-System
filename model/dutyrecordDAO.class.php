<?php



class dutyRecordDAO implements CrudDAO{
    private $dbconnection;
    public function __construct(){
        $this->dbconnection= Dbh :: getInstance();
    }
    public function save($savable){

         $bus= $savable->givebus();
         $route= $savable->giveroute();
         $slot= $savable->giveslot();
         $ticketbook= $savable->giveticket();
         $driver= $savable->givedriv();
         $conductor= $savable->givecond();
         $date= $savable->givedate();
         $dispatch= $savable->givedis();
         $dieselusage= $savable->givedies();
         $cashamount= $savable->givecashamount();


        $sql = 'INSERT INTO dutyrecord(busid,routeid,slotid,driverid,conductorid,`Date`,dieselusage) VALUES (?,?,?,?,?,CURRENT_DATE,?)';
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$bus,$route,$slot,$driver,$conductor,$dieselusage]);

    }

    public function update($updatable){
        $id = $updatable->giveduty();

         $bus= $updatable->givebus();
         $route= $updatable->giveroute();
         $slot= $updatable->giveslot();
         $ticketbook= $updatable->giveticket();
         $driver= $updatable->givedriv();
         $conducter= $updatable->givecond();
         $date= $updatable->givedate();
         $dispatch= $updatable->givedis();
         $dieselusage= $updatable->givedies();
         $cashamount= $updatable->givecashamount();

        $time = date("h:i:s");
        $sql="UPDATE dutyRecord SET busid = '',routeid= '?',slotid= '?',ticketbookid= '?',driverid= '?',conducterid= '?',date= '?',dispatch= '?',dieselusage= '?',cashamount= '?' WHERE dutyid='$id'";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$bus,$route,$slot,$ticketbook,$driver,$conductor,$date,$dispatch,$dieselusage,$cashamount]);
    }

    public function search($searchable){
        $id=$searchable->giveduty();
        $sql="SELECT dutyid FROM dutyRecord WHERE dutyid =? ";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result_off =$stmt->fetchAll();
        if ($result_off == NULL){
            return true;
        }
        else{return false;}

    }

    public function delete($deletable){
       $id=$deletable->giveduty();

       $sql="DELETE FROM dutyRecord WHERE dutyid = ?";
       $stmt= $this->dbconnection->connect()->prepare($sql);
       $stmt->execute([$id]);
    }

    public function getAll(){
       $sql="SELECT * FROM dutyRecord";
       $stmt= $this->dbconnection->connect()->prepare($sql);
       $stmt->execute();
       $result =$stmt->fetchAll();
       return $result;
    }

}
?>
