<?php
function securityNotConnected(){
    if(!isset($_SESSION['user'])){
        header('location:../index.php');
        exit;
    }
}
