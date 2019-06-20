<?php
require_once ('../../../model/contact.php');
require_once ('../../../model/mail.php');

header("Access-Control-Allow-Origin: *");

$data = file_get_contents('php://input');
$json = json_decode($data);

sendContactForm($json->name, $json->firstName, $json->phoneNumber, $json->email, $json->description);

$result = mailTo('biarritz.dev@gmail.com');

if (!$result){
    echo 'Une erreur est survenue Veuillez réessayer !';
}
else{
    $result = mailTo($json->email);
    if (!$result){
        echo 'Une erreur est survenue Veuillez réessayer !';
    }
    else{
        echo 'Nous avons bien reçu votre demande nous vous répondrons sous 365 jours !';
    }
}