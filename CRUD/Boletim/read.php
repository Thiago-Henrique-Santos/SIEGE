<?php

include ("../../BancoDados/conexao_mysql.php");

$idTurma      = $_GET['tur'];
$idDisciplina = $_GET['dsc'];

$registros = array();
$sql = "SELECT b.nota1bim AS 'nota1', b.nota2bim AS 'nota2', b.nota3bim AS 'nota3', b.nota4bim AS 'nota4', 
        b.falta1bim AS 'falta1', b.falta2bim AS 'falta2', b.falta3bim AS 'falta3', b.falta4bim AS 'falta4', 
        b.id AS 'id_boletim', u.nome AS 'aluno' FROM boletim b INNER JOIN usuario u ON b.id_aluno = u.id INNER JOIN aluno a ON a.idAluno = u.id 
        WHERE b.id_disciplina = $idDisciplina AND a.id_turma = $idTurma";
$resultado = $conexao->query($sql);
if ($resultado->num_rows > 0) {
    $i = 0;
    while ($dados = $resultado->fetch_assoc()) {
        $notas  = array(
            1 => $dados['nota1'],
            2 => $dados['nota2'],
            3 => $dados['nota3'],
            4 => $dados['nota4']
        );
        $faltas = array(
            1 => $dados['falta1'],
            2 => $dados['falta2'],
            3 => $dados['falta3'],
            4 => $dados['falta4']
        );
        $aluno   = $dados['aluno'];
        $boletim = $dados['id_boletim'];

        $registros[$i]['id_boletim'] = $boletim;
        $registros[$i]['aluno'] = $aluno;
        for ($j=1; $j < 5; $j++) { 
            $registros[$i]['notas'][$j] = $notas[$j];
            $registros[$i]['faltas'][$j] = $faltas[$j];
        }
        $i++;
    }
}

echo json_encode($registros);

$conexao->close();

?>