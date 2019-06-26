<?php
require_once ('././model/services.php');
function services(){
    $services = getServices(FALSE, FALSE);
    require_once './views/frontend/services.php';
}
