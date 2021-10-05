  <?php
/*include_once "CrudDAO.inf.php";*/
//include "dbh.class.php";


class ticketbookDAO implements CrudDAO{
    private $dbconnection;
    public function __construct(){
        $this->dbconnection= Dbh :: getInstance();
    }
    public function save($savable){
        $ticketbookid = $savable->getTicketbookid();
        $Tickets = $savable->getTickets();
        $CurrentNumber = $savable->getCurrentNumber();
        $StartNumber = $savable->getStartNumber();
        $EndNumber = $savable->getEndNumber();
        $State = $savable->getState();
        $sql="INSERT INTO `ticketbook`(`ticketbookid`,`Tickets`, `CurruntNumber`, `StartNumber`, `EndNumber`, `State`) VALUES (?,?,?,?,?,?)";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$ticketbookid,$Tickets,$CurrentNumber,$StartNumber,$EndNumber,$State]);
    }

    public function update($updatable){
        $ticketbookid = $updatable->getTicketbookid();
        $Tickets = $savable->getTickets();
        $CurrentNumber = $savable->getCurrentNumber();
        $StartNumber = $savable->getStartNumber();
        $EndNumber = $savable->getEndNumber();
        $State = $savable->getState();
        $sql="UPDATE `ticketbook` SET `Tickets`=?,`CurruntNumber`=?,`StartNumber`=?,`EndNumber`=?,`State`=? WHERE `ticketbookid`=?";
        $stmt = $this->dbconnection->connect()->prepare($sql);
        $stmt->execute([$Tickets,$CurrentNumber,$StartNumber,$EndNumber,$State,$ticketbookid]);
    }

    public function search($searchable){
        $ticketbookid=$searchable->getTicketbookid();
        $sql_off="SELECT `Tickets`, `CurruntNumber`, `StartNumber`, `EndNumber`, `State` FROM `ticketbook` WHERE `ticketbookid`=?";
        $stmt_off = $this->dbconnection->connect()->prepare($sql_off);
        $stmt_off->execute([$ticketbookid]);
        $result_off =$stmt_off->fetchAll();
        if ($result_off == NULL){
            return NULL;
        }
        else{
          return $result_off;
        }

    }

    public function delete($deletable){
      $ticketbookid = $deletable->ticketbookid;
      $sql="DELETE FROM `ticketbook` WHERE `ticketbookid`=?";
      $stmt = $this->dbconnection->connect()->prepare($sql);
      $stmt->execute([$ticketbookid]);
    }

    public function getAll(){
        $sql = "SELECT * FROM `ticketbook`";
        $stmt = $dbh->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }


}
?>
