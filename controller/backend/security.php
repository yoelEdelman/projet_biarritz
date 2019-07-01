<?php
function securityNotAdmin(){
    if(!isset($_SESSION['user']) OR $_SESSION['user']['isAdmin'] == 0){
        header('location:../index.php');
        exit;
    }
}
