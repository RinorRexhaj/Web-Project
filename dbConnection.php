<?php

    class DatabaseConnection {
        private $host = "localhost"; 
        private $dbname = "web-project"; 
        private $username = "root";
        private $password = "";
        private $conn = null;

        public function startConnection() {
            try {
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname",
                $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) . "<br/>";
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC) . "<br/>";
                // echo "Lidhja me: {$this->dbname} - {$this->host}: eshte realizuar me sukses!";
            } catch (PDOException $pdoe) {
                die("Nuk mund të lidhej me bazën e të dhënave {$this->dbname} :" . $pdoe->getMessage());
            }
            return $this->conn;
        }
}
?>