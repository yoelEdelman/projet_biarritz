<?php
require_once ('../../../model/events.php');

header("Access-Control-Allow-Origin: *");

$data = file_get_contents('php://input');
$json = json_decode($data);

$newFormat = str_replace('/', '-', $data);

$events = getEvents(FALSE, FALSE, $newFormat);

echo json_encode($events);
