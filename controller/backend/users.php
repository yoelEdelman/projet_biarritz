<?php
require_once ('././model/users.php');
require_once ('././model/mail.php');


function usersList(){

    if (isset($_GET['user-id']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
        $result = deleteUsers($_GET['user-id']);
    }
    $users = getUsers(FALSE, TRUE);

    require_once './views/backend/usersList.php';
}


function usersForm(){

    if (isset($_GET['user-id'])){
        $user = getUsers($_GET['user-id'], TRUE);
//        print_r($user);
//        die();
    }
    if (isset($_POST['update']) || isset($_POST['save'])){
//        print_r(gettype($_POST['dob']));
//        die();
//        $pwd = randPassword(6);
//        $resultMail = mailTo();
//        print_r($pwd);
//        die();
//        print_r(gettype($_POST['zip_code']));
//        die();
        if (empty($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['email']) || empty($_POST['dob'])
            || empty($_POST['address']) || empty($_POST['zip_code'])
            || empty($_POST['city'])){
            $errors['empty'] = 'Veuillez remplir les champs sont obligatoire !';
        }
        $zipCode = (int)$_POST['zip_code'];
        if (!is_int($zipCode)){
            $errors['notInt'] = 'Le code postal !';
        }

        elseif (isset($_POST['update'])){
//            print_r($_POST);
//            die();
            $user = updateUsers($_POST['address'], $zipCode, $_POST['city'], $_POST['country']
                , $_POST['last_name'], $_POST['first_name'], $_POST['email'], $_POST['dob']
                , $_POST['home_number'], $_POST['mobile_number'], $_POST['is_admin'], $_POST['address-id']
                , $_POST['user-id']);
        }
        elseif (isset($_POST['save'])){
            $user = addUsers($_POST['address'], $zipCode, $_POST['city'], $_POST['country']
                , $_POST['last_name'], $_POST['first_name'], $_POST['email'], $_POST['dob']
                , $_POST['home_number'], $_POST['mobile_number'], $_POST['is_admin']);
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


//        $image = $_FILES['media'];
    }
    require_once './views/backend/usersForm.php';
}