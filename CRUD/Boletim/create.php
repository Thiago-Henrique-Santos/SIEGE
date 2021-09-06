<?php

include ("../../BancoDados/conexao_mysql.php");

$id_aluno = $_GET['id_aluno'];
$id_disciplina = $_GET['id_disciplina'];

$sql = "INSERT INTO boletim (id_aluno, id_disciplina) VALUES ($id_aluno, $id_disciplina)";

	if ($conexao->query($sql) === TRUE)
		echo "Linha criada com sucesso";
	else
		echo "Erro inserindo linha: " . $conexao->error;

$conexao->close();

?>