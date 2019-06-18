<?php

function dbConnect()
{
    //paramétrage de la langue de traduction pour PHP
    setlocale(LC_ALL, "fr_FR");

    //connexion à la base de données
    try{
        return $db = new PDO('mysql:host=localhost;dbname=biarritz;charset=utf8', 'root', 'biarritz.dev',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    }
    catch (PDOException $exception)
    {
        die( 'Erreur : ' . $exception->getMessage() );
    }
}

session_start();
