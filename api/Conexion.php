<?php
class Database{
    private $host = 'if0ck476y7axojpg.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306';
    private $dbname = 'cf4gyt8i77jr61z7';
    private $user = 'w49yz0jakp9k7019';
    private $pass = 'idwl7dk6zrvp6oy3';
    public $cnx = null;
    function __construct() {
        $this->getConnection();
    }
    function __destruct() {
        $this->cnx = null;
    }
    public function getConnection() {
        try {
            $this->cnx = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);
            // set the PDO error mode to exception
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            

        } catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
 }
