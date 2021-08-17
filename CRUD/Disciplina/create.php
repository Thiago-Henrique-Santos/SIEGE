<?php

include ("../../BancoDados/conexao_mysql.php");

$nome = $_GET['nm'];
$ano = $_GET['ano'];
$professor = $_GET['prf'];
$turmas = $_GET['tur'];
$idTurma = 0;

    $prepara = $conexao->prepare("INSERT INTO disciplina (nome, ano, id_professor, id_turma) VALUES(?, ?, ?, ?)");
    $prepara->bind_param("sdii", $nome, $ano, $professor, $idTurma);

    foreach($turmas as $id_turma){
        $idTurma = $id_turma;
        $prepara->execute();
    }

    $prepara->close();
    header ("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=cadastrar&rcd=disciplina");

$conexao->close();

?>