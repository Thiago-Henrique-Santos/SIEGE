<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";

    $conexao = new mysqli ($servidor, $usuario, $senha);

    if($conexao->connect_error)
        die ("Conexão falhou: " . $conexao->connect_error);

    $sql = "DROP DATABASE siege";
    if($conexao->query($sql) === TRUE)
        echo "Banco de dados SIEGE excluido com sucesso!";
    else    
        echo "Erro excluindo o banco de dados SIEGE: " . $conexao->error;

    $conexao->close();
?>