<?php
class Connexion{
    private $host = "localhost";
    private $dbname = "gestion_parking";
    private $username = "root";
    private $password = "";
    protected $conn;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public function disconnect() {
        $this->conn = null;
    }
}