<?php
    include("./../model/conectdb.php");
    include_once("./../model/usersClass.php");

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birth = $_POST['birth'];
    $email = $_POST['email'];

    $createUser = new User($db);
    $createUser->createUser($name, $surname, $birth, $email);
    $db = null;

?>