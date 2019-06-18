<?php
require_once ('././model/services.php');

function servicesList(){
    if (isset($_GET['service-id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
        $result = deleteServices($_GET['service-id']/*, $_POST['current-medias']*/);
    }
    $services = getServices(FALSE, TRUE);
    require_once './views/backend/servicesList.php';
}

function servicesForm(){
    if (isset($_GET['service-id'])){
        $service = getServices($_GET['service-id'], TRUE);
    }
    if (isset($_POST['update']) || isset($_POST['save'])){
        if (empty($_POST['title']) || empty($_POST['summary']) || empty($_POST['content']) || empty($_POST['phone_number'])
            || empty($_POST['opening_days']) || empty($_POST['hours_from']) || empty($_POST['hours_to'])
            || empty($_POST['address']) || empty($_POST['zip_code']) || empty($_POST['city'])){
            $errors['empty'] = 'Veuillez remplir les champs sont obligatoire !';
        }
        elseif (isset($_POST['update'])){
            $services = updateServices($_POST['address'], $_POST['zip_code'], $_POST['city'], $_POST['country'], $_POST['location']
                , $_POST['title'], $_POST['summary'], $_POST['content'], $_POST['phone_number'], $_POST['opening_days']
                , $_POST['hours_from'], $_POST['hours_to'], $_POST['is_published'], $_POST['address-id'], $_POST['service-id']
                , $_FILES, $_POST['current_medias']);
        }
        elseif (isset($_POST['save'])){
            if (empty($_FILES['media'])){
                $errors['empty'] = 'Veuillez remplir les champs sont obligatoire !';
            }
            else{
                $services = addServices($_POST['address'], $_POST['zip_code'], $_POST['city'], $_POST['country'], $_POST['location']
                    , $_POST['title'], $_POST['summary'], $_POST['content'], $_POST['phone_number'], $_POST['opening_days']
                    , $_POST['hours_from'], $_POST['hours_to'], $_POST['is_published'], $_FILES);
            }
        }
    $service = [];
    $service['address'] = $_POST['address'];
    $service['zip_code'] = $_POST['zip_code'];
    $service['city'] = $_POST['city'];
    $service['country'] = $_POST['country'];
    $service['location'] = $_POST['location'];

    $service['title'] = $_POST['title'];
    $service['summary'] = $_POST['summary'];
    $service['content'] = $_POST['content'];
    $service['phone_number'] = $_POST['phone_number'];
    $service['opening_days'] = $_POST['opening_days'];
    $service['hours_from'] = $_POST['hours_from'];
    $service['hours_to'] = $_POST['hours_to'];
    $service['is_published'] = $_POST['is_published'];
    }
    require_once './views/backend/servicesForm.php';
}