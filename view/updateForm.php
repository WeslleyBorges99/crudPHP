<?php
    include_once('./../model/conectdb.php');
    include_once('./../model/usersClass.php');
    
    $updateUser = new User($db);
    $updateUser->setId($_GET['id']);
    $userData = $updateUser->getUser();
    foreach($userData as $user){
        $userData = $user;
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/form.css">
</head>
<body>
    <div class="divPai">
        <div class = "returnButton"><a href="/">Voltar</a></div>
        <form class="form" action="./../controller/updateUser.php?id=<?php echo $updateUser->getId(); ?>" method="post">
            <h2>Crie um usuário</h2>
            <input type="text" name="name" id="" placeholder="Nome" value=<?php echo $userData['nome'] ?> required>
            <input type="text" name="surname" id="" placeholder="Sobrenome" value=<?php echo $userData['sobrenome'] ?> required>
            <input type="date" name="birth" id="" placeholder="Nascimento" value=<?php echo $userData['nascimento'] ?> required>
            <input type="email" name="email" id="" placeholder="Email" value=<?php echo $userData['email'] ?> required>
            <input type="submit" name="criarUsuario" id="">
        </form>
    </div>
</body>
</html>

<?php
    $db = null;
    $updateUser->closeConection();
?>