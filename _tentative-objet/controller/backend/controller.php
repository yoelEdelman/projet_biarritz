<?php
function adminHome(){
    require_once './views/backend/index.php';
}

function servicesList(){
    $manager = new Services();
    $services = $manager->getList();
    require_once './views/backend/servicesList.php';
}

function servicesForm(){
    if (isset($_GET['service-id'])){
        $manager = new Services();
        $service = $manager->get($_GET['service-id']);
    }
    if (isset($_POST['update'])){
        $manager = new Services($_POST);
        print_r($_POST);
        $medias = (new Medias())->checkMedias($_FILES);
        $services = $manager->update($medias);
    }
    elseif (isset($_POST['save'])){
        $service = new Services($_POST);
        $address = new Addresses($_POST);
//        print_r($_POST);
        if (empty($_FILES['media']) || /*empty($_FILES['video']) ||*/ empty($_POST['title']) || empty($_POST['summary'])
            || empty($_POST['content']) || empty($_POST['phone_number']) || empty($_POST['opening_days'])
            || empty($_POST['hours_from']) || empty($_POST['hours_to']) /*|| empty($_POST['is_published'])*/
            || empty($_POST['address']) || empty($_POST['zip_code']) || empty($_POST['city'])){
//            print_r($_POST);
            print_r($_FILES);
            $errors['empty'] = 'Veuillez remplir les champs sont obligatoire !';
        }
        else{
//            $allowedImgExtensions = ['jpg', 'jpeg', 'gif', 'png', 'svg'];
//            $allowedVideoExtensions = ['mp4'];
//            $medias = [];
//
//            foreach ($_FILES['media']['name'] as $key => $value){
//
//                $media = [];
//                $fileExtension = pathinfo($_FILES['media']['name'][$key], PATHINFO_EXTENSION);
//
//                if(in_array($fileExtension , $allowedImgExtensions)){
//
//                    if ($_FILES['media']['size'][$key] > 1000000){
//
//                        $errors['size'] = 'Votre fichier est trop lourd !';
//                    }
//                    $media["typeId"] = 1;
//
//                    do {
//                        $newFileName = rand() . time() . $_FILES['media']['name'][$key];
//                        $destination = '././assets/img/' . $newFileName;
//
//                    } while (file_exists($destination));
//                    $result = move_uploaded_file($_FILES['media']['tmp_name'][$key], $destination);
//                    if (!$result){
//                        $errors['error'] = "Erreur.";
//                    }
//                    $media["name"] = $newFileName;
//                }
//                elseif(in_array($fileExtension , $allowedVideoExtensions)){
//                    if ($_FILES['media']['size'][$key] > 1048576){
//                        $errors['size'] = 'Votre fichier est trop lourd !';
//                    }
//                    $media["typeId"] = 2;
//                    do {
//                        $newFileName = rand() . time() . $_FILES['media']['name'][$key];
//                        $destination = '././assets/video/' . $newFileName;
//                    } while (file_exists($destination));
//                    $result = move_uploaded_file($_FILES['media']['tmp_name'][$key], $destination);
//                    if (!$result){
//                        $errors['error'] = "Erreur.";
//                    }
//                    $media["name"] = $newFileName;
//                }
//                else {
//                    $errors['type'] = "Le type de fichier n'est pas conforme !";
//                }
//                array_push($medias, $media);
//            }
            $manager = new Services($_POST);
            $medias = (new Medias())->checkMedias($_FILES);
//            print_r($checkMedias);
            $services = $manager->add($medias);
        }
    }
    require_once './views/backend/servicesForm.php';
}

function eventsList(){
    $manager = new Events();
    $events = $manager->getList();
    require_once './views/backend/eventsList.php';
}

function eventsForm(){
    if (isset($_GET['event-id'])){
        $manager = new Events();
        $event = $manager->get($_GET['event-id']);
    }
    if (isset($_POST['update'])){
        //blabla
    }
    else{
        $manager = new Events($_POST);
        $result = $manager->add();
    }
    require_once './views/backend/eventsForm.php';
}

function categoriesList(){
    $manager = new Categories();
    $categories = $manager->getList();
    require_once './views/backend/categoriesList.php';
}

function categoriesForm(){
    if (isset($_GET['category-id'])){
        $manager = new Categories();
        $category = $manager->get($_GET['category-id']);
    }
    if (isset($_POST['save']) || isset($_POST['update'])){
        if (empty($_POST['name'])){
            $errors['empty'] = 'Tous les champs sont obligatoire !';
        }
        else{
            if (isset($_POST['update'])){
                $category->update($_POST);
            }
            else{
                $manager = new Categories($_POST);
                $result = $manager->add();
            }
        }
    }
    require_once './views/backend/categoriesForm.php';
}

//function categoriesForm(){
//    $categoriesManager = new CategoriesManager();
////    $categories = $categoriesManager->getList();
//    if (isset($_POST['save']) || isset($_POST['update'])){
//        if (empty($_POST['name'])){
//            $errors['empty'] = 'Tous les chams sont obligatoire !';
//        }
//        else{
//            if (isset($_POST['update'])){
//
//            }
//            else{
//                $categories = new Categories(['name' => $_POST['name']]);
////                $name = $categoriesManager->setName($_POST['name']);
//                $result = $categoriesManager->add($categories);
//            }
//        }
//    }
//    require_once './views/backend/categoriesForm.php';
//}