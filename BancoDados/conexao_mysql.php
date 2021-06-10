<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";

    $conexao = new mysqli ($servidor, $usuario, $senha);

    if($conexao->connect_error)
        die ("Conexão falhou: " . $conexao->connect_error);
    echo "Conexão realizada com sucesso!";

    $conexao->close();

?>