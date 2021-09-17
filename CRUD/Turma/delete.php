<?php

if (!isset($_GET['id']) || empty($_GET['id']))
    echo "Ocorreu um erro!";

include ("../../BancoDados/conexao_mysql.php");

$idTurma = $_GET['id'];

//Excluindo boletins relacionados à esta turma
$sql = "SELECT a.idAluno, d.id AS 'idDisciplina' FROM disciplina d 
        INNER JOIN aluno a ON a.id_turma = $idTurma INNER JOIN boletim b WHERE a.idAluno = b.id_aluno AND d.id = b.id_disciplina";
$resultado = $conexao->query($sql);
if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        $idAluno      = $linha['idAluno'];
        $idDisciplina = $linha['idDisciplina'];
        $prepara = $conexao->prepare("DELETE FROM boletim WHERE id_aluno = ? AND id_disciplina = ?");
        $prepara->bind_param("ii", $idAluno, $idDisciplina);
        if ($prepara->execute())
            echo "Boletins da turma removidos com sucesso!";
        else
            echo "Remoção dos turma da disciplina falhou!";
    }
}

//Excluindo disciplinas relacionadas à turma
$sql = "DELETE FROM disciplina WHERE id_turma=" . $idTurma;
if ($conexao->query($sql) === TRUE)
    echo "<br> Disciplinas removidas com sucesso";
else
    echo "<br> Erro removendo disciplinas: " . $conexao->error;

//Excluindo a turma
$sql = "DELETE FROM turma WHERE id=" . $idTurma;
if ($conexao->query($sql) === TRUE)
    echo "<br> Turma removida com sucesso";
else
    echo "<br> Erro removendo turma: " . $conexao->error;

//Colocando alunos sem turma (turma com id=1)
$sql = "SELECT id_turma FROM aluno";
$resultado = $conexao->query($sql);
if ($resultado->num_rows > 0)
{
    while ($linha = $resultado->fetch_assoc())
    {
        $sql = "UPDATE aluno SET id_turma = 1 WHERE aluno.id_turma IS NULL";

        if ($conexao->query($sql) === TRUE)
            echo "<br> Aluno(s) movido(s) para a turma 1 (default) com sucesso";
        else
            echo "<br> Erro movendo alunos para a turma 1 (default): " . $conexao->error;
    }
}
else
    echo "<br> Não foram encontrados alunos para trocar o id_turma de NULL para 1.";

$conexao->close();

?>