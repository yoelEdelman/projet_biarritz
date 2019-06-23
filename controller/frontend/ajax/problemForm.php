<?php
require_once ('../../../model/contact.php');
require_once ('../../../model/mail.php');

header("Access-Control-Allow-Origin: *");

$data = file_get_contents('php://input');
$json = json_decode($data);

sendProblemForm($json->address, $json->email, $json->description, $json->objectSelected, $json->reasonSelected);

$result = mailTo('biarritz.dev@gmail.com');

if (!$result){
    echo 'Une erreur est survenue Veuillez réessayer 1!';
}
else{
    $result = mailTo($json->email);
    if (!$result){
        echo 'Une erreur est survenue Veuillez réessayer 2!';
    }
    else{
        echo 'Nous avons bien reçu votre demande nous vous répondrons sous 365 jours !';
    }
}