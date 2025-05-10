<?php
    include("./../model/conectdb.php");
    include_once("./../model/usersClass.php");

    $dropUser = new User($db);
    $dropUser->setId($_GET['id']);
    $dropUser->deleteUser();
    header('Location: /');
    $db = null;
    $dropUser->closeConection();
?>