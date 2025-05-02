<?php
    try{
        $db = new mysqli("127.0.0.1", "root", "123", "phpCrud", "33060");
    }catch(Exception $e){
        echo "Erro ao se conectar com o banco: $e";
    }
?>