<?php
require_once ('../../../model/services.php');

header("Access-Control-Allow-Origin: *");

$data = file_get_contents('php://input');
$json = json_decode($data);

$services = getServices($json, FALSE);

echo json_encode($services);
