<?php
    try{
        $db = new PDO("mysql:host=127.0.0.1;port=3306;dbname=phpCrud;", "root", "123");
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }catch(Exception $e){
        echo "Erro ao se conectar com o banco: $e";
    }
?>