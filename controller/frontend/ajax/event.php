<?php
require_once ('../../../model/events.php');




header("Access-Control-Allow-Origin: *");

$data = file_get_contents('php://input');
$json = json_decode($data);

$res = new stdClass();




//function service(){
$events = getEvents($json, FALSE);


echo json_encode($events);
//    require_once './views/frontend/services.php';
//}