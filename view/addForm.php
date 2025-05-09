<?php
    session_start();
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
        <form class="form" action="./../controller/addUser.php" method="post">
            <?php
            if(isset($_SESSION['createMessage'])){
                echo "<h3>".$_SESSION['createMessage']."</h3>";
                unset($_SESSION['createMessage']);
            }
            ?>
            <h2>Crie um usuário</h2>
            <input type="text" name="name" id="" placeholder="Nome">
            <input type="text" name="surname" id="" placeholder="Sobrenome">
            <input type="date" name="birth" id="" placeholder="Nascimento">
            <input type="email" name="email" id="" placeholder="Email">
            <input type="submit" name="criarUsuario" id="">
        </form>
    </div>
</body>
</html>