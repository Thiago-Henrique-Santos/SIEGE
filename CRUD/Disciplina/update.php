<?php

include ("../../BancoDados/conexao_mysql.php");

$sql = "UPDATE disciplina SET nome = '$disciplina', id_professor = $id_professor WHERE id=$id";
if ($conexao->query($sql) === TRUE)
    header("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=atualizar");
else
    header("location: ../../formularios-cadastro.php?id=erro&tfm=atualizar&info=" . $conexao->error);

$conexao->close();

?>