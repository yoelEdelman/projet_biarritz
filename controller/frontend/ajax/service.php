<?php
require_once ('../../../model/services.php');




header("Access-Control-Allow-Origin: *");

$data = file_get_contents('php://input');
$json = json_decode($data);

$res = new stdClass();




//function service(){
$services = getServices($json, FALSE);


echo json_encode($services);
//    require_once './views/frontend/services.php';
//}