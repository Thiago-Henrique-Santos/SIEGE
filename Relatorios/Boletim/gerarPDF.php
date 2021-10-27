<?php

    include ("../../BancoDados/conexao_mysql.php");
    include ("../../Bibliotecas/FPDF/fpdf.php");
    include ("../../modulos/funcoes.php");

    if (!isset($_GET['opvl']) || empty($_GET['opvl'])){
        echo "Erro!";
    }

    $opvl = $_GET['opvl'];

    $pdf = new FPDF("l", "cm", "A4");

    switch ($opvl) {
        case "tudoturma": //Mudar nome
                $pdf -> AddPage();
                $pdf -> Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                $pdf -> Ln(4);

                $pdf -> SetFont('Arial', 'BU', 20);
                $pdf -> SetTextColor(220, 50, 50);
                $pdf -> Cell(27.7, 1.5, utf8_decode('Boletim'), 0, 0, "C");
                $pdf -> Ln(2);

                $pdf -> SetTopMargin(0.5);
                $pdf -> SetLeftMargin(0.4);
                $pdf -> SetRightMargin(0.4);

                $pdf -> Output("I", "Boletim.pdf");
            break;

        case "outraopcao": //Mudar nome
                $pdf -> AddPage();
                $pdf -> Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                $pdf -> Ln(4);

                $pdf -> SetFont('Arial', 'BU', 20);
                $pdf -> SetTextColor(220, 50, 50);
                $pdf -> Cell(27.7, 1.5, utf8_decode('Boletim'), 0, 0, "C");
                $pdf -> Ln(2);

                $pdf -> SetTopMargin(0.5);
                $pdf -> SetLeftMargin(0.4);
                $pdf -> SetRightMargin(0.4);

                $pdf -> Output("I", "Boletim.pdf");
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