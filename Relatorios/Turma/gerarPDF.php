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
        $pdf -> AddPage();
        $pdf -> Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
        $pdf -> Ln(4);
        
        $pdf -> SetFont('Arial', 'BU', 20);
        $pdf -> SetTextColor(220, 50, 50);
        $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Turmas'), 0, 0, "C");
        $pdf -> Ln(2);

        $pdf -> SetTopMargin(0.5);
        $pdf -> SetLeftMargin(0.4);
        $pdf -> SetRightMargin(0.4);

        $pdf -> SetFont('Arial', 'B', 17);
        $pdf -> SetTextColor(0, 0, 0);
        $pdf -> Cell(27.7, 1.5, utf8_decode('Contendo: nomes das turmas, alunos disciplinas'), 0, 0, "L");
        $pdf -> Ln();

        $pdf -> SetFont('Arial', 'B', 12);
        $pdf -> SetTextColor(3, 22, 133);
        $pdf -> Cell(2, 1.5, utf8_decode('    *OBS.: '), 0, 0, "L");
        $pdf -> SetFont('Arial', '', 12);
        $pdf -> SetTextColor(0, 0, 0);
        $pdf -> Cell(1, 1.5, utf8_decode('Se caso alguma turma não aparecer, é porque, provavelmente, não há nenhuma disciplina e/ou aluno vinculados a esta(s).'), 0, 0, "L");

        $sql = "SELECT DISTINCT a.id_turma, d.id_turma, t.id, t.serie, t.nome FROM turma t, aluno a, disciplina d WHERE t.id != 1 AND d.id_turma=t.id AND a.id_turma=t.id ORDER BY t.serie ASC, t.nome ASC";
        $resultado = $conexao->query($sql);
        $i=0;
            
            if ($resultado->num_rows > 0)
            {
                while ($linha = $resultado->fetch_assoc())
                {
                    $i++;
                    $pdf -> SetFont('Arial', 'B', 15);
                    $pdf -> SetTextColor(0, 0, 0);
                    $pdf -> Ln(2);
                    $pdf -> Cell(1, 1.5, utf8_decode($i . "-    "), 0, 0, "L");
                    $pdf -> SetTextColor(235, 209, 45);
                    $pdf -> Cell(22.7, 1.5, utf8_decode($linha['serie'] . "° Ano " . $linha['nome']), 0, 0, "L");
                    $pdf -> Ln(1.4);

                    $pdf -> SetFont('Arial', 'B', 11.8);
                    $pdf -> SetTextColor(0, 0, 0);
                    $pdf -> Cell(1, 1.5, utf8_decode('        Alunos'), 0, 0, "L");
                    $pdf -> Ln(1.5);
                    celulasAlunos();
                    $pdf -> SetFont('Arial', 'B', 11.8);
                    $pdf -> SetTextColor(0, 0, 0);
                    $pdf -> Ln(0.5);
                    $pdf -> Cell(1, 1.5, utf8_decode('        Disciplinas'), 0, 0, "L");
                    $pdf -> Ln(1.5);
                    celulasDisciplinas();
                }
            }	
            else
                echo "Não foram encontrados registros.";

            $pdf -> Output("I", "RelatorioTurmasAlunosDisciplinas.pdf");
        break;

    case "soalunos":
        $pdf -> AddPage();
        $pdf -> Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
        $pdf -> Ln(4);
        
        $pdf -> SetFont('Arial', 'BU', 20);
        $pdf -> SetTextColor(220, 50, 50);
        $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Turmas'), 0, 0, "C");
        $pdf -> Ln(2);

        $pdf -> SetTopMargin(0.5);
        $pdf -> SetLeftMargin(0.4);
        $pdf -> SetRightMargin(0.4);

        $pdf -> SetFont('Arial', 'B', 17);
        $pdf -> SetTextColor(0, 0, 0);
        $pdf -> Cell(27.7, 1.5, utf8_decode('Contendo: nomes das turmas e alunos'), 0, 0, "L");
        $pdf -> Ln();

        $pdf -> SetFont('Arial', 'B', 12);
        $pdf -> SetTextColor(3, 22, 133);
        $pdf -> Cell(2, 1.5, utf8_decode('    *OBS.: '), 0, 0, "L");
        $pdf -> SetFont('Arial', '', 12);
        $pdf -> SetTextColor(0, 0, 0);
        $pdf -> Cell(1, 1.5, utf8_decode('Se caso alguma turma não aparecer, é porque, provavelmente, não há nenhum aluno vinculado a esta(s).'), 0, 0, "L");

        $sql = "SELECT DISTINCT a.id_turma, t.id, t.serie, t.nome FROM turma t, aluno a WHERE t.id != 1 AND a.id_turma=t.id ORDER BY t.serie ASC, t.nome ASC";
        $resultado = $conexao->query($sql);
        $i=0;
            
            if ($resultado->num_rows > 0)
            {
                while ($linha = $resultado->fetch_assoc())
                {
                    $i++;
                    $pdf -> SetFont('Arial', 'B', 15);
                    $pdf -> SetTextColor(0, 0, 0);
                    $pdf -> Ln(2);
                    $pdf -> Cell(1, 1.5, utf8_decode($i . "-    "), 0, 0, "L");
                    $pdf -> SetTextColor(235, 209, 45);
                    $pdf -> Cell(22.7, 1.5, utf8_decode($linha['serie'] . "° Ano " . $linha['nome']), 0, 0, "L");
                    $pdf -> Ln(1.4);
                    celulasAlunos();
                }
            }	
            else
                echo "Não foram encontrados registros.";

            $pdf -> Output("I", "RelatorioTurmasAlunos.pdf");
        break;

    case "sodisciplinas":
        $pdf -> AddPage();
        $pdf -> Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
        $pdf -> Ln(4);
        
        $pdf -> SetFont('Arial', 'BU', 20);
        $pdf -> SetTextColor(220, 50, 50);
        $pdf -> Cell(27.7, 1.5, utf8_decode('Relatório de Turmas'), 0, 0, "C");
        $pdf -> Ln(2);

        $pdf -> SetTopMargin(0.5);
        $pdf -> SetLeftMargin(0.4);
        $pdf -> SetRightMargin(0.4);

        $pdf -> SetFont('Arial', 'B', 17);
        $pdf -> SetTextColor(0, 0, 0);
        $pdf -> Cell(27.7, 1.5, utf8_decode('Contendo: nomes das turmas e disciplinas'), 0, 0, "L");
        $pdf -> Ln();

        $pdf -> SetFont('Arial', 'B', 12);
        $pdf -> SetTextColor(3, 22, 133);
        $pdf -> Cell(2, 1.5, utf8_decode('    *OBS.: '), 0, 0, "L");
        $pdf -> SetFont('Arial', '', 12);
        $pdf -> SetTextColor(0, 0, 0);
        $pdf -> Cell(1, 1.5, utf8_decode('Se caso alguma turma não aparecer, é porque, provavelmente, não há nenhuma disciplina vinculada a esta(s).'), 0, 0, "L");

        $sql = "SELECT DISTINCT d.id_turma, t.id, t.serie, t.nome FROM turma t, disciplina d WHERE t.id != 1 AND d.id_turma=t.id ORDER BY t.serie ASC, t.nome ASC";
        $resultado = $conexao->query($sql);
        $i=0;
            
            if ($resultado->num_rows > 0)
            {
                while ($linha = $resultado->fetch_assoc())
                {
                    $i++;
                    $pdf -> SetFont('Arial', 'B', 15);
                    $pdf -> SetTextColor(0, 0, 0);
                    $pdf -> Ln(2);
                    $pdf -> Cell(1, 1.5, utf8_decode($i . "-    "), 0, 0, "L");
                    $pdf -> SetTextColor(235, 209, 45);
                    $pdf -> Cell(22.7, 1.5, utf8_decode($linha['serie'] . "° Ano " . $linha['nome']), 0, 0, "L");
                    $pdf -> Ln(1.4);
                    celulasDisciplinas();
                }
            }
            else
                echo "Não foram encontrados registros.";

            $pdf -> Output("I", "RelatorioTurmasDisciplinas.pdf");
        break;
    
    case "sonomes":
        $pdf -> AddPage();
        $pdf -> Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
        $pdf -> Ln(4);
        
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

            $pdf -> Output("I", "RelatorioTurmas.pdf");
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

    function celulasAlunos(){
        global $pdf;
        global $conexao;
        global $resultado;
        global $linha;
        global $i;

                    $pdf -> SetFillColor(3, 22, 133);
                    $pdf -> SetTextColor(255, 255, 255);
                    $pdf -> SetFont('Arial', 'B', 12);

                    $pdf -> Cell(1, 1.5, "", 1, 0, "C", 1);
                    $pdf -> Cell(11, 1.5, "Aluno", 1, 0, "C", 1);
                    $pdf -> Cell(7, 1.5, utf8_decode("Número de matrícula"), 1, 0, "C", 1);
                    $pdf -> Cell(9.88, 1.5, "Email", 1, 0, "C", 1);
                    $pdf -> Ln();

                    $sql2 = "SELECT * FROM usuario u, aluno a WHERE u.id=a.idAluno AND a.id_turma=" . $linha['id'] . " AND " . $linha['id'] . " != 1 ORDER BY u.nome ASC";
                        $resultado2 = $conexao->query($sql2);
                        
                        if ($resultado2->num_rows > 0)
                        {
                            $j=1;
                            $pdf -> SetFont('Arial', '', 10);
                            $pdf -> SetTextColor(0, 0, 0);
                            $pdf -> SetFillColor(255, 255, 255);
                            while ($linha2 = $resultado2->fetch_assoc())
                            {
                                $pdf -> Cell(1, 1.5, $j, 1, 0, "C", 1);
                                $pdf -> Cell(11, 1.5, utf8_decode($linha2['nome']), 1, 0, "C", 1);
                                $pdf -> Cell(7, 1.5, $linha2['numero_matricula'], 1, 0, "C", 1);
                                $pdf -> Cell(9.88, 1.5, $linha2['email'], 1, 0, "C", 1);
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

    function celulasDisciplinas(){
            global $pdf;
            global $conexao;
            global $resultado;
            global $linha;
            global $i;

                    $pdf -> SetFillColor(3, 22, 133);
                    $pdf -> SetTextColor(255, 255, 255);
                    $pdf -> SetFont('Arial', 'B', 12);

                    $pdf -> Cell(0.5, 1.5, "", 1, 0, "C", 1);
                    $pdf -> Cell(7.5, 1.5, "Disciplina", 1, 0, "C", 1);
                    $pdf -> Cell(1, 1.5, "Ano", 1, 0, "C", 1);
                    $pdf -> Cell(9.7, 1.5, "Professor", 1, 0, "C", 1);
                    $pdf -> Cell(1.7, 1.5, "MASP", 1, 0, "C", 1);
                    $pdf -> Cell(8.5, 1.5, "Email", 1, 0, "C", 1);
                    $pdf -> Ln();

                    $sql2 = "
                                SELECT u.id, u.nome AS 'nome_usuario', u.email, d.id, d.nome AS 'nome_disciplina', d.ano, d.id_professor, 
                                d.id_turma, p.idProfessor, p.masp FROM usuario u, disciplina d, professor p WHERE u.id=p.idProfessor 
                                AND d.id_turma=" . $linha['id'] . " AND d.id_professor=p.idProfessor AND " . $linha['id'] . " != 1 ORDER BY d.nome ASC, u.nome ASC
                            ";
                        $resultado2 = $conexao->query($sql2);
                        
                        if ($resultado2->num_rows > 0)
                        {
                            $j=1;
                            $pdf -> SetFont('Arial', '', 10);
                            $pdf -> SetTextColor(0, 0, 0);
                            $pdf -> SetFillColor(255, 255, 255);
                            while ($linha2 = $resultado2->fetch_assoc())
                            {
                                $pdf -> Cell(0.5, 1.5, $j, 1, 0, "C", 1);
                                $pdf -> Cell(7.5, 1.5, utf8_decode($linha2['nome_disciplina']), 1, 0, "C", 1);
                                $pdf -> Cell(1, 1.5, $linha2['ano'], 1, 0, "C", 1);
                                $pdf -> Cell(9.7, 1.5, utf8_decode($linha2['nome_usuario']), 1, 0, "C", 1);
                                $pdf -> Cell(1.7, 1.5, utf8_decode($linha2['masp']), 1, 0, "C", 1);
                                $pdf -> Cell(8.5, 1.5, utf8_decode($linha2['email']), 1, 0, "C", 1);
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
            echo "<img src='../../img/atencao.png' style='height: 20px; width: auto;'>";
            echo "<font style='font-size: 20px;'>".$_GET['info']."</font>";
        echo "</div>";
    }

?>