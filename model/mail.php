<?php
function mailTo($destination, $pwd, $newPwd = FALSE, $updatePwd = FALSE, $request = FALSE){
    $mail = $destination; // Déclaration de l'adresse de destination.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }
//=====Déclaration des messages au format texte et au format HTML.
    if ($newPwd){
        $message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP avec votre mot de passe. $pwd";
        $message_html = "<html><head></head><body><b>Salut à tous</b>, Bienvenue et voici un e-mail envoyé par un <i>script PHP</i>avec votre mot de passe. $pwd </body></html>";
    }
    elseif ($updatePwd){
        $message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP avec votre mot de passe. $pwd";
        $message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>avec votre nouveau mot de passe. $pwd </body></html>";
    }
    elseif ($request){
        $message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>nous avons bien recu votre demande nous vous reponderons d'ici 365 jours </body></html>";
    }

//==========

//=====Création de la boundary
    $boundary = "-----=".md5(rand());
//==========

//=====Définition du sujet.
    $sujet = "Hey mon ami !";
//=========

//=====Création du header de l'e-mail.
    $header = "From: \"Ville de Biarritz\"<biarritz.dev@gmail.com>".$passage_ligne;
    $header.= "Reply-to: \"Client\" <$destination>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========

//=====Création du message.
    $message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
    $message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
//==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========

//=====Envoi de l'e-mail.
    mail($mail,$sujet,$message,$header);
//==========
}

?>

