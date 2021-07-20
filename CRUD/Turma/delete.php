<?php

    if(!isset($_GET['id']) || empty($_GET['id'])){
        echo "Ocorreu um erro!";
    }

    include ("../../BancoDados/conexao_mysql.php");

    $sql = "SELECT * FROM disciplina d WHERE d.id_turma=" . $_GET['id'];
    $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0)
        {
            while ($linha = $resultado->fetch_assoc())
            {
                $sql = "DELETE FROM disciplina d WHERE disciplina.id_turma=t.id";
        
                if ($conexao->query($sql) === TRUE)
                    echo "Disciplina removida com sucesso";
                else
                    echo "Erro removendo disciplina: " . $conexao->error;
            }
        }
        else
            echo "Não foram encontradas disciplinas!";

    $conexao->close();

?>