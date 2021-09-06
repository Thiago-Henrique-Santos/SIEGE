<?php

include ("../../BancoDados/conexao_mysql.php");

$id_aluno = $_GET['idtf'];
$id_disciplina = $_GET['idd'];

$prepara = $conexao->prepare("INSERT INTO boletim (id_aluno, id_disciplina) VALUES (?, ?)");
$prepara->bind_param("ii", $id_aluno, $id_disciplina);
$prepara->execute();
$prepara->close();

$conexao->close();

?>