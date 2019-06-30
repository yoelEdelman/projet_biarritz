<?php
require_once ('././model/users.php');

function accountDetails(){
    $accountDetails = getUsers($_SESSION['user']['id'], FALSE, TRUE);
    if (isset($_POST['confirm'])){
        $result = confirmAccount($_SESSION['user']['id'], 1);
        if ($result){
            header('location:index.php?page=account');
            exit;
        }
    }
    elseif (isset($_POST['pass'])){
        header('location:index.php?page=account');
        exit;
    }
    require_once './views/frontend/confirmAccount.php';
}
