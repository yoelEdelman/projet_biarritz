<?php
require_once ('././model/objects.php');

function objectsList(){
    if (isset($_GET['object-id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
        $result = deleteObjects($_GET['object-id']);
        if (!$result){
            $errors['errorDelete'] = 'Une erreur est survenue veuillez réessayer !';
        }
        else{
            $_SESSION['success']['objectDeleted'] = 'Supression effectuée avec succès !';
            header('location:index.php?page=admin-objects-list');
            exit;
        }
    }
    $objects = getObjects(FALSE);
    require_once './views/backend/objectsList.php';
}

function objectsForm(){
    if (isset($_GET['object-id'])){
        $object = getObjects($_GET['object-id']);
    }
    if (isset($_POST['update']) || isset($_POST['save'])){
        if (empty($_POST['object_name'])){
            $errors['empty'] = 'Veuillez remplir les champs obligatoires !';
        }
        elseif (isset($_POST['update'])){
            $result = updateObjects($_POST['object_name'], $_POST['object-id']);
            if (!$result){
                $errors['errorUpdate'] = 'Une erreur est survenue veuillez réessayer !';
            }
            else{
                $_SESSION['success']['objectUpdated'] = 'Modification effectuée avec succès !';
                header('location:index.php?page=admin-objects-list');
                exit;
            }
        }
        elseif (isset($_POST['save'])){
            $result = addObjects($_POST['object_name']);
            if (!$result){
                $errors['errorInsert'] = 'Une erreur est survenue veuillez réessayer !';
            }
            else{
                $_SESSION['success']['objectInserted'] = 'Insertion effectuée avec succès !';
                header('location:index.php?page=admin-objects-list');
                exit;
            }
        }
//        $service = [];
        $object['object_name'] = $_POST['object_name'];
    }
    require_once './views/backend/objectsForm.php';
}