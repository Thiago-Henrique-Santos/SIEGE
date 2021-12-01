<?php
include('BancoDados/conexao_mysql.php');
session_start();
if (!isset($_SESSION['campo_email']) || empty($_SESSION['campo_email'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/icon_siege.png" />
    <title>SIEGE - Boletim </title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/main_nav.css">
    <link rel="stylesheet" type="text/css" href="CSS/boletim.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_footer.css">
    <link rel="stylesheet" type="text/css" href="CSS/modal2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="JS/boletim.js" type="module"></script>
    <script src="JS/selectsBoletim.js" type="module" async></script>
    <script src="JS/filtro_boletim.js" type="module"></script>
    <script src="JS/relatorios.js" defer></script>
</head>

<body>

    <?php
    include('componentes/main_nav.php');
    ?>

    <main>
        <h1 class="titulo-principal">Boletim</h1>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Sucesso</h2>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                    <p>Registros publicados com sucesso!</p>
                    <img id='correct_boletim_img' src='img/check_salt_boletim.gif'>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>

        <div id="myModal2" class="modal">
            <div class="modal-content">
                <div class="modal-header2">
                    <h2 id='msg_erro_inesperado'>Erro inesperado</h2>
                    <div class='fechar_btn'>
                        <span class="close2">&times;</span>
                    </div>
                </div>
                <div class="modal-body2">
                    <p id='dsc_modal'>Verifique se você selecionou uma turma <strong><u>e</u></strong> uma disciplina, e tente novamente.</p>
                    <img id='error_boletim_img' src='img/error_boletim.gif'>
                </div>
                <div class="modal-footer2">
                </div>
            </div>
        </div>

        <?php
        if ($_SESSION['tip_usu'] != 1) {
            echo "<button id='btn_editar' style='margin-left: 20px;' name='btn_editar' type='button'>Editar</button>";
            echo "<button id='btn_cancelar' name='btn_cancelar' type='button'>Cancelar</button>";
            echo "<button id='btn_limpar' name='btn_limpar' type='button'>Limpar</button>";
            echo "<button id='btn_publicar' name='btn_publicar' type='button' disabled='' style='cursor: not-allowed;'>Publicar</button>";
        }
        ?>

        <br><br>
        <?php

        if ($_SESSION['tip_usu'] == 3) {
            echo "<div id='conjuntoGerarRelatorio' style='float: right;margin-top: -70px;margin-bottom: 70px;vertical-align: middle;'>";
            echo "<form method='POST' target='_blank' id='form_relatorio' action='Relatorios/Boletim/gerarPDF.php?opvl='>";
            echo "<select class='select_boletim' name='select_relatorios' id='select_relatorios' onclick='entityAddress(\"Boletim\")' style='text-align: center'>";
            echo "<option class='ignorar' value='' selected>-- Opções de boletim PDF --</option>";
            echo "<option class='options_validos' value='todasTurmas'>Todas as turmas</option>";
            echo "<option class='ignorar' value=''>-------</option>";
            echo "<option class='options_validos' value='segundosAnos'>2°s anos</option>";
            echo "<option class='options_validos' value='terceirosAnos'>3°s anos</option>";
            echo "<option class='options_validos' value='quartosAnos'>4°s anos</option>";
            echo "<option class='options_validos' value='quintosAnos'>5°s anos</option>";
            echo "<option class='options_validos' value='sextosAnos'>6°s anos</option>";
            echo "<option class='options_validos' value='setimosAnos'>7°s anos</option>";
            echo "<option class='options_validos' value='oitavosAnos'>8°s anos</option>";
            echo "<option class='options_validos' value='nonosAnos'>9°s anos</option>";
            echo "<option class='ignorar' value=''>-------</option>";

            $preparab = $conexao->prepare("SELECT * FROM turma WHERE id != 1 ORDER BY serie ASC, nome ASC");
            $preparab->execute();
            $resultadob = $preparab->get_result();
            while ($tb = $resultadob->fetch_object()) {
                $turmasb[] = $tb;
            }
            foreach ($turmasb as $turb) {
                echo "<option class='options_validos' value = $turb->id>" . $turb->serie . "º ano " . $turb->nome . "</option>";
            }
            echo "</select>";
            echo "<button type='submit' class='btn_boletimPDF_funcionarios' name='btnRelatorios' id='gr' style='cursor: not-allowed;' disabled>Gerar PDF  <img class='img_boletim_funcionarios' draggable='false' src='img/report-card.png'></button>";
            echo "</form>";
            echo "</div>";
        } elseif ($_SESSION['tip_usu'] == 2) {
            echo "<div id='conjuntoGerarRelatorio' style='float: right;margin-top: -70px;margin-bottom: 70px;vertical-align: middle;'>";
            echo "<form method='POST' target='_blank' id='form_relatorio' action='Relatorios/Boletim/gerarPDF.php?opvl='>";
            echo "<select class='select_boletim' name='select_relatorios' id='select_relatorios' onclick='entityAddress(\"Boletim\")'>";
            echo "<option class='ignorar' value='' selected>-- Opções de boletim PDF --</option>";
            echo "<option class='options_validos' value='todasTurmasLecionadas'>Todas as turmas lecionadas</option>";
            echo "<option class='ignorar' value=''>-------</option>";

            $sqlb = "SELECT p.idProfessor FROM professor p, usuario u WHERE p.idProfessor = u.id AND u.email = '" . $_SESSION['campo_email'] . "'";
            $resultadob = $conexao->query($sqlb);

            if ($resultadob->num_rows > 0) {
                $linhab = $resultadob->fetch_assoc();
                $preparab = $conexao->prepare("SELECT t.* FROM turma t, disciplina d, professor p WHERE d.id_turma=t.id AND d.id_professor=p.idProfessor AND p.idProfessor=" . $linhab['idProfessor'] . " AND t.id != 1 ORDER BY t.serie ASC, t.nome ASC");
            }
            $preparab->execute();
            $resultadob = $preparab->get_result();
            while ($tb = $resultadob->fetch_object()) {
                $turmasb[] = $tb;
            }
            foreach ($turmasb as $turb) {
                echo "<option class='options_validos' value = $turb->id>" . $turb->serie . "º ano " . $turb->nome . "</option>";
            }

            echo "</select>";
            echo "<button type='submit' class='btn_boletimPDF_funcionarios' name='btnRelatorios' id='gr' style='cursor: not-allowed;' disabled>Gerar PDF  <img class='img_boletim_funcionarios' draggable='false' src='img/report-card.png'></button>";
            echo "</form>";
            echo "</div>";
        } elseif ($_SESSION['tip_usu'] == 1) {
            echo "<div id='conjuntoGerarRelatorio' style='float: right; margin-top: -80px; margin-right: 30px;'>";
            echo "<form method='POST' target='_blank' id='form_relatorioboletimaluno' action='Relatorios/Boletim/gerarPDF.php?opvl=boletimaluno'>";
            echo "<button type='submit' id='btn_boletimPDF_aluno' name='btnBoletimRelatorios' value='boletimaluno' id='boletimaluno'>Gerar boletim em PDF<br><img class='img_boletim' src='img/report-card.png' draggable='false'></button>";
            echo "</form>";
            echo "</div>";
        }

        if ($_SESSION['tip_usu'] != 1) {
            echo "<select class='select_turma' style='margin-left: 20px;' id='turmaEscolhida' name='turmas'>";
            echo "<option class='ignorar' value='none' selected>Selecione uma Turma</option>";

            if ($_SESSION['tip_usu'] == 3) {
                $prepara = $conexao->prepare("SELECT * FROM turma WHERE id != 1 ORDER BY serie ASC, nome ASC");
            } elseif ($_SESSION['tip_usu'] == 2) {
                $sql0 = "SELECT p.idProfessor FROM professor p, usuario u WHERE p.idProfessor = u.id AND u.email = '" . $_SESSION['campo_email'] . "'";
                $resultado0 = $conexao->query($sql0);

                if ($resultado0->num_rows > 0) {
                    $linha0 = $resultado0->fetch_assoc();
                    $prepara = $conexao->prepare("SELECT DISTINCT t.* FROM turma t, disciplina d, professor p WHERE d.id_turma=t.id AND d.id_professor=p.idProfessor AND p.idProfessor=" . $linha0['idProfessor'] . " ORDER BY t.serie ASC, t.nome ASC");
                }
            }
            $prepara->execute();
            $resultado = $prepara->get_result();
            while ($t = $resultado->fetch_object()) {
                $turmas[] = $t;
            }
            foreach ($turmas as $tur) {
                echo "<option class='options_validos' value = '$tur->id'>" . $tur->serie . "º ano " . $tur->nome . "</option>";
            }
            echo "</select>";

            echo "<select class='select_turma' name='disciplinas' id='disciplinaEscolhida'>";
            echo "<option class='ignorar' value='none'>Selecione uma Disciplina</option>";

            echo "</select>";
        }
        ?>

        <center>
            <?php
            //tr = linha, td = coluna
            //Tabela na visão de gerenciadores e professores
            echo "<table id='reportTable' style='margin-top: 55px'>";
            if ($_SESSION['tip_usu'] != 1) {

                //Parte Fixa abaixo
                echo "<tr class='titulo_tabela'>";
                echo "<td class='td_aluno'></td>";
                echo "<td colspan='2' class='td_bimestre'>";
                echo "<h2>1° Bimestre</h2>";
                echo "</td>";

                echo "<td colspan='2' class='td_bimestre'>";
                echo "<h2>2° Bimestre</h2>";
                echo "</td>";

                echo "<td colspan='2' class='td_bimestre'>";
                echo "<h2>3° Bimestre</h2>";
                echo "</td>";

                echo "<td colspan='2' class='td_bimestre'>";
                echo "<h2>4° Bimestre</h2>";
                echo "</td>";

                echo "<td colspan='2' class='td_bimestre'>";
                echo "<h2>Recuperação</h2>";
                echo "</td>";

                echo "<td rowspan='2' class='td_totais'>";
                echo "<h2>Faltas totais</h2>";
                echo "</td>";

                echo "<td rowspan='2' class='td_totais'>";
                echo "<h2>Nota Final</h2>";
                echo "</td>";

                echo "<td rowspan='2' class='td_situacao'>";
                echo "<h2>Situação</h2>";
                echo "</td>";

                echo "</tr>";

                echo "<tr class='titulo_tabela'>";
                echo "<td class='td_aluno'>";
                echo "<h2>Alunos</h2>";
                echo "</td>";

                //1° bimestre
                echo "<td class='td_notafalta'>";
                echo "<h2>Faltas</h2>";
                echo "</td>";

                echo "<td class='td_notafalta'>";
                echo "<h2>Notas</h2>";
                echo "</td>";

                //2° bimestre
                echo "<td class='td_notafalta'>";
                echo "<h2>Faltas</h2>";
                echo "</td>";

                echo "<td class='td_notafalta'>";
                echo "<h2>Notas</h2>";
                echo "</td>";

                //3° bimestre

                echo "<td class='td_notafalta'>";
                echo "<h2>Faltas</h2>";
                echo "</td>";

                echo "<td class='td_notafalta'>";
                echo "<h2>Notas</h2>";
                echo "</td>";

                //4° bimestre
                echo "<td class='td_notafalta'>";
                echo "<h2>Faltas</h2>";
                echo "</td>";

                echo "<td class='td_notafalta'>";
                echo "<h2>Notas</h2>";
                echo "</td>";

                //Recuperação
                echo "<td class='td_notafalta'>";
                echo "<h2>Faltas</h2>";
                echo "</td>";

                echo "<td class='td_notafalta'>";
                echo "<h2>Notas</h2>";
                echo "</td>";

                echo "</tr>";
            } else {
                //Parte Fixa abaixo
                //Parte Fixa abaixo
                echo "<tr class='titulo_tabela'>";
                echo "<td class='td_aluno'></td>";
                echo "<td colspan='2' class='td_bimestre'>";
                echo "<h2>1° Bimestre</h2>";
                echo "</td>";

                echo "<td colspan='2' class='td_bimestre'>";
                echo "<h2>2° Bimestre</h2>";
                echo "</td>";

                echo "<td colspan='2' class='td_bimestre'>";
                echo "<h2>3° Bimestre</h2>";
                echo "</td>";

                echo "<td colspan='2' class='td_bimestre'>";
                echo "<h2>4° Bimestre</h2>";
                echo "</td>";

                echo "<td colspan='2' class='td_bimestre'>";
                echo "<h2>Recuperação</h2>";
                echo "</td>";

                echo "<td rowspan='2' class='td_totais'>";
                echo "<h2>Faltas totais</h2>";
                echo "</td>";

                echo "<td rowspan='2' class='td_totais'>";
                echo "<h2>Nota Final</h2>";
                echo "</td>";

                echo "<td rowspan='2' class='td_situacao'>";
                echo "<h2>Situação</h2>";
                echo "</td>";

                echo "</tr>";

                echo "<tr class='titulo_tabela'>";
                echo "<td class='td_aluno'>";
                echo "<h2>Disciplinas</h2>";
                echo "</td>";

                //1° bimestre
                echo "<td class='td_notafalta'>";
                echo "<h2>Faltas</h2>";
                echo "</td>";

                echo "<td class='td_notafalta'>";
                echo "<h2>Notas</h2>";
                echo "</td>";

                //2° bimestre
                echo "<td class='td_notafalta'>";
                echo "<h2>Faltas</h2>";
                echo "</td>";

                echo "<td class='td_notafalta'>";
                echo "<h2>Notas</h2>";
                echo "</td>";

                //3° bimestre

                echo "<td class='td_notafalta'>";
                echo "<h2>Faltas</h2>";
                echo "</td>";

                echo "<td class='td_notafalta'>";
                echo "<h2>Notas</h2>";
                echo "</td>";

                //4° bimestre
                echo "<td class='td_notafalta'>";
                echo "<h2>Faltas</h2>";
                echo "</td>";

                echo "<td class='td_notafalta'>";
                echo "<h2>Notas</h2>";
                echo "</td>";

                //Recuperação
                echo "<td class='td_notafalta'>";
                echo "<h2>Faltas</h2>";
                echo "</td>";

                echo "<td class='td_notafalta'>";
                echo "<h2>Notas</h2>";
                echo "</td>";

                echo "</tr>";
            }
            ?>

            </table>
        </center>

        <?php
        if ($_SESSION['tip_usu'] != 1) {
            echo "<p id='info_text' name='info_text' style='margin-top: 25px;text-align: center;'>Selecione uma turma <strong><u>e</u></strong> uma disciplina para poder inserir as notas.<br>";
            echo "Se mesmo assim não aparecer os campos para inserir as notas, pode ser que essa turma não possua alunos.</p>";
        } else {
            if ($_SESSION['sx'] == 'M')
                echo "<p id='info_text' name='info_text' style='margin-top: 25px;text-align: center;'>Se caso não aparecer as informações no boletim, pode ser que sua turma não possua disciplinas ainda<br>e/ou você não esteja vinculado a uma turma.</p>";
            else
                echo "<p id='info_text' name='info_text' style='margin-top: 25px;text-align: center;'>Se caso não aparecer as informações no boletim, pode ser que sua turma não possua disciplinas ainda<br>e/ou você não esteja vinculada a uma turma.</p>";
        }
        ?>

        <?php
        include('componentes/user_footer.php');
        ?>

    </main>
</body>

</html>