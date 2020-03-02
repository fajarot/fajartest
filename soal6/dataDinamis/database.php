<?php
class Database
{
    protected $servername = "localhost";
    protected $user = "root";
    protected $pass = "";
    protected $dbName = "arkademy";
    protected $conn;

    function __construct()
    {
        try {
            $conn = new PDO("mysql:" . $this->servername . ";dbname=" . $this->dbName, $this->user, $this->pass);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn = $conn;
    }

    function GetAllData()
    {
        $query = 'SELECT cs.name AS CashierName
                        ,p.name AS ProductName
                        ,ct.name AS CateName
                        ,p.price 
                        ,p.id
                    FROM arkademy.product AS p 
                        LEFT JOIN arkademy.cashier AS cs 
                            ON p.id_cashier = cs.id
                        LEFT JOIN arkademy.category AS ct
                            ON p.id_category = ct.id';

        $stmt = $this->conn;
        $result = $stmt->query($query);

        return $result->fetchAll();
    }

    function TambahData($data)
    {
        $namaProduk = $data[0];
        $harga = $data[1];
        $kategory = $data[2];
        $namaKasir = $data[3];
        $stmt = $this->conn;

        $query = "INSERT INTO arkademy.category (name) VALUE ('$kategory')";
        $stmt->query($query);

        $query = "INSERT INTO arkademy.cashier (name) VALUE ('$namaKasir')";
        $stmt->query($query);

        $query = "INSERT INTO arkademy.product (name, price, id_category, id_cashier)
                        SELECT '$namaProduk', '$harga', cat.id, cas.id
                        FROM arkademy.cashier AS cas, arkademy.category AS cat
                        WHERE cat.name = '$kategory' AND cas.name = '$namaKasir'
                    ";
        $stmt->query($query);
    }

    function DeleteData($id)
    {
        $query = "DELETE FROM arkademy.product
                    WHERE product.id ='$id'";

        $this->conn->query($query);
    }

    function EditData($data)
    {
        $namaProduk = $data[0];
        $harga = $data[1];
        $id = $data[2];

        $query = "UPDATE arkademy.product
                        SET name = '$namaProduk', price = '$harga'
                            WHERE id ='$id'
                    ";

        $this->conn->query($query);
    }
}
