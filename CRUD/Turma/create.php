<?php

if(!isset($_GET['id']) || $_GET['id']==""){
    echo "Ocorreu um erro!";
}

include ("../../BancoDados/conexao_mysql.php");

$nome = $_GET['nm'];
$serie = $_GET['sr'];

if($_GET['id'] == 'turma'){

    $sql = "
    INSERT INTO turma (nome, ano) VALUES ('$nome', $serie);
    ";

    if ($conexao->query($sql) === FALSE)
        echo "Erro inserindo turma: " . $conexao->error;

    if ($conexao->query($sql) === TRUE)
        header ("Location ../../formularios-cadastro.php?id=validadoOK");
    else
        echo "Erro inserindo turma: " . $conexao->error;

}

$conexao->close();

?>