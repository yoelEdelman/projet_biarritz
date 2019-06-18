<?php
require_once ('././model/events.php');

function home(){
    $events = getEvents(FALSE, FALSE);
    require_once './views/frontend/index.php';
}