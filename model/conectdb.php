<?php
    try{
        $db = new PDO("mysql:host=127.0.0.1;port=33060;dbname=phpCrud;", "root", "123");
    }catch(Exception $e){
        echo "Erro ao se conectar com o banco: $e";
    }
?>