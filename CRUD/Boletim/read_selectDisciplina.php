<?php
include("../../BancoDados/conexao_mysql.php");

session_start();
$email = $_SESSION['campo_email'];

if ($_SESSION['tip_usu'] == 3) {
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
} elseif ($_SESSION['tip_usu'] == 2) {
    if (isset($_GET['idt'])) {
        $prepara2 = $conexao->prepare("SELECT d.id, d.nome FROM disciplina d, usuario u WHERE d.id_turma = ? AND d.id_professor = u.id AND u.email = ? ORDER BY d.nome ASC");
        $prepara2->bind_param("is", $_GET['idt'], $email);
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
}
