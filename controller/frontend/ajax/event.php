<?php
require_once ('../../../model/events.php');

header("Access-Control-Allow-Origin: *");

$data = file_get_contents('php://input');
$json = json_decode($data);

$events = getEvents($json, FALSE);

echo json_encode($events);
