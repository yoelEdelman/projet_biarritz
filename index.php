<?php
require 'controller/frontend/index.php';
require 'controller/frontend/security.php';
require 'controller/backend/security.php';

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
                securityNotConnected();
                accountDetails();
                break;
            case 'account':
                require 'controller/frontend/account.php';
                securityNotConnected();
                account();
                break;
            case 'faq':
                require 'controller/frontend/faq.php';
                faq();
                break;
            case 'admin':
                require 'controller/backend/index.php';
                securityNotAdmin();
                adminHome();
                break;
            case 'admin-categories-list':
                require 'controller/backend/categories.php';
                securityNotAdmin();
                categoriesList();
                break;
            case 'admin-categories-form':
                require 'controller/backend/categories.php';
                securityNotAdmin();
                categoriesForm();
                break;
            case 'admin-events-list':
                require 'controller/backend/events.php';
                securityNotAdmin();
                eventsList();
                break;
            case 'admin-events-form':
                require 'controller/backend/events.php';
                securityNotAdmin();
                eventsForm();
                break;
            case 'admin-services-list':
                require 'controller/backend/services.php';
                securityNotAdmin();
                servicesList();
                break;
            case 'admin-services-form':
                require 'controller/backend/services.php';
                securityNotAdmin();
                servicesForm();
                break;
            case 'admin-users-list':
                require 'controller/backend/users.php';
                securityNotAdmin();
                usersList();
                break;
            case 'admin-users-form':
                require 'controller/backend/users.php';
                securityNotAdmin();
                usersForm();
                break;
            case 'admin-bills-form':
                require 'controller/backend/bills.php';
                securityNotAdmin();
                billsForm();
                break;
            case 'admin-reasons-list':
                require 'controller/backend/reasons.php';
                securityNotAdmin();
                reasonsList();
                break;
            case 'admin-reasons-form':
                require 'controller/backend/reasons.php';
                securityNotAdmin();
                reasonsForm();
                break;
            case 'admin-objects-list':
                require 'controller/backend/objects.php';
                securityNotAdmin();
                objectsList();
                break;
            case 'admin-objects-form':
                require 'controller/backend/objects.php';
                securityNotAdmin();
                objectsForm();
                break;
            case 'admin-questions-list':
                require 'controller/backend/questions.php';
                securityNotAdmin();
                questionsList();
                break;
            case 'admin-questions-form':
                require 'controller/backend/questions.php';
                securityNotAdmin();
                questionsForm();
                break;
            case 'admin-responses-list':
                require 'controller/backend/responses.php';
                securityNotAdmin();
                responsesList();
                break;
            case 'admin-responses-form':
                require 'controller/backend/responses.php';
                securityNotAdmin();
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
