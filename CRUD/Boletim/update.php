<?php

include ("../../BancoDados/conexao_mysql.php");

$idTurma      = $_GET['tur'];
$idDisciplina = $_GET['dsc'];

        $sql2 = " UPDATE boletim SET id = $dados['id_boletim'], 
                  nota1bim = $dados['nota1'], nota2bim = $dados['nota2'], nota3bim = $dados['nota3'], nota4bim = $dados['nota4'],  
                  falta1bim = $dados['falta1'], falta2bim = $dados['falta2'], falta3bim = $dados['falta3'], falta4bim = $dados['falta4'] 
                  WHERE id=$id AND id_disciplina = $idDisciplina AND id_turma = $idTurma";
                  
        if ($conexao->query($sql2) === TRUE)
            header("Location: ../../formularios-cadastro.php?id=validadoOK&tfm=atualizar");
        else
            header("location: ../../formularios-cadastro.php?id=erro&tfm=atualizar&info=" . $conexao->error);

$conexao->close();

?>