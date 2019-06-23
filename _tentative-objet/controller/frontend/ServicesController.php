<?php
class ServicesController
{
    public function __services(){
        $manager = new Services();
        $services = $manager->getList();
        require_once './views/frontend/services.php';
    }
}