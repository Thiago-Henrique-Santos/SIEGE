<?php

include("../../BancoDados/conexao_mysql.php");
include("../../Bibliotecas/FPDF/fpdf.php");
include("../../modulos/funcoes.php");

session_start();

if (!isset($_GET['opvl']) || empty($_GET['opvl'])) {
    echo "Erro!";
}

$opvl = $_GET['opvl'];

if ($_SESSION['tip_usu'] == 1) {
    switch ($opvl) {
        case "boletimaluno":
            $pdf = new FPDF("l", "cm", "A4");
            $pdf->AddPage();
            $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
            $pdf->Ln(3);

            $pdf->SetTopMargin(0.5);
            $pdf->SetLeftMargin(0.3);
            $pdf->SetRightMargin(0.3);

            $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND u.email='" . $_SESSION['campo_email'] . "'";
            $resultado0 = $conexao->query($sql0);
            if ($resultado0->num_rows > 0) {
                $linha0 = $resultado0->fetch_assoc();
                dadosAluno();
            }

            $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND u.email='" . $_SESSION['campo_email'] . "' ORDER BY d.nome ASC";

            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    tabelaNotas();
                }
            }

            $pdf->Output("I", "Boletim.pdf");
            break;

        case "erro":
            alertaErro();
            break;

        default:
            def();
            break;
    }
} elseif ($_SESSION['tip_usu'] == 2) {
    if ($opvl == 'todasTurmasLecionadas') {
        $pdf = new FPDF("l", "cm", "A4");
        $sqlt = "SELECT t.id FROM turma t, usuario u, professor p, disciplina d WHERE u.id=p.idProfessor AND d.id_turma=t.id AND d.id_professor=p.idProfessor AND u.email='" . $_SESSION['campo_email'] . "' ORDER BY t.serie ASC, t.nome ASC";
        $resultadot = $conexao->query($sqlt);
        if ($resultadot->num_rows > 0) {
            while ($linhat = $resultadot->fetch_assoc()) {
                $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND a.id_turma=" . $linhat['id'] . " ORDER BY u.nome ASC";
                $resultado0 = $conexao->query($sql0);
                if ($resultado0->num_rows > 0) {
                    while ($linha0 = $resultado0->fetch_assoc()) {
                        $pdf->AddPage();
                        $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                        $pdf->Ln(3);

                        $pdf->SetTopMargin(0.5);
                        $pdf->SetLeftMargin(0.3);
                        $pdf->SetRightMargin(0.3);
                        dadosAluno();

                        $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND a.idAluno=" . $linha0['idAluno'] . " ORDER BY d.nome ASC";

                        $resultado = $conexao->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                tabelaNotas();
                            }
                        }
                    }
                }
            }
            $pdf->Output("I", "BoletimTurmasLecionadas.pdf");
        }
    } elseif ($opvl == "erro") {
        alertaErro();
    } else {
        $sqlcont = "SELECT COUNT(a.idAluno) AS 'contadorAlunos' FROM aluno a, turma t WHERE t.id=a.id_turma AND t.id=" . $opvl;
        $resultadocont = $conexao->query($sqlcont);
        if ($resultadocont->num_rows > 0) {
            $linhacont = $resultadocont->fetch_assoc();
            if ($linhacont['contadorAlunos'] == 0) {
                echo "
                        <script> 
                            alert('Não há nenhum aluno nesta turma, logo, não é possível gerar os boletins dessa turma!');
                            alert('Você será redirecionado para a página \"boletim\".');
                            window.location.href = '../../boletim.php';
                        </script>
                    ";
            } else {
                $pdf = new FPDF("l", "cm", "A4");
                $nomeArquivo = "";
                $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND a.id_turma=" . $opvl . " ORDER BY u.nome ASC";
                $resultado0 = $conexao->query($sql0);
                if ($resultado0->num_rows > 0) {
                    while ($linha0 = $resultado0->fetch_assoc()) {
                        $pdf->AddPage();
                        $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                        $pdf->Ln(3);

                        $pdf->SetTopMargin(0.5);
                        $pdf->SetLeftMargin(0.3);
                        $pdf->SetRightMargin(0.3);
                        dadosAluno();

                        $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND a.idAluno=" . $linha0['idAluno'] . " ORDER BY d.nome ASC";

                        $resultado = $conexao->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                tabelaNotas();
                            }
                        }
                        $nomeArquivo = "Boletim" . $linha0['serie'] . "ano" . $linha0['nomeTurma'] . ".pdf";
                    }
                }
                $pdf->Output("I", $nomeArquivo);
            }
        }
    }
} else {
    if ($opvl == 'todasTurmas') {
        $pdf = new FPDF("l", "cm", "A4");
        $sqlt = "SELECT t.id FROM turma t WHERE t.id != 1 ORDER BY t.serie ASC, t.nome ASC";
        $resultadot = $conexao->query($sqlt);
        if ($resultadot->num_rows > 0) {
            while ($linhat = $resultadot->fetch_assoc()) {
                $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND a.id_turma=" . $linhat['id'] . " ORDER BY u.nome ASC";
                $resultado0 = $conexao->query($sql0);
                if ($resultado0->num_rows > 0) {
                    while ($linha0 = $resultado0->fetch_assoc()) {
                        $pdf->AddPage();
                        $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                        $pdf->Ln(3);

                        $pdf->SetTopMargin(0.5);
                        $pdf->SetLeftMargin(0.3);
                        $pdf->SetRightMargin(0.3);
                        dadosAluno();

                        $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND a.idAluno=" . $linha0['idAluno'] . " ORDER BY d.nome ASC";

                        $resultado = $conexao->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                tabelaNotas();
                            }
                        }
                    }
                }
            }
            $pdf->Output("I", "BoletimTodasTurmas.pdf");
        }
    } elseif ($opvl == 'segundosAnos') {
        $pdf = new FPDF("l", "cm", "A4");
        $sqlt = "SELECT t.id FROM turma t WHERE t.id != 1 AND t.serie = 2 ORDER BY t.serie ASC, t.nome ASC";
        $resultadot = $conexao->query($sqlt);
        if ($resultadot->num_rows > 0) {
            while ($linhat = $resultadot->fetch_assoc()) {
                $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND a.id_turma=" . $linhat['id'] . " ORDER BY u.nome ASC";
                $resultado0 = $conexao->query($sql0);
                if ($resultado0->num_rows > 0) {
                    while ($linha0 = $resultado0->fetch_assoc()) {
                        $pdf->AddPage();
                        $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                        $pdf->Ln(3);

                        $pdf->SetTopMargin(0.5);
                        $pdf->SetLeftMargin(0.3);
                        $pdf->SetRightMargin(0.3);
                        dadosAluno();

                        $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND a.idAluno=" . $linha0['idAluno'] . " ORDER BY d.nome ASC";

                        $resultado = $conexao->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                tabelaNotas();
                            }
                        }
                    }
                }
            }
        }
        $pdf->Output("I", "BoletimSegundosAnos.pdf");
    } elseif ($opvl == 'terceirosAnos') {
        $pdf = new FPDF("l", "cm", "A4");
        $sqlt = "SELECT t.id FROM turma t WHERE t.id != 1 AND t.serie = 3 ORDER BY t.serie ASC, t.nome ASC";
        $resultadot = $conexao->query($sqlt);
        if ($resultadot->num_rows > 0) {
            while ($linhat = $resultadot->fetch_assoc()) {
                $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND a.id_turma=" . $linhat['id'] . " ORDER BY u.nome ASC";
                $resultado0 = $conexao->query($sql0);
                if ($resultado0->num_rows > 0) {
                    while ($linha0 = $resultado0->fetch_assoc()) {
                        $pdf->AddPage();
                        $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                        $pdf->Ln(3);

                        $pdf->SetTopMargin(0.5);
                        $pdf->SetLeftMargin(0.3);
                        $pdf->SetRightMargin(0.3);
                        dadosAluno();

                        $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND a.idAluno=" . $linha0['idAluno'] . " ORDER BY d.nome ASC";

                        $resultado = $conexao->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                tabelaNotas();
                            }
                        }
                    }
                }
            }
        }
        $pdf->Output("I", "BoletimTerceirosAnos.pdf");
    } elseif ($opvl == 'quartosAnos') {
        $pdf = new FPDF("l", "cm", "A4");
        $sqlt = "SELECT t.id FROM turma t WHERE t.id != 1 AND t.serie = 4 ORDER BY t.serie ASC, t.nome ASC";
        $resultadot = $conexao->query($sqlt);
        if ($resultadot->num_rows > 0) {
            while ($linhat = $resultadot->fetch_assoc()) {
                $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND a.id_turma=" . $linhat['id'] . " ORDER BY u.nome ASC";
                $resultado0 = $conexao->query($sql0);
                if ($resultado0->num_rows > 0) {
                    while ($linha0 = $resultado0->fetch_assoc()) {
                        $pdf->AddPage();
                        $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                        $pdf->Ln(3);

                        $pdf->SetTopMargin(0.5);
                        $pdf->SetLeftMargin(0.3);
                        $pdf->SetRightMargin(0.3);
                        dadosAluno();

                        $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND a.idAluno=" . $linha0['idAluno'] . " ORDER BY d.nome ASC";

                        $resultado = $conexao->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                tabelaNotas();
                            }
                        }
                    }
                }
            }
        }
        $pdf->Output("I", "BoletimQuartosAnos.pdf");
    } elseif ($opvl == 'quintosAnos') {
        $pdf = new FPDF("l", "cm", "A4");
        $sqlt = "SELECT t.id FROM turma t WHERE t.id != 1 AND t.serie = 5 ORDER BY t.serie ASC, t.nome ASC";
        $resultadot = $conexao->query($sqlt);
        if ($resultadot->num_rows > 0) {
            while ($linhat = $resultadot->fetch_assoc()) {
                $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND a.id_turma=" . $linhat['id'] . " ORDER BY u.nome ASC";
                $resultado0 = $conexao->query($sql0);
                if ($resultado0->num_rows > 0) {
                    while ($linha0 = $resultado0->fetch_assoc()) {
                        $pdf->AddPage();
                        $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                        $pdf->Ln(3);

                        $pdf->SetTopMargin(0.5);
                        $pdf->SetLeftMargin(0.3);
                        $pdf->SetRightMargin(0.3);
                        dadosAluno();

                        $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND a.idAluno=" . $linha0['idAluno'] . " ORDER BY d.nome ASC";

                        $resultado = $conexao->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                tabelaNotas();
                            }
                        }
                    }
                }
            }
        }
        $pdf->Output("I", "BoletimQuintosAnos.pdf");
    } elseif ($opvl == 'sextosAnos') {
        $pdf = new FPDF("l", "cm", "A4");
        $sqlt = "SELECT t.id FROM turma t WHERE t.id != 1 AND t.serie = 6 ORDER BY t.serie ASC, t.nome ASC";
        $resultadot = $conexao->query($sqlt);
        if ($resultadot->num_rows > 0) {
            while ($linhat = $resultadot->fetch_assoc()) {
                $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND a.id_turma=" . $linhat['id'] . " ORDER BY u.nome ASC";
                $resultado0 = $conexao->query($sql0);
                if ($resultado0->num_rows > 0) {
                    while ($linha0 = $resultado0->fetch_assoc()) {
                        $pdf->AddPage();
                        $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                        $pdf->Ln(3);

                        $pdf->SetTopMargin(0.5);
                        $pdf->SetLeftMargin(0.3);
                        $pdf->SetRightMargin(0.3);
                        dadosAluno();

                        $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND a.idAluno=" . $linha0['idAluno'] . " ORDER BY d.nome ASC";

                        $resultado = $conexao->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                tabelaNotas();
                            }
                        }
                    }
                }
            }
        }
        $pdf->Output("I", "BoletimSextosAnos.pdf");
    } elseif ($opvl == 'setimosAnos') {
        $pdf = new FPDF("l", "cm", "A4");
        $sqlt = "SELECT t.id FROM turma t WHERE t.id != 1 AND t.serie = 7 ORDER BY t.serie ASC, t.nome ASC";
        $resultadot = $conexao->query($sqlt);
        if ($resultadot->num_rows > 0) {
            while ($linhat = $resultadot->fetch_assoc()) {
                $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND a.id_turma=" . $linhat['id'] . " ORDER BY u.nome ASC";
                $resultado0 = $conexao->query($sql0);
                if ($resultado0->num_rows > 0) {
                    while ($linha0 = $resultado0->fetch_assoc()) {
                        $pdf->AddPage();
                        $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                        $pdf->Ln(3);

                        $pdf->SetTopMargin(0.5);
                        $pdf->SetLeftMargin(0.3);
                        $pdf->SetRightMargin(0.3);
                        dadosAluno();

                        $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND a.idAluno=" . $linha0['idAluno'] . " ORDER BY d.nome ASC";

                        $resultado = $conexao->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                tabelaNotas();
                            }
                        }
                    }
                }
            }
        }
        $pdf->Output("I", "BoletimSetimosAnos.pdf");
    } elseif ($opvl == 'oitavosAnos') {
        $pdf = new FPDF("l", "cm", "A4");
        $sqlt = "SELECT t.id FROM turma t WHERE t.id != 1 AND t.serie = 8 ORDER BY t.serie ASC, t.nome ASC";
        $resultadot = $conexao->query($sqlt);
        if ($resultadot->num_rows > 0) {
            while ($linhat = $resultadot->fetch_assoc()) {
                $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND a.id_turma=" . $linhat['id'] . " ORDER BY u.nome ASC";
                $resultado0 = $conexao->query($sql0);
                if ($resultado0->num_rows > 0) {
                    while ($linha0 = $resultado0->fetch_assoc()) {
                        $pdf->AddPage();
                        $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                        $pdf->Ln(3);

                        $pdf->SetTopMargin(0.5);
                        $pdf->SetLeftMargin(0.3);
                        $pdf->SetRightMargin(0.3);
                        dadosAluno();

                        $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND a.idAluno=" . $linha0['idAluno'] . " ORDER BY d.nome ASC";

                        $resultado = $conexao->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                tabelaNotas();
                            }
                        }
                    }
                }
            }
        }
        $pdf->Output("I", "BoletimOitavosAnos.pdf");
    } elseif ($opvl == 'nonosAnos') {
        $pdf = new FPDF("l", "cm", "A4");
        $sqlt = "SELECT t.id FROM turma t WHERE t.id != 1 AND t.serie = 9 ORDER BY t.serie ASC, t.nome ASC";
        $resultadot = $conexao->query($sqlt);
        if ($resultadot->num_rows > 0) {
            while ($linhat = $resultadot->fetch_assoc()) {
                $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND a.id_turma=" . $linhat['id'] . " ORDER BY u.nome ASC";
                $resultado0 = $conexao->query($sql0);
                if ($resultado0->num_rows > 0) {
                    while ($linha0 = $resultado0->fetch_assoc()) {
                        $pdf->AddPage();
                        $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                        $pdf->Ln(3);

                        $pdf->SetTopMargin(0.5);
                        $pdf->SetLeftMargin(0.3);
                        $pdf->SetRightMargin(0.3);
                        dadosAluno();

                        $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND a.idAluno=" . $linha0['idAluno'] . " ORDER BY d.nome ASC";

                        $resultado = $conexao->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                tabelaNotas();
                            }
                        }
                    }
                }
            }
        }
        $pdf->Output("I", "BoletimNonosAnos.pdf");
    } elseif ($opvl == "erro") {
        alertaErro();
    } else {
        $sqlcont = "SELECT COUNT(a.idAluno) AS 'contadorAlunos' FROM aluno a, turma t WHERE t.id=a.id_turma AND t.id=" . $opvl;
        $resultadocont = $conexao->query($sqlcont);
        if ($resultadocont->num_rows > 0) {
            $linhacont = $resultadocont->fetch_assoc();
            if ($linhacont['contadorAlunos'] == 0) {
                echo "
                        <script> 
                            alert('Não há nenhum aluno nesta turma, logo, não é possível gerar os boletins dessa turma!');
                            alert('Você será redirecionado para a página \"boletim\".');
                            window.location.href = '../../boletim.php';
                        </script>
                    ";
            } else {
                $pdf = new FPDF("l", "cm", "A4");
                $nomeArquivo = "";
                $sql0 = "SELECT DISTINCT u.*, a.*, t.nome AS 'nomeTurma', t.serie, d.ano FROM usuario u, aluno a, disciplina d, turma t WHERE u.id=a.idAluno AND a.id_turma=t.id AND t.id=d.id_turma AND a.id_turma=" . $opvl . " ORDER BY u.nome ASC";
                $resultado0 = $conexao->query($sql0);
                if ($resultado0->num_rows > 0) {
                    while ($linha0 = $resultado0->fetch_assoc()) {
                        $pdf->AddPage();
                        $pdf->Image('../../img/cabecalho_relatorioPDF.png', 2.75, 0.5, 23.1, 2.5);
                        $pdf->Ln(3);

                        $pdf->SetTopMargin(0.5);
                        $pdf->SetLeftMargin(0.3);
                        $pdf->SetRightMargin(0.3);
                        dadosAluno();

                        $sql = "SELECT b.*, d.nome AS 'nomeDisciplina' FROM usuario u, aluno a, boletim b, disciplina d WHERE u.id=a.idAluno AND b.id_aluno=a.idAluno AND b.id_disciplina=d.id AND a.idAluno=" . $linha0['idAluno'] . " ORDER BY d.nome ASC";

                        $resultado = $conexao->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                tabelaNotas();
                            }
                        }
                        $nomeArquivo = "Boletim" . $linha0['serie'] . "ano" . $linha0['nomeTurma'] . ".pdf";
                    }
                }
                $pdf->Output("I", $nomeArquivo);
            }
        }
    }
}



/**********
  Funções
 **********/

function dadosAluno()
{
    global $pdf;
    global $pdf;
    global $linha0;

    $pdf->SetFont('Arial', 'BU', 20);
    $pdf->SetTextColor(220, 50, 50);

    if ($linha0['sexo'] == 'F')
        $pdf->Cell(27.7, 1, utf8_decode('Boletim Escolar da Aluna - ' . $linha0['ano']), 0, 0, "C");
    else
        $pdf->Cell(27.7, 1, utf8_decode('Boletim Escolar do Aluno - ' . $linha0['ano']), 0, 0, "C");

    $pdf->Ln(1.5);


    $pdf->SetFont('Arial', '', 8.2);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFillColor(255, 255, 255);

    $pdf->Cell(10.15, 0.8, utf8_decode('Nome: ' . $linha0['nome']), 1, 0, "L", 1);
    $pdf->Cell(8.8, 0.8, utf8_decode('Email: ' . $linha0['email']), 1, 0, "L", 1);
    $pdf->Cell(10.15, 0.8, utf8_decode('N°. de matrícula: ' . $linha0['numero_matricula']), 1, 0, "L", 1);
    $pdf->Ln();
    $pdf->Cell(10.15, 0.8, utf8_decode('Data de nascimento: ' . formata_data($linha0['nome'])), 1, 0, "L", 1);

    if ($linha0['sexo'] == 'F')
        $linha0['sexo'] = 'Feminino';
    else
        $linha0['sexo'] = 'Masculino';

    $pdf->Cell(8.8, 0.8, utf8_decode('Sexo: ' . $linha0['sexo']), 1, 0, "L", 1);
    $pdf->Cell(10.15, 0.8, utf8_decode('Responsável: ' . $linha0['nome_responsavel']), 1, 0, "L", 1);
    $pdf->Ln();
    $pdf->Cell(10.15, 0.8, utf8_decode('Telefone: ' . $linha0['telefone']), 1, 0, "L", 1);

    if ($linha0['local_moradia'] == 'U')
        $linha0['local_moradia'] = 'Urbana';
    else
        $linha0['local_moradia'] = 'Rural';

    $pdf->Cell(8.8, 0.8, utf8_decode('Zona de moradia: ' . $linha0['local_moradia']), 1, 0, "L", 1);
    $pdf->Cell(10.15, 0.8, utf8_decode('Turma: ' . $linha0['serie'] . '° ano ' . $linha0['nomeTurma']), 1, 0, "L", 1);

    $pdf->Ln();

    if ($linha0['serie'] >= 6)
        $turno = 'Matutino';
    else
        $turno = 'Vespertino';

    $pdf->Cell(10.15, 0.8, utf8_decode('Turno: ' . $turno), 1, 0, "L", 1);

    if ($linha0['serie'] >= 6)
        $ensino = 'Ensino Fundamental 2';
    else
        $ensino = 'Ensino Fundamental 1';

    $pdf->Cell(8.8, 0.8, utf8_decode('Nível de ensino: ' . $ensino), 1, 0, "L", 1);
    $pdf->Cell(10.15, 0.8, utf8_decode('Ano letivo: ' . $linha0['ano']), 1, 0, "L", 1);
    $pdf->Ln(2);


    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFillColor(0, 0, 156);

    $pdf->Cell(5.1, 1, '', 1, 0, "C", 1);
    $pdf->Cell(3, 1, utf8_decode('1° Bimestre'), 1, 0, "C", 1);
    $pdf->Cell(3, 1, utf8_decode('2° Bimestre'), 1, 0, "C", 1);
    $pdf->Cell(3, 1, utf8_decode('3° Bimestre'), 1, 0, "C", 1);
    $pdf->Cell(3, 1, utf8_decode('4° Bimestre'), 1, 0, "C", 1);
    $pdf->Cell(3, 1, utf8_decode('Recuperação'), 1, 0, "C", 1);
    $pdf->Cell(3, 2, utf8_decode('Faltas totais'), 1, 0, "C", 1);
    $pdf->Cell(3, 2, utf8_decode('Nota final'), 1, 0, "C", 1);
    $pdf->Cell(3, 2, utf8_decode('Situações'), 1, 0, "C", 1);
    $pdf->Cell(0, 1, "", 0, 1);
    $pdf->Cell(0.001, 1, "", 0, 0);
    $pdf->Cell(5.1, 1, 'Disciplinas', 1, 0, "C", 1);
    $pdf->Cell(1.5, 1, utf8_decode('Faltas'), 1, 0, "C", 1);
    $pdf->Cell(1.5, 1, utf8_decode('Notas'), 1, 0, "C", 1);
    $pdf->Cell(1.5, 1, utf8_decode('Faltas'), 1, 0, "C", 1);
    $pdf->Cell(1.5, 1, utf8_decode('Notas'), 1, 0, "C", 1);
    $pdf->Cell(1.5, 1, utf8_decode('Faltas'), 1, 0, "C", 1);
    $pdf->Cell(1.5, 1, utf8_decode('Notas'), 1, 0, "C", 1);
    $pdf->Cell(1.5, 1, utf8_decode('Faltas'), 1, 0, "C", 1);
    $pdf->Cell(1.5, 1, utf8_decode('Notas'), 1, 0, "C", 1);
    $pdf->Cell(1.5, 1, utf8_decode('Faltas'), 1, 0, "C", 1);
    $pdf->Cell(1.5, 1, utf8_decode('Notas'), 1, 0, "C", 1);
    $pdf->Ln();
}

function tabelaNotas()
{
    global $pdf;
    global $linha0;
    global $linha;
    $i = 0;
    $pdf->SetFont('Arial', '', 8.5);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFillColor(255, 255, 255);
    $faltasTotais = '';
    $notaFinal = '';
    $situacoes = '';
    $soma = 0;
    $i++;
    $f = 0;
    $n = 0;
    if ($linha['falta1bim'] == NULL) {
        $linha['falta1bim'] = '-:--';
        $f++;
    }
    if ($linha['nota1bim'] == NULL) {
        $linha['nota1bim'] = '-,-';
        $n++;
    }
    if ($linha['falta2bim'] == NULL) {
        $linha['falta2bim'] = '-:--';
        $f++;
    }
    if ($linha['nota2bim'] == NULL) {
        $linha['nota2bim'] = '-,-';
        $n++;
    }
    if ($linha['falta3bim'] == NULL) {
        $linha['falta3bim'] = '-:--';
        $f++;
    }
    if ($linha['nota3bim'] == NULL) {
        $linha['nota3bim'] = '-,-';
        $n++;
    }
    if ($linha['falta4bim'] == NULL) {
        $linha['falta4bim'] = '-:--';
        $f++;
    }
    if ($linha['nota4bim'] == NULL) {
        $linha['nota4bim'] = '-,-';
        $n++;
    }
    if ($linha['faltaRecuperacao'] == NULL) {
        $linha['faltaRecuperacao'] = '-:--';
    }
    if ($linha['notaRecuperacao'] == NULL) {
        $linha['notaRecuperacao'] = '-,-';
    }

    if ($f > 0) {
        $faltasTotais = '-:--';
        $situacoes = 'Em andamento';
    } else {
        $soma = $linha['falta1bim'] + $linha['falta2bim'] + $linha['falta3bim'] + $linha['falta4bim'];
        $faltasTotais = converte_falta($soma);
    }

    if ($n > 0) {
        $notaFinal = '-,-';
        $situacoes = 'Em andamento';
    } else {
        $notaFinal = $linha['nota1bim'] + $linha['nota2bim'] + $linha['nota3bim'] + $linha['nota4bim'];
    }

    if (($soma <= 50 && $notaFinal >= 65) && ($n == 0 && $f == 0)) {
        if ($linha0['sexo'] == 'Masculino')
            $situacoes = 'Aprovado';
        else
            $situacoes = 'Aprovada';
    } elseif (($soma > 50 || $notaFinal < 65) && ($n == 0 && $f == 0)) {
        if ($linha0['sexo'] == 'Masculino')
            $situacoes = 'Reprovado';
        else
            $situacoes = 'Reprovada';
    } elseif ($n > 0 || $f > 0) {
        $situacoes = 'Em andamento';
    }

    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(5.1, 0.7, utf8_decode($linha['nomeDisciplina']), 1, 0, "C", 1);

    if ($linha['falta1bim'] == '-:--') {
        $pdf->SetTextColor(128, 128, 128);
        $pdf->Cell(1.5, 0.7, $linha['falta1bim'], 1, 0, "C", 1);
    } else {
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(1.5, 0.7, converte_falta($linha['falta1bim']), 1, 0, "C", 1);
    }

    if ($linha['nota1bim'] == '-,-')
        $pdf->SetTextColor(128, 128, 128);
    else
        $pdf->SetTextColor(0, 0, 0);

    $pdf->Cell(1.5, 0.7, $linha['nota1bim'], 1, 0, "C", 1);

    if ($linha['falta2bim'] == '-:--') {
        $pdf->SetTextColor(128, 128, 128);
        $pdf->Cell(1.5, 0.7, $linha['falta2bim'], 1, 0, "C", 1);
    } else {
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(1.5, 0.7, converte_falta($linha['falta2bim']), 1, 0, "C", 1);
    }

    if ($linha['nota2bim'] == '-,-')
        $pdf->SetTextColor(128, 128, 128);
    else
        $pdf->SetTextColor(0, 0, 0);

    $pdf->Cell(1.5, 0.7, $linha['nota2bim'], 1, 0, "C", 1);

    if ($linha['falta3bim'] == '-:--') {
        $pdf->SetTextColor(128, 128, 128);
        $pdf->Cell(1.5, 0.7, $linha['falta3bim'], 1, 0, "C", 1);
    } else {
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(1.5, 0.7, converte_falta($linha['falta3bim']), 1, 0, "C", 1);
    }

    if ($linha['nota3bim'] == '-,-')
        $pdf->SetTextColor(128, 128, 128);
    else
        $pdf->SetTextColor(0, 0, 0);

    $pdf->Cell(1.5, 0.7, $linha['nota3bim'], 1, 0, "C", 1);

    if ($linha['falta4bim'] == '-:--') {
        $pdf->SetTextColor(128, 128, 128);
        $pdf->Cell(1.5, 0.7, $linha['falta4bim'], 1, 0, "C", 1);
    } else {
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(1.5, 0.7, converte_falta($linha['falta4bim']), 1, 0, "C", 1);
    }

    if ($linha['nota4bim'] == '-,-')
        $pdf->SetTextColor(128, 128, 128);
    else
        $pdf->SetTextColor(0, 0, 0);

    $pdf->Cell(1.5, 0.7, $linha['nota4bim'], 1, 0, "C", 1);

    if ($linha['faltaRecuperacao'] == '-:--') {
        $pdf->SetTextColor(128, 128, 128);
        $pdf->Cell(1.5, 0.7, $linha['faltaRecuperacao'], 1, 0, "C", 1);
    } else {
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(1.5, 0.7, converte_falta($linha['faltaRecuperacao']), 1, 0, "C", 1);
    }

    if ($linha['notaRecuperacao'] == '-,-')
        $pdf->SetTextColor(128, 128, 128);
    else
        $pdf->SetTextColor(0, 0, 0);

    $pdf->Cell(1.5, 0.7, $linha['notaRecuperacao'], 1, 0, "C", 1);

    if (($f == 0) && ($soma > 50))
        $pdf->SetTextColor(255, 0, 0);
    elseif (($f == 0) && ($soma <= 50))
        $pdf->SetTextColor(0, 128, 0);

    $pdf->Cell(3, 0.7, $faltasTotais, 1, 0, "C", 1);

    if (($n == 0) && ($notaFinal < 65))
        $pdf->SetTextColor(255, 0, 0);
    elseif (($n == 0) && ($notaFinal >= 65))
        $pdf->SetTextColor(0, 128, 0);

    $pdf->Cell(3, 0.7, $notaFinal, 1, 0, "C", 1);

    if ($situacoes == 'Em andamento')
        $pdf->SetTextColor(128, 128, 128);
    elseif ($situacoes == 'Reprovado' || $situacoes == 'Reprovada')
        $pdf->SetTextColor(255, 0, 0);
    elseif ($situacoes == 'Aprovado' || $situacoes == 'Aprovada')
        $pdf->SetTextColor(0, 128, 0);

    $pdf->Cell(3, 0.7, $situacoes, 1, 0, "C", 1);
    $pdf->Ln();
    $pdf->SetTextColor(0, 0, 0);

    if ($i % 2 == 0) {
        $pdf->SetFillColor(255, 255, 255);
    } else {
        $pdf->SetFillColor(217, 222, 255);
    }
}


function def()
{
    echo "<div style='width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;'>";
    echo "<h1 style='font-family: Arial, Helvetica, Calibri; font-size: 55px; font-weight: bold; color: gray;'>SIEGE</h1>";
    echo "</div>";
}

function alertaErro()
{
    echo "<h1 align='center'>Ocorreu um erro inesperado!</h1>";
    echo "<br>";
    echo "<center>";
    echo "<img src='../../img/erro.gif' style='margin-bottom: 10px; width: 350px; height: auto;'>";
    echo "<br><br>";
    echo "<div id='mostra erro' style='width:100%; display: flex; justify-content: center; align-items: center;'>";
    echo "<img src='../../img/atencao.png' style='height: 20px; width: auto;'>";
    echo "<font style='font-size: 20px;'>" . $_GET['info'] . "</font>";
    echo "</div>";
}
