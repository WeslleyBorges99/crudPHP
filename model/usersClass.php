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

        public function closeConection() {
            $this->db = null;
        }

        public function getAllUsers() {
            $selectCommand = "SELECT * FROM users";
            $users = $this->db->query($selectCommand);
            return $users;
        }

        public function getUser() {
            $selectCommand = "SELECT * FROM users WHERE id=".$this->id;
            $user = $this->db->query($selectCommand);
            return $user;
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

        public function deleteUser() {
            $deleteCommand = "DELETE FROM users WHERE id=?";
            $commandExec = $this->db->prepare($deleteCommand);
            $commandExec->bindParam(1, $this->id);
            try{
                if($commandExec->execute()) {
                    $_SESSION['modelMessage'] = "Usuário de id = ".$this->id." foi deletado com sucesso";
                }else{
                    $_SESSION['modelMessage'] = "Não foi possivel deletar o usuário de id = ".$this->id;
                }
            }catch(Exception $e){
                echo "Erro ao tentar deletar usuário: $e";
            }
        }

        public function updateUser($name, $surname, $birth, $email) {
            $updateCommand = "UPDATE users SET nome=?, sobrenome=?, nascimento=?, email=? WHERE id=?";
            $commandExec = $this->db->prepare($updateCommand);
            $commandExec->bindParam(1, $name);
            $commandExec->bindParam(2, $surname);
            $commandExec->bindParam(3, $birth);
            $commandExec->bindParam(4, $email);
            $commandExec->bindParam(5, $this->id);
            try{
                if($commandExec->execute()) {
                    $_SESSION['modelMessage'] = "Dados de usuário atualizados";
                }else{
                    $_SESSION['modelMessage'] = "Não foi possivel atualizar os dados do usuário";
                }
            }catch(Exception $e){
                echo "Erro ao tentar atualizar os dados do usuário de id = ".$this->id." -> $e";
            }
        }
    }
?>