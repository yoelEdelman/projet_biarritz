<?php
require_once ('././model/users.php');
require_once ('././model/bills.php');


function account(){
    $user = getUsers($_SESSION['user']['id'], FALSE);
    $bills = getBills($_SESSION['user']['id']);
    require_once './views/frontend/account.php';
}