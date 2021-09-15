<?php

include ("../../BancoDados/conexao_mysql.php");

if (isset($_GET['qtd'])) {
    $quantidade = $_GET['qtd'];

    $nota1 = 0; $faltas1 = 0;
    $nota2 = 0; $faltas2 = 0;
    $nota3 = 0; $faltas3 = 0;
    $nota4 = 0; $faltas4 = 0;
    $notaRecuperacao   = 0;
    $faltasRecuperacao = 0;
    $idBoletim         = 0;

    $preparaSQL = "UPDATE boletim SET nota1bim = ?, nota2bim = ?, nota3bim = ?, nota4bim = ?, notaRecuperacao = ?, 
    falta1bim = ?, falta2bim = ?, falta3bim = ?, falta4bim = ?, faltaRecuperacao = ? WHERE id = ?";
    $prepara = $conexao->prepare($preparaSQL);
    $prepara->bind_param("dddddiiiiii", $nota1, $nota2, $nota3, $nota4, $notaRecuperacao, $faltas1, $faltas2, $faltas3, $faltas4, $faltasRecuperacao, $idBoletim);
    
    for ($i = 0; $i < $quantidade; $i++) {
        $getName = "idb$i";
        $idBoletim = $_GET[$getName];

        $getName = "n1$i";
        if (!empty($_GET[$getName]))
            $nota1 = $_GET[$getName];
        else
            $nota1 = NULL;

        $getName = "n2$i";
        if (!empty($_GET[$getName]))
            $nota2 = $_GET[$getName];
        else
            $nota2 = NULL;

        $getName = "n3$i";
        if (!empty($_GET[$getName]))
            $nota3 = $_GET[$getName];
        else
            $nota3 = NULL;

        $getName = "n4$i";
        if (!empty($_GET[$getName]))
            $nota4 = $_GET[$getName];
        else
            $nota4 = NULL;

        $getName = "f1$i";
        if (!empty($_GET[$getName]))
            $faltas1    = $_GET[$getName];
        else
            $faltas1 = NULL;

        $getName = "f2$i";
        if (!empty($_GET[$getName]))
            $faltas2    = $_GET[$getName];
        else
            $faltas2 = NULL;

        $getName = "f3$i";
        if (!empty($_GET[$getName]))
            $faltas3 = $_GET[$getName];
        else
            $faltas3 = NULL;

        $getName = "f4$i";
        if (!empty($_GET[$getName]))
            $faltas4 = $_GET[$getName];
        else
            $faltas4 = NULL;
        
        $getName = "rn$i";
        if (!empty($_GET[$getName]))
            $notaRecuperacao = $_GET[$getName];
        else
            $notaRecuperacao = NULL;

        $getName = "rf$i";
        if (!empty($_GET[$getName]))
            $faltasRecuperacao = $_GET[$getName];
        else
            $faltasRecuperacao = NULL;
            
        if ($prepara->execute())
            echo "Update de boletim realizado com sucesso!";
        else
            echo "Update de boletim falhou!";
    }
}

$conexao->close();

?>