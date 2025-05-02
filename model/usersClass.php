<?php
    require("./conectdb.php");

    class Users{
        private $id;
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function createUser($name, $surname, $birth, $email){
            $dbName = $this->db->real_escape_string($name);
            $dbSurname = $this->db->real_escape_string($surname);
            $dbBirth = $this->db->real_escape_string($birth);
            $dbEmail = $this->db->real_escape_string($email);

            $command = "INSERT INTO users VALUES(default, '$dbName', '$dbSurname', '$dbBirth', '$dbEmail')";
            $this->db->query($command);
        }
    }
?>