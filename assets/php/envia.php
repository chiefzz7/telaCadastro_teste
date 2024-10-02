<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebe Dados</title>
</head>
<body>

<?php

    $conexao = mysqli_connect("localhost", "root", "", "bd_casdastro_teste");

    //chegar a conexão
    if (!$conexao)
    {
        echo "Não Conectado";
    }
    echo "Conectado ao banco>>>>>>>>>>>>";

    //Recuperar e verificar se já existe
    $cpf = $_POST["cpf"];
    $cpf = mysqli_real_escape_string($conexao, $cpf); //Evitar SQL INJECTION

    $sql = "SELECT cpf FROM bd_casdastro_teste.dados WHERE cpf='$cpf'";

    $retorno = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($retorno) > 0)
    {
        echo "CPF já cadastrado! <br>";
    }

    else
    {
        $cpf = $_POST['cpf'];
        $idade = $_POST['idade'];
        $nome = $_POST['nome'];

        $sql = "INSERT INTO bd_casdastro_teste.dados (cpf, idade, nome) VALUES ('$cpf', '$idade', '$nome')";
        $resultado = mysqli_query($conexao, $sql);

        echo "Usuário cadastrado com sucesso! <br>";
    }

?>
    
</body>
</html>