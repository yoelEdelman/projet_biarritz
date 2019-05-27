<?php

require 'controller/frontend/controller.php';
require 'controller/backend/controller.php';
function autoLoad($class)
{
    require './model/' . $class . '.php';
}
spl_autoload_register('autoLoad');

try{
    if(isset($_GET['page'])){
        switch ($_GET['page']) {
            case 'history':
                history();
                break;
            case 'services':
                services();
                break;
            case 'events':
                events();
                break;
            case 'contact':
                contact();
                break;
            case '':
                break;
            case 'admin':
                adminHome();
                break;
            case 'admin-categories-list':
                categoriesList();
                break;
            case 'admin-categories-form':
                categoriesForm();
                break;
            case 'admin-events-list':
                eventsList();
                break;
            case 'admin-events-form':
                eventsForm();
                break;
            default:
                // On redirige le visiteur vers la page d'accueil
                header('location:index.php');
                exit;
        }
    }
    else{
        home();
    }
}
catch (Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}