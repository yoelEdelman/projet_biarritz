<?php
require_once ('././model/events.php');

function events(){
    $events = getEvents(FALSE, FALSE);
    require_once './views/frontend/events.php';
}