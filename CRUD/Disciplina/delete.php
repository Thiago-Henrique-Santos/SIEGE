<?php

if (!isset($_GET['id']) || empty($_GET['id']))
    echo "Ocorreu um erro!";

include ("../../BancoDados/conexao_mysql.php");

$pega_id = $_GET['id'];

//Excluindo boletins relacionados à disciplina
$prepara = $conexao->prepare("DELETE FROM boletim WHERE id_disciplina=?");
$prepara->bind_param("i", $pega_id);
if ($prepara->execute())
    echo "Boletins da disciplina removidos com sucesso!";
else
    echo "Remoção dos boletins da disciplina falhou!";

//Excluindo disciplina
$sql = "DELETE FROM disciplina WHERE id=" . $pega_id;

if ($conexao->query($sql) === TRUE)
    echo "Disciplina removida com sucesso";
else
    echo "Erro removendo disciplina: " . $conexao->error;


$conexao->close();

?>