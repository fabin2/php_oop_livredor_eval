<?php
    class Message {
        public $connect;

        const DBTABLE = "messages";

        public $email;
        public $message;

        public function __construct($db){
            $this->connect = $db;
        }

        public function createMessage(){
            $sqlQuery = "INSERT INTO " . Message::DBTABLE . " SET 
            auteur_email = :email,
            auteur_message = :message,
            auteur_time = now();";

            $res = $this->connect->prepare($sqlQuery);
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->message = htmlspecialchars(strip_tags($this->message));
            $res->bindParam(":email", $this->email);
            $res->bindParam(":message", $this->message);
            $res -> execute();
        }

        public function readTable(){
            $sqlQuery = "SELECT * FROM " . message::DBTABLE ;
            $res = $this->connect->prepare($sqlQuery);
            $res -> setFetchMode(PDO::FETCH_ASSOC);
            $res -> execute();
            $tab = $res -> fetchAll();
            return $tab;
        }
    }
?>