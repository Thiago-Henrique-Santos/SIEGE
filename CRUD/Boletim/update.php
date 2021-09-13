<?php

include ("../../BancoDados/conexao_mysql.php");

if (isset($_GET['qtd'])) {
    $quantidade = $_GET['qtd'];

    for ($i = 0; $i < $quantidade; $i++) {
        $getName   = "idb$i";
        $idBoletim = $_GET[$getName];

        $getName  = "n1$i";
        $nota1    = $_GET[$getName];
        $getName  = "n2$i";
        $nota2    = $_GET[$getName];
        $getName  = "n3$i";
        $nota3    = $_GET[$getName];
        $getName  = "n4$i";
        $nota4    = $_GET[$getName];

        $getName    = "f1$i";
        $faltas1    = $_GET[$getName];
        $getName    = "f2$i";
        $faltas2    = $_GET[$getName];
        $getName    = "f3$i";
        $faltas3    = $_GET[$getName];
        $getName    = "f4$i";
        $faltas4    = $_GET[$getName];
        
        $getName           = "rn$i";
        $notaRecuperacao   = $_GET[$getName];
        $getName           = "rf$i";
        $faltasRecuperacao = $_GET[$getName];
        
        $sql = "UPDATE boletim SET nota1bim = $nota1, nota2bim = $nota2, nota3bim = $nota3 , nota4bim = $nota4, 
        falta1bim = $faltas1, falta2bim = $faltas2, falta3bim = $faltas3, falta4bim = $faltas4
        WHERE id = $idBoletim";
        if ($conexao->query($sql))
            echo "<font color='lime'>Deu certo! Substituir pela mensagem de sucesso de atualização!</font> <br>";
        else
            echo $conexao->error . "<font color='red'> - Substituir por mensagem de erro.</font>";
    }
}

$conexao->close();

?>