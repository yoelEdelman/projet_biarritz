<?php
require_once ('././model/events.php');
require_once ('././model/categories.php');


function eventsList(){
    if (isset($_GET['event-id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
        $result = deleteEvents($_GET['event-id'] /*, $_POST['current-medias']*/);
    }
    $events = getEvents(FALSE, TRUE);
    $categories = getCategoriesList();
//    print_r($events);
//    die();
    require_once './views/backend/eventsList.php';
}

function eventsForm(){
    $categories = getCategoriesList();

    if (isset($_GET['event-id'])){
        $event = getEvents($_GET['event-id'], TRUE);
//        print_r($event);
//        die();
    }
    if (isset($_POST['update']) || isset($_POST['save'])){
//        print_r($_POST);
//        die();
        if (empty($_POST['title']) || empty($_POST['summary']) || empty($_POST['content']) || empty($_POST['event_date'])
            || empty($_POST['published_at']) || empty($_POST['address']) || empty($_POST['zip_code'])
            || empty($_POST['city'])){
            $errors['empty'] = 'Veuillez remplir les champs sont obligatoire !';


        }
        if (isset($_POST['update'])){
//            print_r($_POST);
//            die();
            $event = updateEvents($_POST['address'], $_POST['zip_code'], $_POST['city'], $_POST['country'], $_POST['location']
                , $_POST['title'], $_POST['summary'], $_POST['content'], $_POST['event_date'], $_POST['event_time']
                , $_POST['phone_number'], $_POST['is_published'], $_POST['published_at'], $_POST['address-id']
                , $_POST['event_id'], $_POST['categories'], $_FILES, $_POST['current_medias']);
        }
        elseif (isset($_POST['save'])){
            if (empty($_FILES['media'])){
                $errors['empty'] = 'Veuillez remplir les champs sont obligatoire !';
            }
            else{
                $event = addEvents($_POST['address'], $_POST['zip_code'], $_POST['city'], $_POST['country'], $_POST['location']
                    , $_POST['title'], $_POST['summary'], $_POST['content'], $_POST['event_date'], $_POST['event_time']
                    , $_POST['phone_number'], $_POST['is_published'], $_POST['published_at'], $_POST['categories'], $_FILES);
//                print_r($_POST);
//                die();
            }
        }
        $event = [];
        $event['address'] = $_POST['address'];
        $event['zip_code'] = $_POST['zip_code'];
        $event['city'] = $_POST['city'];
        $event['country'] = $_POST['country'];
        $event['location'] = $_POST['location'];

        $event['title'] = $_POST['title'];
        $event['summary'] = $_POST['summary'];
        $event['content'] = $_POST['content'];
        $event['event_date'] = $_POST['event_date'];
        $event['event_time'] = $_POST['event_time'];
        $event['phone_number'] = $_POST['phone_number'];
        $event['is_published'] = $_POST['is_published'];
        $event['published_at'] = $_POST['published_at'];

        $event['category_id'] = $_POST['categories'];

//        $image = $_FILES['media'];
    }
    require_once './views/backend/eventsForm.php';
}