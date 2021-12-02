<?php

include("../../BancoDados/conexao_mysql.php");

session_start();

if ($_SESSION['tip_usu'] != 1) {

    $idTurma      = $_GET['tur'];
    $idDisciplina = $_GET['dsc'];

    $registros = array();
    $sql = "SELECT b.nota1bim AS 'nota1', b.nota2bim AS 'nota2', b.nota3bim AS 'nota3', b.nota4bim AS 'nota4', 
        b.falta1bim AS 'falta1', b.falta2bim AS 'falta2', b.falta3bim AS 'falta3', b.falta4bim AS 'falta4', 
        b.notaRecuperacao AS 'nota_r', b.faltaRecuperacao AS 'falta_r', b.id AS 'id_boletim', u.nome AS 'aluno' FROM boletim b INNER JOIN usuario u ON b.id_aluno = u.id INNER JOIN aluno a ON a.idAluno = u.id 
        WHERE b.id_disciplina = $idDisciplina AND a.id_turma = $idTurma ORDER BY u.nome ASC";
    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0) {
        $i = 0;
        while ($dados = $resultado->fetch_assoc()) {
            $notas  = array(
                1 => $dados['nota1'],
                2 => $dados['nota2'],
                3 => $dados['nota3'],
                4 => $dados['nota4'],
                5 => $dados['nota_r']
            );
            $faltas = array(
                1 => $dados['falta1'],
                2 => $dados['falta2'],
                3 => $dados['falta3'],
                4 => $dados['falta4'],
                5 => $dados['falta_r']
            );
            $aluno   = $dados['aluno'];
            $boletim = $dados['id_boletim'];

            $registros[$i]['id_boletim'] = $boletim;
            $registros[$i]['aluno'] = $aluno;
            for ($j = 1; $j < 6; $j++) {
                $registros[$i]['notas'][$j] = $notas[$j];
                $registros[$i]['faltas'][$j] = $faltas[$j];
            }
            $i++;
        }
    } else {
        $registros = false;
    }

    echo json_encode($registros);
} else {
    $email = $_SESSION['campo_email'];
    $registros = array();
    $sql = "SELECT DISTINCT d.nome AS 'disciplina', d.id AS 'idDisc', b.nota1bim AS 'nota1', b.nota2bim AS 'nota2', b.nota3bim AS 'nota3', b.nota4bim AS 'nota4', 
            b.falta1bim AS 'falta1', b.falta2bim AS 'falta2', b.falta3bim AS 'falta3', b.falta4bim AS 'falta4', 
            b.notaRecuperacao AS 'nota_r', b.faltaRecuperacao AS 'falta_r'
            FROM disciplina d, aluno a, usuario u, turma t, boletim b 
            WHERE u.id=a.idAluno AND a.id_turma=t.id AND d.id_turma=t.id AND d.id=b.id_disciplina AND b.id_aluno=a.idAluno AND u.email='" . $email . "' ORDER BY d.nome ASC
            ";
            $resultado = $conexao->query($sql);
            if ($resultado->num_rows > 0) {
                $i = 0;
                while ($dados = $resultado->fetch_assoc()) {
                    $notas  = array(
                        1 => $dados['nota1'],
                        2 => $dados['nota2'],
                        3 => $dados['nota3'],
                        4 => $dados['nota4'],
                        5 => $dados['nota_r']
                    );
                    $faltas = array(
                        1 => $dados['falta1'],
                        2 => $dados['falta2'],
                        3 => $dados['falta3'],
                        4 => $dados['falta4'],
                        5 => $dados['falta_r']
                    );
                    $disciplina   = $dados['disciplina'];
                   
                    $registros[$i]['disciplina'] = $disciplina;
                    for ($j = 1; $j < 6; $j++) {
                        $registros[$i]['notas'][$j] = $notas[$j];
                        $registros[$i]['faltas'][$j] = $faltas[$j];
                    }
                    $i++;
                }
            } else {
                $registros = false;
            }
        
            echo json_encode($registros);

}

$conexao->close();
