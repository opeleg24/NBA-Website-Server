<?php
    echo "New-001.php";
    final class DatabaseTeams  {

    private static $instance = NULL;

    private $pdo;  //added private variable for pdo


    private function __construct() {
        try {
         
            $database = new PDO('mysql:host=localhost;dbname=mpelegco_teams','mpelegco_wp716','adCrt;Jk$cw0');
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo $e->getmessage();
            die();
        }

        $this->pdo = $database ; //saved the connection into the new variable
    }

    public static function getInstance() {
        static $instance = null;
        if (self::$instance === NULL) {
            $instance = new DatabaseTeams();
        }
        return $instance;
    }

    //added a function to get the connection itself
    function getConnection(){
        return $this->pdo;
    }
}
