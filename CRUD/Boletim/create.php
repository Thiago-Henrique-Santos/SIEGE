<?php

include ("../../BancoDados/conexao_mysql.php");
if (isset($_GET['ent']))
    $registeredEntity = $_GET['ent'];

if (isset($_GET['ida']))
    $id_aluno = $_GET['ida'];

if (isset($_GET['idd']))
    $id_disciplina = $_GET['idd'];

$prepara = $conexao->prepare("INSERT INTO boletim (id_aluno, id_disciplina) VALUES (?, ?)");
$prepara->bind_param("ii", $id_aluno, $id_disciplina);

if (isset($_GET['qta'])) {
    $quantidadeAlunos = $_GET['qta'];
    for ($i = 0; $i < $quantidadeAlunos; $i++) {
        $getName = "ida$i";
        $id_aluno = $_GET[$getName];
        $prepara->execute();
    }
}

if (isset($_GET['qtd'])) {
    $quantidadeDisciplinas = $_GET['qtd'];
    for ($i = 0; $i < $quantidadeDisciplinas; $i++) {
        $getName = "idd$i";
        $id_aluno = $_GET[$getName];
        $prepara->execute();
    }
}

$prepara->close();

if ($registeredEntity == "disciplina")
    header ("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=cadastrar&rcd=disciplina");
else
    header ("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=cadastrar&rcd=aluno");

$conexao->close();

?>