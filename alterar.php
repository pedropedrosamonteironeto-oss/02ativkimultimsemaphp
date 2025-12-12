<?php

require("conexao.php");

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $consulta = "SELECT * FROM usuario WHERE id = $id";

    $registros = mysqli_query($conn,$consulta);

    if (mysqli_num_rows($registros) == 0) {

    }

    $dados = mysqli_fetch_assoc($registros);

} else {

    echo "ID não fornecido";

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>

<body>

    <h1>Editar Cadastro</h1>

    <form method="post" action="atualizar.php">

    ID:

    <input type="hidden" name="id" value="<?php echo $dados['nome']; ?>"><br><br>

    Ano Nascimento:

    <input type="text" name="ano" value="<?php echo $dados['ano']; ?>"><br><br>

    <input type="submit" value="atualizar">

    </form>
      
    </a>

</body>

</html>