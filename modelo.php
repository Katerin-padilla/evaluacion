<?php

class DB {
  public $error = "";
  private $pdo = null;
  private $stmt = null;
  function __construct () {
    $this->pdo = new PDO(
      "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
      DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  function __destruct () {
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }
  
  function insert($sql, $data=null) {
    $this->stmt = $this->pdo->prepare($sql);
    return $this->stmt->execute($data);
  }

  function select ($sql, $data=null) {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);
    return $this->stmt->fetchAll();
  }
}

define("DB_HOST", "localhost");
define("DB_NAME", "datospersonales");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "1234567katy");
$_DB = new DB();