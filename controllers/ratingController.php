<?php
require_once '../models/Rating.php';

class RatingController {
    private $rating;

    public function __construct($db) {
        $this->rating = new Rating($db);
    }

    public function save($data) {
        if(empty($data['rating'])) {
            return ["status"=>"error","message"=>"Rating required"];
        }
        $this->rating->save($data);
        return ["status"=>"rated"];
    }
}