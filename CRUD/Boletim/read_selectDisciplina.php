<?php
include("../../BancoDados/conexao_mysql.php");

if (isset($_GET['idt'])) {
    $prepara2 = $conexao->prepare("SELECT id, nome FROM disciplina WHERE id_turma = ? ORDER BY nome ASC");
    $prepara2->bind_param("i", $_GET['idt']);
    $prepara2->execute();
    $resultado2 = $prepara2->get_result();
    $disciplinas = array();
    $i = 0;
    while ($d = $resultado2->fetch_object()) {
        $disciplinas[$i] = $d;
        $i++;
    }

    echo json_encode($disciplinas);
}
