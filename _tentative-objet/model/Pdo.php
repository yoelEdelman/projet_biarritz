<?php

class Pdo {

    protected $db;

    public function __construct() {
        try{
            $this->db = new PDO('mysql:host=localhost;dbname=biarritz_copie;charset=utf8', 'root', 'root',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->setDb($db);
        }
        catch (Exception $exception)
        {
            die( 'Erreur : ' . $exception->getMessage() );
        }
    }

}