<?php
require_once ('././model/login.php');

function login(){

    // On declare un tableau warning pour stocker les eventuellescmessages d'erreur
    $warnings = [];

    // si le formulaire de connexion a ete envoyer
    if(isset($_POST['login']) ) {

        // on verifie que les champs obligatoires sont remplie
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $warnings['empty'] = 'Tous les chams sont obligatoire !';
        }
        else{
            // on recupere toutes les infos de la table user la ou le mail et pwd est egale a celui recu en post
            $loginInfo = loginInfo($_POST['email'], $_POST['password']);

            // si l'email ou pwd ne correnspondent a celui de la db
            if (!$loginInfo) {
                $warnings['errorLogin'] = 'Mauvaise identifiant !';
            }
            // si l'email et pwd recu en post correnspondent a celui de la db on connecte l'utilisateur et on le redirige a la page d'acceuil
            else{
                $_SESSION['user']['firstName'] = $loginInfo['first_name'];
                $_SESSION['user']['isAdmin'] = $loginInfo['is_admin'];
                $_SESSION['user']['id'] = $loginInfo['id'];
//                print_r($_SESSION['user']);
//                die();

                header('location:index.php');
                exit;
            }
        }
    }
    elseif (isset($_POST['new-password'])){
        if (empty($_POST['email'])){
            $warnings['empty'] = 'Veuillez saisir votre addresse mail !';
        }
        else{
            $result = checkMail($_POST['email']);

            if (!$result){
                $warnings['wrongEmail'] = 'L\'email sassi n\'a pas ete trouve dans notre base de donnees !';
            }
            else{
                $result = updatePwd($_POST['email']);
                if (!$result){
                    $warnings['errorUpdatePwd'] = 'Une erreur est survenu veuillez r\'essayer ulterierement !';
                }
                else{
                    $_SESSION['success']['pdwUpdated'] = 'Mot de passe reinissialiser avec succes vous alez recevoir un email avec votre nouveau mot de passe !';
                    header('location:index.php?page=login');
                    exit;
                }
            }
        }
//        print_r('hello world !');
//        die();
    }
    require_once './views/frontend/login.php';
}