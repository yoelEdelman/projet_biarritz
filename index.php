<?php

require 'controller/frontend/index.php';
require 'controller/frontend/history.php';
require 'controller/frontend/services.php';
require 'controller/frontend/events.php';
require 'controller/frontend/contact.php';
require 'controller/frontend/login.php';

require 'controller/frontend/faq.php';




require 'controller/backend/categories.php';
require 'controller/backend/services.php';
require 'controller/backend/events.php';
require 'controller/backend/index.php';
require 'controller/backend/users.php';
require 'controller/backend/reasons.php';
require 'controller/backend/objects.php';




////function autoLoadController($class)
////{
////    require 'controller/frontend/' . $class . '.php';
////}
//function autoLoad($class)
//{
//    require './model/' . $class . '.php';
//}
//spl_autoload_register('autoLoad');
////spl_autoload_register('autoLoadController');


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
            case 'login':
                login();
                break;
            case 'account':
                account();
                break;
            case 'faq':
                faqs();
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
            case 'admin-services-list':
                servicesList();
                break;
            case 'admin-services-form':
                servicesForm();
                break;
            case 'admin-users-list':
                usersList();
                break;
            case 'admin-users-form':
                usersForm();
                break;
            case 'admin-reasons-list':
                reasonsList();
                break;
            case 'admin-reasons-form':
                reasonsForm();
                break;
            case 'admin-objects-list':
                objectsList();
                break;
            case 'admin-objects-form':
                objectsForm();
                break;
            default:
                // On redirige le visiteur vers la page d'accueil
                header('location:index.php');
                exit;
        }
    }
    else{
        // si on a recu le parametre logout en url
        if (isset($_GET['logout']) AND isset($_SESSION['user'])){
            // on deconecte
            unset($_SESSION["user"]);
            // On redirige le visiteur vers la page d'accueil
            header('location:index.php');
            exit;
        }
        home();
    }
}
catch (Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}