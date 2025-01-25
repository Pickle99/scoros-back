<?php

require_once 'src/FileValidator.php';
require_once 'src/FileComparator.php';
require_once 'src/FileComparatorController.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new FileComparatorController();
    $controller->handleRequest();
} else {
    http_response_code(400);
    echo json_encode(["error" => "Bad Request. Only POST method is allowed."]);
}
