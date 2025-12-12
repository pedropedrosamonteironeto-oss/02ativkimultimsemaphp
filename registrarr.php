<?php

// registrarr.php

require("conexao.php");


if($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST['nome']);

    $email = trim($_POST['email']);

    $senha = $_POST['senha'];


    if (!$nome || !$email || !$senha ) {

        die("preencha todos os campos.");

    }


$hash = password_hash($senha, PASSWORD_DEFAULT);


$stmt = mysqli_prepare($conn, "INSETR INTO usuarios (nome, email, senha) VALUES (?,?,?)");

mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $hash);

if (mysqli_stmt_execute($stmt)) {

    echo "Usuario criado. <a href='login.php'> Ir para login</a>";

} else {

    echo "Erro:" . mysqli_error($conn);

}

 exit;

}

?>  

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>

<body>
  
    <h3>Registrar Usuário</h3>

    <form  method="post" action="">

        Nome: <input type="text" name="nome" required><br><br>

        Email: <input type="email" name="email" required><br><br>

        Senha: <input type="password" name="senha" required><br><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>

