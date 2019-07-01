<?php
require_once ('../../../model/contact.php');
require_once ('../../../model/mail.php');

header("Access-Control-Allow-Origin: *");

$data = file_get_contents('php://input');
$json = json_decode($data);

sendProblemForm($json->address, $json->email, $json->description, $json->objectSelected, $json->reasonSelected);

if (!mailTo('biarritz.dev@gmail.com')){
    echo 'Une erreur est survenue Veuillez réessayer 1!';
}
else{
    if (!mailTo($json->email, FALSE, FALSE, FALSE, TRUE)){
        echo 'Une erreur est survenue Veuillez réessayer 2!';
    }
    else{
        echo 'Nous avons bien reçu votre demande nous vous répondrons sous 365 jours !';
    }
}
