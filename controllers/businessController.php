<?php
require_once '../models/Business.php';

class BusinessController {
    private $business;

    public function __construct($db) {
        $this->business = new Business($db);
    }

    public function fetch() {
        return $this->business->getAll();
    }

    public function add($data) {
        if(empty($data['name'])) {
            return ["status"=>"error","message"=>"Name required"];
        }
        $this->business->create($data);
        return ["status"=>"success"];
    }

    public function update($id,$data) {
        $this->business->update($id,$data);
        return ["status"=>"updated"];
    }

    public function delete($id) {
        $this->business->delete($id);
        return ["status"=>"deleted"];
    }
}