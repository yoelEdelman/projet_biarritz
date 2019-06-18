<?php
require_once ('../../../model/events.php');



header("Access-Control-Allow-Origin: *");

$data = file_get_contents('php://input');
$json = json_decode($data);

$test = str_replace('/', '-', $data);

$res = new stdClass();


$events = getEvents(FALSE, FALSE, $test);


echo json_encode($events);
