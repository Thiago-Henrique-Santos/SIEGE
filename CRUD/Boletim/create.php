<?php

include ("../../BancoDados/conexao_mysql.php");

$registeredEntity = $_GET['ent'];
$id_aluno         = $_GET['ida'];
$id_disciplina    = $_GET['idd'];

$prepara = $conexao->prepare("INSERT INTO boletim (id_aluno, id_disciplina) VALUES (?, ?)");
$prepara->bind_param("ii", $id_aluno, $id_disciplina);
$prepara->execute();
$prepara->close();

if ($registeredEntity == "disciplina")
    header ("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=cadastrar&rcd=disciplina");
else
    header ("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=cadastrar&rcd=aluno");

$conexao->close();

?>