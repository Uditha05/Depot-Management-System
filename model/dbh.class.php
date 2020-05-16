<?php
/**
 *
 */
class Dbh
{

  private $servername = "localhost";
  private $dbUsername = "root";
  private $dbPassword = "";
  private $dbName = "depot management system";

  protected function connect()
  {

    $dsn = 'mysql:host=' . $this->servername . ';dbname=' . $this->dbName;
    $pdo = new PDO($dsn, $this->dbUsername, $this->dbPassword);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
    }
}
?>
