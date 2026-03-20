<?php
require_once '../config/database.php';
require_once '../controllers/ratingController.php';

$db = (new Database())->connect();
$controller = new RatingController($db);

if($_POST['action']=='rate'){
    echo json_encode($controller->save($_POST));
}
