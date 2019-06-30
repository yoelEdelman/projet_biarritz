<?php
require_once ('././model/users.php');
require_once ('././model/mail.php');

function usersList(){
    if (isset($_GET['user-id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
        $result = deleteUsers($_GET['user-id']);
        if (!$result){
            $errors['errorDelete'] = 'Une erreur est survenue veuillez réessayer !';
        }
        else{
            $_SESSION['success']['userDeleted'] = 'Suppression effectuée avec succès !';
            header('location:index.php?page=admin-users-list');
            exit;
        }
    }
    $users = getUsers(FALSE, TRUE);
    require_once './views/backend/usersList.php';
}

function usersForm(){
    if (isset($_GET['user-id'])){
        $user = getUsers($_GET['user-id'], TRUE);
    }
    if (isset($_POST['update']) || isset($_POST['save'])){
        $zipCode = (int)$_POST['zip_code'];
        if (empty($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['email']) || empty($_POST['dob'])
            || empty($_POST['address']) || empty($_POST['zip_code'])
            || empty($_POST['city'])){
            $errors['empty'] = 'Veuillez remplir les champs obligatoire !';
        }
        elseif (!is_int($zipCode)){
            $errors['notInt'] = 'Le code postale ne peut contenir des nombre uniquement';
        }
        elseif (isset($_POST['update'])){
            $result = updateUsers($_POST['address'], $zipCode, $_POST['city'], $_POST['country']
                , $_POST['last_name'], $_POST['first_name'], $_POST['email'], $_POST['dob']
                , $_POST['home_number'], $_POST['mobile_number'], $_POST['is_admin'], $_POST['address-id']
                , $_POST['user-id']);
            if (!$result){
                $errors['errorUpdate'] = 'Une erreur est survenue veuillez réessayer !';
            }
            else{
                $_SESSION['success']['userUpdated'] = 'Modification effectuée avec succès !';
                header('location:index.php?page=admin-users-list');
                exit;
            }
        }
        elseif (isset($_POST['save'])){
            $result = addUsers($_POST['address'], $zipCode, $_POST['city'], $_POST['country']
                , $_POST['last_name'], $_POST['first_name'], $_POST['email'], $_POST['dob']
                , $_POST['home_number'], $_POST['mobile_number'], $_POST['is_admin']);
            if (!$result){
                $errors['errorInsert'] = 'Une erreur est survenue veuillez réessayer !';
            }
            else{
                $_SESSION['success']['userInserted'] = 'Insertion effectuée avec succès !';
                header('location:index.php?page=admin-users-list');
                exit;
            }
        }
        $user = [];
        $user['address'] = $_POST['address'];
        $user['zip_code'] = $_POST['zip_code'];
        $user['city'] = $_POST['city'];
        $user['country'] = $_POST['country'];

        $user['last_name'] = $_POST['last_name'];
        $user['first_name'] = $_POST['first_name'];
        $user['email'] = $_POST['email'];
        $user['dob'] = $_POST['dob'];
        $user['home_number'] = $_POST['home_number'];
        $user['mobile_number'] = $_POST['mobile_number'];
        $user['is_admin'] = $_POST['is_admin'];
    }
    require_once './views/backend/usersForm.php';
}
