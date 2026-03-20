<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "bussiness";

    public function connect() {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($conn->connect_error) {
            die(json_encode(["status" => "error", "message" => $conn->connect_error]));
        }

        return $conn;
    }
}