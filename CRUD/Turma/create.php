<?php

include ("../../BancoDados/conexao_mysql.php");

$nome = $_GET['nm'];
$serie = $_GET['sr'];

    $sql = "
    INSERT INTO turma (nome, ano) VALUES ('$nome', $serie);
    ";

    if ($conexao->query($sql) === TRUE)
        header ("Location ../../formularios-cadastro.php?id=validadoOK");
    else
        echo "Erro inserindo turma: " . $conexao->error;

$conexao->close();

?>