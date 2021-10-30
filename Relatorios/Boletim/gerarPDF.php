<?php

    include ("../../BancoDados/conexao_mysql.php");
    include ("../../Bibliotecas/FPDF/fpdf.php");
    include ("../../modulos/funcoes.php");

    session_start();

    if (!isset($_GET['opvl']) || empty($_GET['opvl'])){
        echo "Erro!";
    }

    $opvl = $_GET['opvl'];

    $pdf = new FPDF("l", "cm", "A4");

    if($_SESSION['tip_usu'] == 1){
        switch ($opvl) {
            case "boletimaluno":
                    $pdf -> AddPage();
                    $pdf -> Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                    $pdf -> Ln(2.7);

                    $pdf -> SetTopMargin(0.5);
                    $pdf -> SetLeftMargin(0.3);
                    $pdf -> SetRightMargin(0.3);

                    $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, COUNT(d.id) AS 'quantDisc', d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND u.email='" . $_SESSION['campo_email'] . "'";
                    $resultado0 = $conexao->query($sql0);
                    if ($resultado0->num_rows > 0){
                        $linha0 = $resultado0->fetch_assoc();

                        $pdf -> SetFont('Arial', 'BU', 20);
                        $pdf -> SetTextColor(220, 50, 50);

                        if($linha0['sexo'] == 'F')
                            $pdf -> Cell(27.7, 1, utf8_decode('Boletim Escolar da Aluna - ' . $linha0['ano']), 0, 0, "C");
                        else
                            $pdf -> Cell(27.7, 1, utf8_decode('Boletim Escolar do Aluno - ' . $linha0['ano']), 0, 0, "C");

                        $pdf -> Ln(1.5);

                        $pdf -> SetFont('Arial', '', 8.2);
                        $pdf -> SetTextColor(0, 0, 0);
                        $pdf -> SetFillColor(255, 255, 255);

                        $pdf -> Cell(10.15, 0.8, utf8_decode('Nome: ' . $linha0['nome']), 1, 0, "L", 1);
                        $pdf -> Cell(8.8, 0.8, utf8_decode('Email: ' . $linha0['email']), 1, 0, "L", 1);
                        $pdf -> Cell(10.15, 0.8, utf8_decode('N°. de matrícula: ' . $linha0['numero_matricula']), 1, 0, "L", 1);
                        $pdf -> Ln();
                        $pdf -> Cell(10.15, 0.8, utf8_decode('Data de nascimento: ' . formata_data($linha0['nome'])), 1, 0, "L", 1);

                        if($linha0['sexo'] == 'F')
                            $linha0['sexo'] = 'Feminino';
                        else
                            $linha0['sexo'] = 'Masculino';

                        $pdf -> Cell(8.8, 0.8, utf8_decode('Sexo: ' . $linha0['sexo']), 1, 0, "L", 1);
                        $pdf -> Cell(10.15, 0.8, utf8_decode('Responsável: ' . $linha0['nome_responsavel']), 1, 0, "L", 1);
                        $pdf -> Ln();
                        $pdf -> Cell(10.15, 0.8, utf8_decode('Telefone: ' . $linha0['telefone']), 1, 0, "L", 1);

                        if($linha0['local_moradia'] == 'U')
                            $linha0['local_moradia'] = 'Urbana';
                        else
                            $linha0['local_moradia'] = 'Rural';

                        $pdf -> Cell(8.8, 0.8, utf8_decode('Zona de moradia: ' . $linha0['local_moradia']), 1, 0, "L", 1);
                        $pdf -> Cell(10.15, 0.8, utf8_decode('Quant. de disciplinas realizadas: ' . $linha0['quantDisc']), 1, 0, "L", 1);
                        $pdf -> Ln();
                        $pdf -> Cell(10.15, 0.8, utf8_decode('Turma: ' . $linha0['serie'] . '° ano ' . $linha0['nomeTurma']), 1, 0, "L", 1);

                        if($linha0['serie'] >= 6)
                            $ensino = 'Ensino Fundamental 2';
                        else
                            $ensino = 'Ensino Fundamental 1';

                        $pdf -> Cell(8.8, 0.8, utf8_decode('Nível de ensino: ' . $ensino), 1, 0, "L", 1);
                        $pdf -> Cell(10.15, 0.8, utf8_decode('Ano letivo: ' . $linha0['ano']), 1, 0, "L", 1);
                        $pdf -> Ln(4);
                    }

                    $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, turma t, disciplina d WHERE u.id=a.idAluno AND a.id_turma=t.id AND d.id_turma=t.id AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND u.email='" . $_SESSION['campo_email'] . "' ORDER BY d.nome ASC";
                
                    $resultado = $conexao->query($sql);
            
                    if ($resultado->num_rows > 0){
                         $i = 0;
                            while ($linha = $resultado->fetch_assoc())
                            {

                                $i++;
                            }
                        }

                        $pdf -> Output("I", "Boletim.pdf");
                break;

            case "erro":
                    alertaErro();
                break;

            default:
                    def();
                break;
        }
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
            echo "<img src='../../img/atencao.png' style='height: 20px; width: auto;'>";
            echo "<font style='font-size: 20px;'>".$_GET['info']."</font>";
        echo "</div>";
    }
    
?>