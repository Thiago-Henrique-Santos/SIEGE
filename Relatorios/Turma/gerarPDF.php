<?php

    include ("../../BancoDados/conexao_mysql.php");
    include ("../../Bibliotecas/FPDF/fpdf.php");
    include ("../../modulos/funcoes.php");

    if (!isset($_GET['opvl']) || empty($_GET['opvl'])){
        echo "Erro!";
    }

    $opvl = $_GET['opvl'];

    $pdf = new FPDF("l", "cm", "A4");
    $pdf -> SetTopMargin(0.5);
    $pdf -> SetLeftMargin(0.5);
    $pdf -> SetRightMargin(0.5);
    $pdf -> AddPage();
    
    $pdf -> SetFont('Arial', 'BU', 20);
    $pdf -> SetTextColor(220, 50, 50);

    switch ($opvl) {
    case "tudoturma":
        //código
        break;

    case "soalunos":
        //código
        break;

    case "sodisciplinas":
        //código
        break;
    
    case "sonomes":
        //código
        break;

    case "erro":
        alertaErro();
        break;
    default:
        def();
        break;
}

    /*******
    Funções
    *******/

    function def() {
        echo "<div style='width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;'>";
            echo "<h1 style='font-family: Arial, Helvetica, Calibri; font-size: 55px; font-weight: bold; color: gray;'>SIEGE</h1>";
        echo "</div>";
    }

    function alertaErro () {
        echo "<h1 align='center'>Ocorreu um erro inesperado!</h1>";
        echo "<br>";
        echo "<center>";
            echo "<img src='../../img/erro.gif' style='margin-bottom: 10px; width: 350px; height: auto;'>";
        echo "<br><br>";
        echo "<div id='mostra erro' style='width:100%; display: flex; justify-content: center; align-items: center;'>";
            echo "<img src='img/atencao.png' style='height: 20px; width: auto;'>";
            echo "<font style='font-size: 20px;'>".$_GET['info']."</font>";
        echo "</div>";
    }

?>