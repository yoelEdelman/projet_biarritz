<?php
function adminHome(){
    require_once './views/backend/index.php';
}

function eventsList(){
    $manager = new Events();
    $events = $manager->getList();
    require_once './views/backend/eventsList.php';
}

function eventsForm(){
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
            $errors['empty'] = 'Tous les chams sont obligatoire !';
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