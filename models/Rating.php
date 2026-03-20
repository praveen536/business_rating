<?php
class Rating {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function save($data) {
        $stmt = $this->conn->prepare(
            "SELECT id FROM ratings WHERE business_id=? AND (email=? OR phone=?)"
        );
        $stmt->bind_param("iss", $data['business_id'],$data['email'],$data['phone']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $update = $this->conn->prepare("UPDATE ratings SET rating=? WHERE id=?");
            $update->bind_param("di", $data['rating'],$row['id']);
            return $update->execute();
        } else {
            $insert = $this->conn->prepare(
                "INSERT INTO ratings(business_id,name,email,phone,rating) VALUES (?,?,?,?,?)"
            );
            $insert->bind_param("isssd",
                $data['business_id'],
                $data['name'],
                $data['email'],
                $data['phone'],
                $data['rating']
            );
            return $insert->execute();
        }
    }
}