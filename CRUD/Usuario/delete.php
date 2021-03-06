<?php

if(!isset($_GET['id']) || empty($_GET['id'])){
    echo "Ocorreu um erro!";
}

include ("../../BancoDados/conexao_mysql.php");

$user = $_GET['usr'];
$id = $_GET['id'];


if($user == 'aluno'){
    //Excluindo boletins do aluno
    $prepara = $conexao->prepare("DELETE FROM boletim WHERE id_aluno=?");
    $prepara->bind_param("i", $id);
    if ($prepara->execute())
        echo "<br> Boletins removidos com sucesso!";
    else
        echo "<br> Remoção de boletins falhou!";

    //Excluindo o aluno
    $sql = "SELECT * FROM aluno WHERE idAluno=" . $id;
    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0)
    {
        while ($linha = $resultado->fetch_assoc())
        {
            $sql = "DELETE FROM aluno WHERE idAluno=" . $id;
    
            if ($conexao->query($sql) === TRUE)
                echo "<br> Aluno removido com sucesso";
            else
                echo "<br> Erro removendo aluno: " . $conexao->error;
        }
    }
    else
        echo "<br> Não foram encontrados alunos para remover!";
}elseif($user == 'professor'){
    $sql = "SELECT * FROM  professor WHERE idProfessor=" . $id;
    $resultado = $conexao->query($sql);
        
    if ($resultado->num_rows > 0)
    {
        while ($linha = $resultado->fetch_assoc())
        {
            $sql = "DELETE FROM professor WHERE idProfessor=" . $id;
    
            if ($conexao->query($sql) === TRUE)
                echo "<br> Professor removido com sucesso";
            else
                echo "<br> Erro removendo professor: " . $conexao->error;
        }
    }
    else
        echo "<br> Não foi encontrado o professor para remover!";

    
    $sql = "SELECT id_professor FROM disciplina";
    $resultado = $conexao->query($sql);
        
    if ($resultado->num_rows > 0)
    {
        while ($linha = $resultado->fetch_assoc())
        {
            $sql = "UPDATE disciplina SET id_professor = 1 WHERE disciplina.id_professor IS NULL";

            if ($conexao->query($sql) === TRUE)
                echo "<br> Disciplina(s) vinculada(s) com o professor(a) 1 (default) com sucesso";
            else
                echo "<br> Erro vinculando disiciplina(s) com o professor(a) 1 (default): " . $conexao->error;
        }
    }
    else
        echo "<br> Não foram encontradas disciplinas para trocar o id_professor de NULL para 1.";

}else{
    $sql = "SELECT * FROM gerenciadores WHERE idGerenciador=" . $id;
    $resultado = $conexao->query($sql);
        
    if ($resultado->num_rows > 0)
    {
        while ($linha = $resultado->fetch_assoc())
        {
            $sql = "DELETE FROM gerenciadores WHERE idGerenciador=" . $id;
    
            if ($conexao->query($sql) === TRUE)
                echo "<br> Gerenciador removido com sucesso";
            else
                echo "<br> Erro removendo gerenciador: " . $conexao->error;
        }
    }
    else
        echo "<br> Não foram encontrados gerenciadores para remover!";
}

$sql = "DELETE FROM usuario WHERE id=" . $id;  
if ($conexao->query($sql) === TRUE)
    echo "<br> Usuário removido com sucesso";
else
    echo "<br> Erro removendo usuário: " . $conexao->error;

$conexao->close();

?>