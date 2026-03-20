<?php
class Business {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT b.*, IFNULL(AVG(r.rating),0) as avg_rating
                  FROM businesses b
                  LEFT JOIN ratings r ON b.id = r.business_id
                  GROUP BY b.id";

        $result = $this->conn->query($query);
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO businesses(name,address,phone,email) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $data['name'],$data['address'],$data['phone'],$data['email']);
        return $stmt->execute();
    }

    public function update($id,$data) {
        $stmt = $this->conn->prepare("UPDATE businesses SET name=?,address=?,phone=?,email=? WHERE id=?");
        $stmt->bind_param("ssssi", $data['name'],$data['address'],$data['phone'],$data['email'],$id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM businesses WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
