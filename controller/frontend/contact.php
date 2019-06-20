<?php
require_once ('././model/objects.php');
require_once ('././model/reasons.php');

function contact(){
    $objects = getObjects();
    require_once './views/frontend/contact.php';
}