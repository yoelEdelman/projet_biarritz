<?php
abstract class dbConnect
{

    protected $db;

    public function __construct()
    {
        //paramétrage de la langue de traduction pour PHP
        setlocale(LC_ALL, "fr_FR");

        //connexion à la base de données
        try{
             $db = new PDO('mysql:host=localhost;dbname=biarritz_copie;charset=utf8', 'root', 'root',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
             $this->setDb($db);
        }
        catch (PDOException $exception)
        {
            die( 'Erreur : ' . $exception->getMessage() );
        }
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db): void
    {
        $this->db = $db;
    }

}