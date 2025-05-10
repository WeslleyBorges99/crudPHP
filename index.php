<?php
    include_once("./model/usersClass.php");
    include_once("./model/conectdb.php");
    $readUsers = new User($db);
    $dataUsers = $readUsers->getAllUsers();
    unset($readUsers);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/styles/style.css">
    <title>Crud Home</title>
</head>
<body>
    <div class="divPai">
        <div class="tableDiv">
            <div class="titleDiv">
                <h1>Crud de contas</h1>
                <a class="addButton" href="./view/addForm.php">Adicionar Usuário</a>
            </div>
            <?php
            if(isset($_SESSION['modelMessage'])){
                echo "<h2>".$_SESSION['modelMessage']."</h2>";
                $_SESSION['modelMessage'] = "<h2>Banco de usuários</h2>";
            }else{
                echo "<h2>Banco de usuários</h2>";
            }
            ?>
        <table class="crudTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Nascimento</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        foreach($dataUsers as $user){
                        ?>
                        <tr>
                        <td><?php echo $user['id'] ?></td>
                        <td><?php echo $user['nome'] ?></td>
                        <td><?php echo $user['sobrenome'] ?></td>
                        <td><?php echo $user['nascimento'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td class="actionstd">
                            <a class="editButton" href="./view/updateForm.php?id=<?php echo $user['id']; ?>">
                                <img class="icon" src="./view/assets/editar-texto.png" alt="">
                            </a>
                            <a onClick = "confirm('Deseja realmente deletar este usuário?')" class="deleteButton" href="./controller/deleteUser.php?id=<?php echo $user['id']; ?>">
                                <img class="icon" src="./view/assets/botao-apagar.png" alt="">
                            </a>
                    </td>
                    </tr>
                            <?php
                        }
                    ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>