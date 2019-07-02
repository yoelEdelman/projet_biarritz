<?php
require_once ('././model/events.php');

function home(){
    $events = getEvents(FALSE, FALSE, FALSE, 5);
    require_once './views/frontend/index.php';
}