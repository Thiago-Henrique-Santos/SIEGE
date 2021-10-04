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
    case "tudoturma":
        $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Turmas'), 0, 0, "C");
        $pdf -> Ln(2);
        $pdf -> SetFont('Arial', 'B', 14);
        $pdf -> SetTextColor(0, 0, 0);
        $pdf -> Cell(27.7, 1.5, utf8_decode('Contendo: nomes das turmas, alunos e disciplinas'), 0, 0, "L");
        $pdf -> Ln(1.5);
        break;

    case "soalunos":
        $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Turmas'), 0, 0, "C");
        $pdf -> Ln(2);
        $pdf -> SetFont('Arial', 'B', 14);
        $pdf -> SetTextColor(0, 0, 0);
        $pdf -> Cell(27.7, 1.5, utf8_decode('Contendo: nomes das turmas e alunos'), 0, 0, "L");
        $pdf -> Ln(1.5);
        break;

    case "sodisciplinas":
        $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Turmas'), 0, 0, "C");
        $pdf -> Ln(2);
        $pdf -> SetFont('Arial', 'B', 14);
        $pdf -> SetTextColor(0, 0, 0);
        $pdf -> Cell(27.7, 1.5, utf8_decode('Contendo: nomes das turmas e disciplinas'), 0, 0, "L");
        $pdf -> Ln(1.5);
        break;
    
    case "sonomes":
        $pdf -> AddPage();
        
        $pdf -> SetFont('Arial', 'BU', 20);
        $pdf -> SetTextColor(220, 50, 50);
        $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Turmas'), 0, 0, "C");
        $pdf -> Ln(2);

        $pdf -> SetTopMargin(0.5);
        $pdf -> SetLeftMargin(3.7);
        $pdf -> SetRightMargin(2);

        $pdf -> SetFont('Arial', 'B', 17);
        $pdf -> SetTextColor(0, 0, 0);
        $pdf -> Cell(27.7, 1.5, utf8_decode('Contendo: nomes das turmas'), 0, 0, "L");

        $sql = "SELECT DISTINCT serie FROM turma t WHERE t.id != 1 ORDER BY t.serie ASC";
        $resultado = $conexao->query($sql);
        $i=0;
            
            if ($resultado->num_rows > 0)
            {
                while ($linha = $resultado->fetch_assoc())
                {
                    $pdf -> SetFont('Arial', 'B', 15);
                    $pdf -> SetTextColor(235, 209, 45);
                    $pdf -> Ln(2);
                    $pdf -> Cell(27.7, 1.5, utf8_decode($linha['serie'] . "°s Anos"), 0, 0, "L");
                    $pdf -> Ln(1.2);

                    $pdf -> SetFillColor(3, 22, 133);
                    $pdf -> SetTextColor(255, 255, 255);
                    $pdf -> SetFont('Arial', 'B', 12);

                    $pdf -> Cell(7, 1.5, "Contador de turmas no total", 1, 0, "C", 1);
                    $pdf -> Cell(7, 1.5, "Contador de turmas por ano", 1, 0, "C", 1);
                    $pdf -> Cell(8, 1.5, "Nome", 1, 0, "C", 1);
                    $pdf -> Ln();

                    $sql2 = "SELECT * FROM turma t WHERE t.id != 1 AND t.serie = " . $linha['serie'] .  " ORDER BY t.serie ASC, t.nome ASC";
                        $resultado2 = $conexao->query($sql2);
                        
                        if ($resultado2->num_rows > 0)
                        {
                            $j=1;
                            $pdf -> SetFont('Arial', '', 10);
                            $pdf -> SetTextColor(0, 0, 0);
                            $pdf -> SetFillColor(255, 255, 255);
                            while ($linha2 = $resultado2->fetch_assoc())
                            {
                                $i++;
                                $pdf -> Cell(7, 1.5, $i, 1, 0, "C", 1);
                                $pdf -> Cell(7, 1.5, $j, 1, 0, "C", 1);
                                $pdf -> Cell(8, 1.5, $linha2['nome'], 1, 0, "C", 1);
                                $j++;

                                $pdf -> Ln();
                                if($j%2==0){
                                    $pdf -> SetFillColor(217, 222, 255);
                                }else{
                                    $pdf -> SetFillColor(255, 255, 255);
                                }
                            }
                        }
                }
            }	
            else
                echo "Não foram encontrados registros.";

            $pdf -> Output("I", "RelatorioNomesTurmas.pdf");
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