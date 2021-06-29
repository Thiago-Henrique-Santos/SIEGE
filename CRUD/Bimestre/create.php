<?php

include ("../../BancoDados/conexao_mysql.php");

$numero = $_GET['ano'];
$dataInicio = $_GET['dti'];
$dataTermino = $_GET['dtf'];

    $sql = "
    INSERT INTO bimestre (numero, dataInicio, dataTermino) VALUES ($numero, '$dataInicio', '$dataTermino');
    ";

    if ($conexao->query($sql) === FALSE)
        echo "Erro inserindo bimestre: " . $conexao->error;

    if ($conexao->query($sql) === TRUE)
        header ("Location ../../formularios-cadastro.php?id=validadoOK");
    else
        echo "Erro inserindo bimestre: " . $conexao->error;

$conexao->close();

?>