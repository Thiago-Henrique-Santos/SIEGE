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
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link rel="stylesheet" type="text/css" href="CSS/boletim.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="JS/boletim.js"></script>
    <script src="JS/filtro_boletim.js" type="module"></script>
    <script src="JS/relatorios.js" defer></script>
    <script>
        let selecinar_turma = document.getElementById('select_turma');
        let valor_turma = selecionar_turma.value;
    </script>
</head>

<body>

    <?php
    include('componentes/user_nav.php');
    ?>

    <h1 class="titulo-principal">Boletim</h1>

    <center>
        <img src="img/cabecalho_relatorioPDF.png" draggable="false" height="90" width="832" style="margin-top:5px;margin-bottom: 40px;">
    </center>

    <button id="btn_editar" style="margin-left: 20px;" name="btn_editar" type="button" onclick="toogle_disabled(false)">Editar</button>
    <button id="btn_cancelar" name="btn_cancelar" type="button" onclick="cancel(true)">Cancelar</button>
    <button id="btn_limpar" name="btn_limpar" type="button" onclick="clearInputs()">Limpar</button>
    <button id="btn_publicar" name="btn_publicar" type="button" onclick="postGrades()" disabled="" style="cursor: not-allowed;">Publicar</button>

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
        echo "<form method='POST' action='#'>";
        echo "<label for='turmaEscolhida' class='form-label'></label>";
        echo "<select class='form-select' id='turmaEscolhida' name='turmas' style='margin-left: 20px;'>";
        echo "<option selected='sut'>Selecione uma Turma</option>";

        if ($_SESSION['tip_usu'] == 3) {
            $prepara = $conexao->prepare("SELECT * FROM turma WHERE id != 1 ORDER BY serie ASC, nome ASC");
        } elseif ($_SESSION['tip_usu'] == 2) {
            $sql0 = "SELECT p.idProfessor FROM professor p, usuario u WHERE p.idProfessor = u.id AND u.email = '" . $_SESSION['campo_email'] . "'";
            $resultado0 = $conexao->query($sql0);

            if ($resultado0->num_rows > 0) {
                $linha0 = $resultado0->fetch_assoc();
                $prepara = $conexao->prepare("SELECT t.* FROM turma t, disciplina d, professor p WHERE d.id_turma=t.id AND d.id_professor=p.idProfessor AND p.idProfessor=" . $linha0['idProfessor'] . " ORDER BY t.serie ASC, t.nome ASC");
            }
        }
        $prepara->execute();
        $resultado = $prepara->get_result();
        while ($t = $resultado->fetch_object()) {
            $turmas[] = $t;
        }
        foreach ($turmas as $tur) {
            echo "<option value = $tur->id>" . $tur->serie . "º ano " . $tur->nome . "</option>";
        }
        echo "</select>";
        echo "<br>";
        echo "<button type='submit' class='btn btn-primary'>Visualizar Disciplinas</button>";
        echo "</form>";
        echo "&emsp;";

        if (isset($_POST["turmas"])) {
            echo "<form method='POST' action='#'>";
            echo "<select name='disciplinas'>";
            echo "<option selected='sud'>Selecione uma Disciplina</option>";

            $prepara2 = $conexao->prepare("SELECT nome FROM disciplina WHERE id_turma = ?");
            $prepara2->bind_param("i", $_POST["turmas"]);
            $prepara2->execute();
            $resultado2 = $prepara2->get_result();
            while ($d = $resultado2->fetch_object()) {
                $disciplinas[] = $d;
            }
            foreach ($disciplinas as $dis) {
                echo "<option value = $dis->id>" . $dis->nome . "</option>";
            }
            echo "</select>";
            echo "</form>";
        }
    }
    ?>

    <br><br>

    <!--tr = linha, td = coluna-->
    <!-- Tabela na visão de gerenciadores e professores -->
    <table id="boletim">

        <!-- ***** Parte Fixa abaixo*****-->
        <tr class="titulo_tabela">
            <td></td>
            <td colspan="2">
                <h2>1° Bimestre</h2>
            </td>

            <td colspan="2">
                <h2>2° Bimestre</h2>
            </td>

            <td colspan="2">
                <h2>3° Bimestre</h2>
            </td>

            <td colspan="2">
                <h2>4° Bimestre</h2>
            </td>

            <td colspan="2">
                <h2>Recuperação</h2>
            </td>

            <td rowspan="2">
                <h2>Faltas totais</h2>
            </td>

            <td rowspan="2">
                <h2>Nota Final</h2>
            </td>

            <td rowspan="2">
                <h2>Situação</h2>
            </td>
        </tr>

        <tr class="titulo_tabela">
            <td>
                <h2>Alunos</h2>
            </td>

            <!--1° bimestre-->
            <td>
                <h2>Faltas</h2>
            </td>

            <td>
                <h2>Notas</h2>
            </td>

            <!--2° bimestre-->
            <td>
                <h2>Faltas</h2>
            </td>

            <td>
                <h2>Notas</h2>
            </td>

            <!--3° bimestre-->
            <td>
                <h2>Faltas</h2>
            </td>

            <td>
                <h2>Notas</h2>
            </td>

            <!--4° bimestre-->
            <td>
                <h2>Faltas</h2>
            </td>

            <td>
                <h2>Notas</h2>
            </td>

            <!--Recuperação-->
            <td>
                <h2>Faltas</h2>
            </td>

            <td>
                <h2>Notas</h2>
            </td>

        </tr>

        <tr class="linha_registros1">

            <!--Primeira coluna -> Aluno-->
            <td class="nome">
                <h3>Ana Clara Souza</h3>
            </td>

            <!--Segunda coluna -> Falta 1° bim-->
            <td>
                <input min="0" type="number" step="1" name="f1b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Terceira coluna -> Nota 1° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n1b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Quarta coluna -> Falta 2° bim-->
            <td>
                <input min="0" type="number" step="1" name="f2b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Quinta coluna -> Nota 2° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n2b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Sexta coluna -> Falta 3° bim-->
            <td>
                <input min="0" type="number" step="1" name="f3b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Sétima coluna -> Nota 3° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Oitava coluna -> Falta 4° bim-->
            <td>
                <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Nona coluna -> Nota 4° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n4b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Décima coluna -> Falta recuperação-->
            <td>
                <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Décima primeira coluna -> Nota recuperação-->
            <td>
                <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Falta final-->
            <td>
                <h3>
                    <font color="green">10</font>
                </h3>
            </td>

            <!--Nota final-->
            <td>
                <h3>
                    <font color="green">100,0</font>
                </h3>
            </td>

            <!--Situação-->
            <td>
                <h3>
                    <font color="green">Aprovada</font>
                </h3>
            </td>

        </tr>


        <!-- Registro 2 -->
        <tr class="linha_registros2">

            <!--Primeira coluna -> Aluno-->
            <td class="nome">
                <h3>Bianca Barroso da Silva</h3>
            </td>

            <!--Segunda coluna -> Falta 1° bim-->
            <td>
                <input min="0" type="number" step="1" name="f1b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Terceira coluna -> Nota 1° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n1b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Quarta coluna -> Falta 2° bim-->
            <td>
                <input min="0" type="number" step="1" name="f2b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Quinta coluna -> Nota 2° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n2b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Sexta coluna -> Falta 3° bim-->
            <td>
                <input min="0" type="number" step="1" name="f3b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Sétima coluna -> Nota 3° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Oitava coluna -> Falta 4° bim-->
            <td>
                <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Nona coluna -> Nota 4° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n4b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Décima coluna -> Falta recuperação-->
            <td>
                <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Décima primeira coluna -> Nota recuperação-->
            <td>
                <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Falta final-->
            <td>
                <h3>
                    <font color="gray" title="A falta final ainda não está disponível, já que nem todas as faltas foram lançadas.">-:--</font>
                </h3>
            </td>

            <!--Nota final-->
            <td>
                <h3>
                    <font color="gray" title="A nota final ainda não está disponível, já que nem todas as notas foram lançadas.">-,-</font>
                </h3>
            </td>

            <!--Situação-->
            <td>
                <h3>
                    <font color="gray" title="A situação do aluno ainda está em andamento, já que nem todas as notas e faltas foram publicadas.">Em andamento</font>
                </h3>
            </td>

        </tr>


        <!-- Registro 3 -->
        <tr class="linha_registros1">

            <!--Primeira coluna -> Aluno-->
            <td class="nome">
                <h3>Bruno Muniz de Carvalho</h3>
            </td>

            <!--Segunda coluna -> Falta 1° bim-->
            <td>
                <input min="0" type="number" step="1" name="f1b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Terceira coluna -> Nota 1° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n1b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Quarta coluna -> Falta 2° bim-->
            <td>
                <input min="0" type="number" step="1" name="f2b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Quinta coluna -> Nota 2° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n2b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Sexta coluna -> Falta 3° bim-->
            <td>
                <input min="0" type="number" step="1" name="f3b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Sétima coluna -> Nota 3° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Oitava coluna -> Falta 4° bim-->
            <td>
                <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Nona coluna -> Nota 4° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n4b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Décima coluna -> Falta recuperação-->
            <td>
                <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Décima primeira coluna -> Nota recuperação-->
            <td>
                <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Falta final-->
            <td>
                <h3>
                    <font color="green">4</font>
                </h3>
            </td>

            <!--Nota final-->
            <td>
                <h3>
                    <font color="red">40,0</font>
                </h3>
            </td>

            <!--Situação-->
            <td>
                <h3>
                    <font color="red">Reprovado</font>
                </h3>
            </td>

        </tr>


        <!-- Registro 4 -->
        <tr class="linha_registros2">

            <!--Primeira coluna -> Aluno-->
            <td class="nome">
                <h3>Humberto Gouvêa</h3>
            </td>

            <!--Segunda coluna -> Falta 1° bim-->
            <td>
                <input min="0" type="number" step="1" name="f1b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Terceira coluna -> Nota 1° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n1b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Quarta coluna -> Falta 2° bim-->
            <td>
                <input min="0" type="number" step="1" name="f2b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Quinta coluna -> Nota 2° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n2b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Sexta coluna -> Falta 3° bim-->
            <td>
                <input min="0" type="number" step="1" name="f3b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Sétima coluna -> Nota 3° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Oitava coluna -> Falta 4° bim-->
            <td>
                <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Nona coluna -> Nota 4° bim-->
            <td>
                <input min="0" type="number" step="0.5" name="n4b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Décima coluna -> Falta recuperação-->
            <td>
                <input min="0" type="number" step="1" name="f4b" id="i" value="" placeholder="-" disabled="">
            </td>

            <!--Décima primeira coluna -> Nota recuperação-->
            <td>
                <input min="0" type="number" step="0.5" name="n3b" id="i" value="" placeholder="-,-" disabled="">
            </td>

            <!--Falta final-->
            <td>
                <h3>
                    <font color="green">4</font>
                </h3>
            </td>

            <!--Nota final-->
            <td>
                <h3>
                    <font color="red">40,0</font>
                </h3>
            </td>

            <!--Situação-->
            <td>
                <h3>
                    <font color="red">Reprovado</font>
                </h3>
            </td>

        </tr>

        <!-- ***** Parte dinâmica acima*****-->

    </table>
    </form>

</body>

</html>