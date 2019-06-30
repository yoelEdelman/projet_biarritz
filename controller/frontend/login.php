<?php
require_once ('././model/login.php');
require_once ('././model/users.php');

function login(){
    if(isset($_POST['login']) ) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $errors['empty'] = 'Tout les champs sont obligatoires !';
        }
        else{
            $result = loginInfo($_POST['email'], $_POST['password']);
            if (!$result) {
                $errors['errorLogin'] = 'Identifiant ou mot de passe incorrect!';
            }
            else{
                $_SESSION['user']['firstName'] = $result['first_name'];
                $_SESSION['user']['isAdmin'] = $result['is_admin'];
                $_SESSION['user']['id'] = $result['id'];
                $_SESSION['user']['accountConfirmed'] = $result['account_confirmed'];
                if ($_SESSION['user']['accountConfirmed'] == 1){
                    header('location:index.php?page=account');
                    exit;
                }
                else{
                    header('location:index.php?page=confirm-account');
                    exit;
                }
            }
        }
    }
    elseif (isset($_POST['new-password'])){
        if (empty($_POST['email'])){
            $errors['empty'] = 'Veuillez saisir votre adresse mail!';
        }
        else{
            $result = checkMail($_POST['email']);
            if (!$result){
                $errors['wrongEmail'] = 'L\'email saisi n\'existe pas dans notre base de données !';
            }
            else{
                $result = updatePwd($_POST['email']);
                if (!$result){
                    $errors['errorUpdatePwd'] = 'Une erreur est survenue veuillez réessayer ultérieurement !';
                }
                else{
                    $_SESSION['success']['pdwUpdated'] = 'Mot de passe réinitialisé avec succès, Vous allez recevoir un nouveau mot de passe sur votre e-mail !';
                    header('location:index.php?page=login');
                    exit;
                }
            }
        }
    }
    require_once './views/frontend/login.php';
}
