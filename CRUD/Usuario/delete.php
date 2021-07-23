<?php

if(!isset($_GET['id']) || empty($_GET['id'])){
    echo "Ocorreu um erro!";
}

include ("../../BancoDados/conexao_mysql.php");

$user = $_GET['usr'];


$sql = "SELECT * FROM  $user WHERE id=" . $_GET['id'];
    $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0)
        {
            while ($linha = $resultado->fetch_assoc())
            {
                $sql = "DELETE FROM $user WHERE id=" . $_GET['id'];
        
                if ($conexao->query($sql) === TRUE)
                    echo "<br> Disciplinas removidas com sucesso";
                else
                    echo "<br> Erro removendo disciplinas: " . $conexao->error;
            }
        }
        else
            echo "<br> Não foram encontradas disciplinas para remover!";

    $sql = "DELETE FROM usuario WHERE id=" . $_GET['id'];  
    if ($conexao->query($sql) === TRUE)
        echo "<br> Turma removida com sucesso";
    else
        echo "<br> Erro removendo turma: " . $conexao->error;

        
$conexao->close();

?>