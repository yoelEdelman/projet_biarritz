<?php
require_once ('././model/reasons.php');
require_once ('././model/objects.php');

function reasonsList(){
    if (isset($_GET['reason-id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
        $result = deleteReasons($_GET['reason-id']);
        if (!$result){
            $errors['errorDelete'] = 'Une erreur est survenue veuillez réessayer !';
        }
        else{
            $_SESSION['success']['reasonDeleted'] = 'Supression effectuée avec succès !';
            header('location:index.php?page=admin-reasons-list');
            exit;
        }
    }
    $reasons = getReasons(FALSE);
    require_once './views/backend/reasonsList.php';
}

function reasonsForm(){
    $objects = getObjects();

    if (isset($_GET['reason-id'])){
        $reason = getReasons($_GET['reason-id']);
    }
    if (isset($_POST['update']) || isset($_POST['save'])){
        if (empty($_POST['reason_name']) || empty($_POST['objects'])){
            $errors['empty'] = 'Veuillez remplir les champs sont obligatoire !';
        }
        elseif (isset($_POST['update'])){
            $result = updateReasons($_POST['reason_name'], $_POST['objects'], $_POST['reason-id']);
            if (!$result){
                $errors['errorUpdate'] = 'Une erreur est survenue veuillez réessayer !';
            }
            else{
                $_SESSION['success']['reasonUpdated'] = 'Modification effectuée avec succès !';
                header('location:index.php?page=admin-reasons-list');
                exit;
            }
        }
        elseif (isset($_POST['save'])){
            $result = addReasons($_POST['reason_name'], $_POST['objects']);
            if (!$result){
                $errors['errorInsert'] = 'Une erreur est survenue veuillez réessayer !';
            }
            else{
                $_SESSION['success']['reasonInserted'] = 'Insertion effectuée avec succès !';
                header('location:index.php?page=admin-reasons-list');
                exit;
            }
        }
        $reason['reason_name'] = $_POST['reason_name'];
    }
    require_once './views/backend/reasonsForm.php';
}