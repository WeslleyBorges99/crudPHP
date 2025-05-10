<?php
    include_once('./../model/conectdb.php');
    include_once('./../model/usersClass.php');

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birth = $_POST['birth'];
    $email = $_POST['email'];

    echo "dados-> $name, $surname, $birth, $email";
    echo $_GET['id'];

    $changeDataUser = new User($db);
    $changeDataUser->setId($_GET['id']);
    $changeDataUser->updateUser($name, $surname, $birth, $email);
    $id = $changeDataUser->getId();
    header("Location: /");
?>