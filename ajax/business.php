<?php
require_once '../config/database.php';
require_once '../controllers/businessController.php';

$db = (new Database())->connect();
$controller = new BusinessController($db);

$action = $_POST['action'] ?? '';

switch($action) {
    case 'fetch':
        echo json_encode($controller->fetch());
        break;
    case 'add':
        echo json_encode($controller->add($_POST));
        break;
    case 'update':
        echo json_encode($controller->update($_POST['id'],$_POST));
        break;
    case 'delete':
        echo json_encode($controller->delete($_POST['id']));
        break;
}