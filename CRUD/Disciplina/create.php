<?php

include ("../../BancoDados/conexao_mysql.php");

$nome = $_GET['nm'];
$ano = $_GET['ano'];
$professor = $_GET['prf'];
$turmas = $_GET['tur'];
$idTurma = 0;

$prepara = $conexao->prepare("INSERT INTO disciplina (nome, ano, id_professor, id_turma) VALUES(?, ?, ?, ?)");
$prepara->bind_param("sdii", $nome, $ano, $professor, $idTurma);

$idsAlunos = array();
$quantidadeAlunos = 0;
foreach($turmas as $id_turma){
    $idTurma = $id_turma;
    $prepara->execute();
    
    $sql       = "SELECT idAluno FROM aluno WHERE id_turma = $idTurma";
    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0) {
        while ($dados = $resultado->fetch_assoc()) {
            $idAluno      = $dados['idAluno'];
            array_push($idsAlunos, $idAluno);
            $quantidadeAlunos++;
        }
    }
}

$prepara->close();

$idDisciplina = 0;
$sql          = "SELECT id FROM disciplina WHERE nome = '$nome' AND ano = $ano AND id_turma = $idTurma";
$resultado2   = $conexao->query($sql);
if ($resultado2->num_rows > 0) {
    while ($dados2 = $resultado2->fetch_assoc()) {
        $idDisciplina = $dados2['id'];
    }
}

$headerLink = "Location: ../Boletim/create.php?ent=disciplina&idd=$idDisciplina&qta=$quantidadeAlunos";
for ($i=0; $i < $quantidadeAlunos; $i++) {
    $headerLink .= "&ida$i=$idsAlunos[$i]";
}
header ($headerLink);

$conexao->close();

?>