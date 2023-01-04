<?php
class database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ogf";
    private $conn = null;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // echo "Connected successfully";
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
