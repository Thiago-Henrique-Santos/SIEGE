<?php

    if(!isset($_GET['id']) || empty($_GET['id'])){
        echo "Ocorreu um erro!";
    }

    include ("../../BancoDados/conexao_mysql.php");


    $sql = "SELECT * FROM turma WHERE id=" . $_GET['id'];
    $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0)
        {
            while ($linha = $resultado->fetch_assoc())
            {
                $sql = "DELETE FROM disciplina WHERE id_turma=" . $_GET['id'];
        
                if ($conexao->query($sql) === TRUE)
                    echo "<br> Disciplinas removidas com sucesso";
                else
                    echo "<br> Erro removendo disciplinas: " . $conexao->error;
            }
        }
        else
            echo "<br> Não foram encontradas disciplinas para remover!";

    $sql = "DELETE FROM turma WHERE id=" . $_GET['id'];  
    if ($conexao->query($sql) === TRUE)
        echo "<br> Turma removida com sucesso";
    else
        echo "<br> Erro removendo turma: " . $conexao->error;

    
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