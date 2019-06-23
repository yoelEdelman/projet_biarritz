<?php
//function autoLoad($class)
//{
//    require './model/' . $class . '.php';
//}
//spl_autoload_register('autoLoad');

//require_once ('./model/Events.php');

function home(){
    require_once './views/frontend/index.php';
}

function history(){
    require_once './views/frontend/history.php';
}

function services(){
    $manager = new Services();
    $services = $manager->getList();
    require_once './views/frontend/services.php';
}

function events(){
//    $db = new PDO('mysql:host=localhost;dbname=biarritz_copie;charset=utf8', 'root', 'root');


    $eventsManager = new Events();
//    print_r($eventsManager);
//    die();
    $events = $eventsManager->getList();
    print_r($events);
//   die();
    require_once './views/frontend/events.php';
}

function contact(){
    require_once './views/frontend/contact.php';
}