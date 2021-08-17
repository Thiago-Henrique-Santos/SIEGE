<?php

include ("../../BancoDados/conexao_mysql.php");

$id = $_GET['idtf'];
$disciplina = $_GET['nm'];
$id_professor = $_GET['prf'];

echo $id_professor;

$sql = "UPDATE disciplina SET nome = '$disciplina', id_professor = $id_professor WHERE id=$id";
if ($conexao->query($sql) === TRUE)
    header("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=atualizar");
else
    header("location: ../../formularios-cadastro.php?id=erro&tfm=atualizar&info=" . $conexao->error);

$conexao->close();

?>