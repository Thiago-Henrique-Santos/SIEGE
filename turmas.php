<?php
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
    <title>SIEGE - Turmas </title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/main_nav.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_footer.css">
    <link rel="stylesheet" type="text/css" href="CSS/inputs.css">
    <link rel="stylesheet" type="text/css" href="CSS/modal.css">
    <link rel="stylesheet" type="text/css" href="CSS/consultas.css">
    <link rel="stylesheet" type="text/css" href="CSS/modulos.css">
    <link rel="stylesheet" type="text/css" href="CSS/componentes.css">
    <link rel="stylesheet" type="text/css" href="CSS/turmas.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="JS/filtro_pesquisa_turma.js" type="module" defer></script>
    <script src="JS/modal-atualizar.js" async></script>
    <script src="JS/modal-excluir.js" async></script>
    <script src="JS/relatorios.js" defer></script>
</head>

<body>

    <?php
    include('componentes/main_nav.php');
    include("BancoDados/conexao_mysql.php");
    ?>

    <main>

        <?php

        if ($_SESSION['tip_usu'] == 1) {
            $sql = "SELECT t.serie, t.nome FROM usuario u, aluno a, turma t WHERE u.id=a.idAluno AND u.email='" . $_SESSION['campo_email'] . "' AND t.id=a.id_turma";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                $linha = $resultado->fetch_assoc();
                if ($linha['serie'] != 0)
                    echo "<h1 class='titulo-principal centralizar-texto'>Turma - " . $linha['serie'] . "° ano " . $linha['nome'] . "</h1>";
                else
                    echo "<h1 class='titulo-principal centralizar-texto'>Turma - Não vinculada</h1>";
            }
        } else {
            echo "<h1 class='titulo-principal centralizar-texto'>Turmas registradas</h1>";
        }
        ?>

        <div class="box_search">
            <input type="text" id="barra_pesquisa" name="barra_pesquisa" placeholder="Pesquisar">
            <i class="fa fa-search" aria-hidden="true"></i>
        </div>

        <?php
        if ($_SESSION['tip_usu'] != 1) {
            echo "<form class='user' action='#' method='post'>";
            echo "<label style='margin-left: 20px;'>Marque o ano da turma que gostaria de ver os registros:</label> <br><br>";

            echo "<input type='checkbox' style='margin-left: 20px;' class='serieFiltro' id='seg' name='seg' value='segundo'>";
            echo "<label for='seg' class='label_filtrosTurmas'>2° anos</label>";

            echo "<input type='checkbox' class='serieFiltro' id='terc' name='terc' value='terceiro'>";
            echo "<label for='terc' class='label_filtrosTurmas'>3° anos</label>";

            echo "<input type='checkbox' class='serieFiltro' id='quart' name='quart' value='quarto'>";
            echo "<label for='quart' class='label_filtrosTurmas'>4° anos</label>";

            echo "<input type='checkbox' class='serieFiltro' id='quin' name='quin' value='quinto'>";
            echo "<label for='quin' class='label_filtrosTurmas'>5° anos</label>";

            echo "<br>";

            echo "<input type='checkbox' style='margin-left: 20px;' class='serieFiltro' id='sext' name='sext' value='sexto'>";
            echo "<label for='sext' class='label_filtrosTurmas'>6° anos</label>";

            echo "<input type='checkbox' class='serieFiltro' id='seti' name='seti' value='setimo'>";
            echo "<label for='seti' class='label_filtrosTurmas'>7° anos</label>";

            echo "<input type='checkbox' class='serieFiltro' id='oit' name='oit' value='oitavo'>";
            echo "<label for='oit' class='label_filtrosTurmas'>8° anos</label>";

            echo "<input type='checkbox' class='serieFiltro' id='non' name='non' value='nono'>";
            echo "<label for='non' class='label_filtrosTurmas'>9° anos</label><br>";
            echo "</form>";
        }
        ?>
        <br><br>

        <?php
        if ($_SESSION['tip_usu'] == 3) {
            echo "<div id='conjuntoGerarRelatorio' style='float: right; margin-top: -80px; margin-right: 20px;vertical-align: middle;'>";
            echo "<form method='POST' target='_blank' id='form_relatorio' action='Relatorios/Turma/gerarPDF.php?opvl='>";
            echo "<select class='select_relatoriosPDF' name='select_relatorios' id='select_relatorios' onclick='entityAddress(\"Turma\")' style='text-align: center'>";
            echo "<option class='ignorar' value='' selected>-- Opções de relatórios PDF --</option>";
            echo "<option class='options_validos' value='tudoturma'>Turmas, alunos e disciplinas</option>";
            echo "<option class='options_validos' value='soalunos'>Turmas e alunos</option>";
            echo "<option class='options_validos' value='sodisciplinas'>Turmas e disciplinas</option>";
            echo "<option class='options_validos' value='sonomes'>Nomes das turmas</option>";
            echo "</select>";

            echo "<button type='submit' class='btn_relatorioPDF' name='btnRelatorios' id='gr' style='cursor: not-allowed;' disabled>Gerar PDF <img class='img_boletim_funcionarios' draggable='false' src='img/files.png'></button>";
            echo "</form>";
            echo "</div>";
        }
        ?>

        <ul id="busca_resultado" style="margin-top:40px;">
        </ul>

        <?php
        include('componentes/user_footer.php');
        ?>

    </main>
    <div id="modal-screen">
        <div id="modal-block">
            <div id="close-button">
                <p>x</p>
            </div>
            <iframe src="formularios-cadastro.php?id=default">
        </div>
    </div>

</body>

</html>