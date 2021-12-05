<?php

include ("../../BancoDados/conexao_mysql.php");

$id = $_GET['idtf'];

$sql = "UPDATE aluno SET id_turma = 1 WHERE idAluno=$id";
if ($conexao->query($sql) === TRUE)
    echo "Aluno desvinculado com sucesso!";
else
    echo "Erro ao desvincular aluno: " . $conexao->error;

$conexao->close();

?>