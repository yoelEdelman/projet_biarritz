<?php
require_once('dbConnect.php');
require_once('addresses.php');

function loginInfo($mail, $pwd){
    $db = dbConnect();
    $queryString = 'SELECT id, email, password, first_name, is_admin, account_confirmed FROM users WHERE email = :mail AND password = :pwd';
    $queryParameters = [
        'mail' => $mail,
        'pwd' => md5($pwd)
    ];
    $query = $db->prepare($queryString);
    $query->execute($queryParameters);
    return $query->fetch();
}

function checkMail($mail){

    $db = dbConnect();

    $queryString = 'SELECT email FROM users WHERE email = :id';

    $query = $db->prepare($queryString);
    $query->execute(['id' => $mail]);

    return $query->fetch(PDO::FETCH_ASSOC);
}
