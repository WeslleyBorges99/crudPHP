<?php
    session_start();

    class User{
        private $id;
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getAllUsers() {
            $selectCommand = "SELECT * FROM users";
            $users = $this->db->query($selectCommand);
            return $users;
        }

        public function createUser($name, $surname, $birth, $email) {
            $insertCommand = "INSERT INTO users VALUES(default, ?, ?, ?, ?)";
            $commandExec = $this->db->prepare($insertCommand);
            $commandExec->bindValue(1, $name);
            $commandExec->bindValue(2, $surname);
            $commandExec->bindValue(3, $birth);
            $commandExec->bindValue(4, $email);
            try{
                if($commandExec->execute()){
                    $_SESSION['createMessage'] = "Usuário criado com sucesso";
                }else{
                    $_SESSION['createMessage'] = "Falha ao tentar criar o usuário";
                }
                header('Location: ./../view/addForm.php');
            }catch(Exception $e){
                echo "Erro ao tentar criar usuário de email $email: $e";
            }
        }
    }
?>