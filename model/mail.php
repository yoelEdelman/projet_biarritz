<?php
function mailTo($destination, $pwd = FALSE, $newPwd = FALSE, $updatePwd = FALSE, $request = FALSE){
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
        $message_txt = "Bonjour nous avons le plaisir de vous communiquer votre mot de passe pour vous connecter à votre espace. $pwd";
        $message_html = "<html><head></head><body><b>Bonjour</b>, nous avons le plaisir de vous communiquer votre mot de passe pour vous connecter à votre espace. $pwd </body></html>";
    }
    elseif ($updatePwd){
        $message_txt = "Bonjour voici votre nouveau mot de passe essayer de ne pas le perdre la prochaine fois. $pwd";
        $message_html = "<html><head></head><body><b>Bonjour</b>, voici votre nouveau mot de passe essayer de ne pas le perdre la prochaine fois. $pwd </body></html>";
    }
    elseif ($request){
        $message_txt = "Bonjour, nous avons bien reçu votre message, Nous vous répondrons sous 365 jours Ou pas ;).";
        $message_html = "<html><head></head><body><b>Bonjour</b>, nous avons bien reçu votre message, Nous vous répondrons sous 365 jours Ou pas ;). </body></html>";
    }
    else{
        $message_txt = "Salut Admin tu viens de recevoir en nouveau message . ";
        $message_html = "<html><head></head><body><b>Salut Admin</b>, tu viens de recevoir en nouveau message .   </body></html>";
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
    return mail($mail,$sujet,$message,$header);
//==========
}
