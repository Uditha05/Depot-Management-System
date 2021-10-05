<?php
class Dbh{
    private static $instance = null;

    private $host="localhost";
    private $user="root";
    private $pwd="";
    private $dbName="depot";

    private function __construct(){

    }

    public function connect(){
        try{
        $dsn= 'mysql:host=' .$this->host. ';dbname=' .$this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
        }
        catch(PDOexception $e){
            echo "Connection failed:" .$e->getMessage();
        }
    }

    public function getInstance(){
        if(!self::$instance){
            self::$instance = new  Dbh();
        }
        return self::$instance;
    }

}

?>
