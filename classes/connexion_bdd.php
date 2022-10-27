<?php
    class DatabaseHandler {
        const DBURL = 'localhost';
        const DBNAME = 'livre-dor';
        private $username = 'dev';
        private $password = '123';
        public $connection;
        
        public function connectionToDatabase(){
            $this-> connection = null;
            try{
                $this->connection = new PDO("mysql:host=".DatabaseHandler::DBURL."; dbname=".DatabaseHandler::DBNAME, $this->username, $this->password);
                $this->connection -> exec("set names utf8");
                echo("Connexion succès");
            }catch(PDOException $exception){

            }
            return $this->connection;
        }
    }
?>