<?php
require 'controller/frontend/index.php';
try{
    if(isset($_GET['page'])){
        switch ($_GET['page']) {
            case 'history':
                require 'controller/frontend/history.php';
                history();
                break;
            case 'services':
                require 'controller/frontend/services.php';
                services();
                break;
            case 'events':
                require 'controller/frontend/events.php';
                events();
                break;
            case 'contact':
                require 'controller/frontend/contact.php';
                contact();
                break;
            case 'login':
                require 'controller/frontend/login.php';
                login();
                break;
            case 'confirm-account':
                require 'controller/frontend/confirmAccount.php';
                accountDetails();
                break;
            case 'account':
                require 'controller/frontend/account.php';
                account();
                break;
            case 'faq':
                require 'controller/frontend/faq.php';
                faq();
                break;
            case 'admin':
                require 'controller/backend/index.php';
                adminHome();
                break;
            case 'admin-categories-list':
                require 'controller/backend/categories.php';
                categoriesList();
                break;
            case 'admin-categories-form':
                require 'controller/backend/categories.php';
                categoriesForm();
                break;
            case 'admin-events-list':
                require 'controller/backend/events.php';
                eventsList();
                break;
            case 'admin-events-form':
                require 'controller/backend/events.php';
                eventsForm();
                break;
            case 'admin-services-list':
                require 'controller/backend/services.php';
                servicesList();
                break;
            case 'admin-services-form':
                require 'controller/backend/services.php';
                servicesForm();
                break;
            case 'admin-users-list':
                require 'controller/backend/users.php';
                usersList();
                break;
            case 'admin-users-form':
                require 'controller/backend/users.php';
                usersForm();
                break;
            case 'admin-bills-form':
                require 'controller/backend/bills.php';
                billsForm();
                break;
            case 'admin-reasons-list':
                require 'controller/backend/reasons.php';
                reasonsList();
                break;
            case 'admin-reasons-form':
                require 'controller/backend/reasons.php';
                reasonsForm();
                break;
            case 'admin-objects-list':
                require 'controller/backend/objects.php';
                objectsList();
                break;
            case 'admin-objects-form':
                require 'controller/backend/objects.php';
                objectsForm();
                break;
            case 'admin-questions-list':
                require 'controller/backend/questions.php';
                questionsList();
                break;
            case 'admin-questions-form':
                require 'controller/backend/questions.php';
                questionsForm();
                break;
            case 'admin-responses-list':
                require 'controller/backend/responses.php';
                responsesList();
                break;
            case 'admin-responses-form':
                require 'controller/backend/responses.php';
                responsesForm();
                break;
            default:
                header('location:index.php');
                exit;
        }
    }
    else{
        // si on a recu le parametre logout en url
        if (isset($_GET['logout']) && isset($_SESSION['user'])){
            // on deconecte
            unset($_SESSION['user']);
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
