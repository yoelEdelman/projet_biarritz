<?php
require_once ('../../../model/reasons.php');

header("Access-Control-Allow-Origin: *");

$data = file_get_contents('php://input');

$reasons = getReasons(FALSE, $data);

echo json_encode($reasons);
