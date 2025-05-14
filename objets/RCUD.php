<?php
class RCUD {
  protected $serverName = "localhost:3306";
  protected $userName = "r5v3";
  protected $password = "camille";
  protected $dbName = ["xgyd0647_techr5", "xgyd0647_r5business", "xgyd0647_blog"];
  private $sql;
  private $param;
  public function __construct($sql, $param) {
    $this->sql = $sql;
    $this->param = $param;
  }
  private function connexionDB($type) {
    try {
      $connexionDB = new PDO(
        "mysql:host=$this->serverName;dbname=" . $this->dbName[$type],
        $this->userName,
        $this->password
      );
      $connexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $connexionDB->exec("SET NAMES 'utf8mb4'");
    } catch(PDOException $e) {
      error_log($e->getMessage());
      echo "Error: " . $e->getMessage();
    }
    return $connexionDB;
  }
  public function CUD($type) {
    $conn = $this->connexionDB($type);
    $data = $conn->prepare($this->sql);
    foreach ($this->param as $key) {
      $data->bindParam($key['prep'],$key['variable']);
    }
    $data->execute();
  }
  public function READ($type) {
    $conn = $this->connexionDB($type);
    $data = $conn->prepare($this->sql);
    foreach ($this->param as $key) {
      $data->bindParam($key['prep'],$key['variable']);
    }
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataTraiter = $data->fetchAll();
    return $dataTraiter;
  }
  function __destruct() {
    $this->conn = null;
  }
}
