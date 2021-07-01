<?php

include ("../../BancoDados/conexao_mysql.php");

$nome      = $_GET['nm'];
$ano       = $_GET['ano'];
$professor = $_GET['prf'];
$turmas    = $_GET['tur'];
var_dump($turmas);

$conexao->close();

?>