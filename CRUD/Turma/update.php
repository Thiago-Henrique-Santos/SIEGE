<?php

include ("../../BancoDados/conexao_mysql.php");

$id    = $_GET['idtf'];
$nome  = $_GET['nm'];
$serie = $_GET['sr'];
$sql = "UPDATE turma SET nome = '$nome', serie = $serie WHERE id = $id";
if ($conexao->query($sql)) {
    print("Tudo certo!");
} else {
    echo "Erro ao atualizar disciplina: " . $conexao->error;
}

if (isset($_GET['quant'])) {
    $quantidade = $_GET['quant'];
    for ($i = 0; $i < $quantidade; $i++) {
        $getName = "didtf$i";
        $disciplina_id = $_GET[$getName];
        $getName = "dsc$i";
        $disciplina_nome = $_GET[$getName];
        $getName = "prf$i";
        $disciplina_professor = $_GET[$getName];
        $sql = "UPDATE disciplina SET nome = '$disciplina_nome', id_professor = $disciplina_professor WHERE id = $disciplina_id";
        if ($conexao->query($sql)) {
            print("Tudo certo!");
        } else {
            echo "Erro ao atualizar disciplina: " . $conexao->error;
        }
    }
}

// header("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=atualizar");

$conexao->close();

?>