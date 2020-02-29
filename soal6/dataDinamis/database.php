<?php
class Database
{
    protected $servername = "localhost";
    protected $user = "root";
    protected $pass = "root";
    protected $dbName = "arkademy";

    function __construct()
    {
        try {
            $conn = new PDO("mysql:" . $this->servername . ";dbname=" . $this->dbName, $this->user, $this->pass);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
