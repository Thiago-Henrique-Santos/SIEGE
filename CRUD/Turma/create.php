<?php

include ("../../BancoDados/conexao_mysql.php");

$nome = $_GET['nm'];
$serie = $_GET['sr'];

    $sql = "
    INSERT INTO turma (nome, serie) VALUES ('$nome', $serie);
    ";

    if ($conexao->query($sql) === TRUE)
        header ("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=cadastrar");
    else
        echo "Erro inserindo turma: " . $conexao->error;

$conexao->close();

?>