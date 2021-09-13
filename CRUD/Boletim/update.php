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

        // $sql = "UPDATE boletim SET nota1bim = $nota1, nota2bim = $nota2, nota3bim = $nota3 WHERE id = 1";
        // Continuar daqui
    }
}

$conexao->close();

?>