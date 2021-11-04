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
    <title>SIEGE - Registros </title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link rel="stylesheet" type="text/css" href="CSS/inputs.css">
    <link rel="stylesheet" type="text/css" href="CSS/modal.css">
    <link rel="stylesheet" type="text/css" href="CSS/modulos.css">
    <link rel="stylesheet" type="text/css" href="CSS/consultas.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <script src="JS/filtro_pesquisa_usuario.js" type="module" defer></script>
    <script src="JS/modal-atualizar.js" async></script>
    <script src="JS/modal-excluir.js" async></script>
    <script src="JS/relatorios.js" defer></script>
</head>

<body>

    <?php
    include('componentes/user_nav.php');
    if ($_SESSION['tip_usu'] == 1) {
        echo "<h1 class='titulo-principal centralizar-texto' style='margin-bottom: 25px;'>Pessoas do seu ambiente escolar</h1>";
    } else {
        echo "<h1 class='titulo-principal centralizar-texto' style='margin-bottom: 25px;'>Usuários cadastrados</h1>";
    }
    ?>

    <div class="box_search">
        <input type="text" id="barra_pesquisa" name="barra_pesquisa" placeholder="Pesquisar">
        <i class="fa fa-search" aria-hidden="true"></i>
    </div>

    <form class="user" action="#" method="post">

        <?php
        if ($_SESSION['tip_usu'] == 1) {
            echo "<label>Marque o(s) tipo(s) de membro(s) da escola que gostaria de ver os registros:</label> <br><br>";

            echo "<input type='checkbox' class='cargoFiltro' id='dir' name='dir' value='diretor'>";
            echo "<label for='dir'> Diretores e Vices</label> &emsp;";

            echo "<input type='checkbox' class='cargoFiltro' id='prof' name='prof' value='professor'>";
            echo "<label for='prof'>Professores</label> &emsp;";

            echo "<input type='checkbox' class='cargoFiltro' id='alu' name='alu' value='aluno'>";
            echo "<label for='alu'>Alunos</label><br>";
        } else {
            echo "<label>Marque o(s) tipo(s) de usuário(s) que gostaria de ver os registros:</label> <br><br>";

            echo "<input type='checkbox' class='cargoFiltro' id='dir' name='dir' value='diretor'>";
            echo "<label for='dir'> Diretores e Vices</label> &emsp;";

            echo "<input type='checkbox' class='cargoFiltro' id='secr' name='secr' value='secretario'>";
            echo "<label for='secr'> Secretários</label> &emsp;";

            echo "<input type='checkbox' class='cargoFiltro' id='sup' name='sup' value='supervisor'>";
            echo "<label for='sup'>Supervisores</label> &emsp;";

            echo "<input type='checkbox' class='cargoFiltro' id='prof' name='prof' value='professor'>";
            echo "<label for='prof'>Professores</label> &emsp;";

            echo "<input type='checkbox' class='cargoFiltro' id='alu' name='alu' value='aluno'>";
            echo "<label for='alu'>Alunos</label><br>";
        }
        ?>
    </form>
    <br><br>

    <?php

    if ($_SESSION['tip_usu'] == 3) {
        echo "<div id='conjuntoGerarRelatorio' style='float: right; margin-top: -55px; margin-right: 30px;'>";
        echo "<form method='POST' target='_blank' id='form_relatorio' action='Relatorios/Usuario/gerarPDF.php?opvl='>";
        echo "<select name='select_relatorios' id='select_relatorios' onclick='entityAddress(\"Usuario\")' style='text-align: center'>";
        echo "<option value='' selected>-- Opções de relatórios PDF --</option>";
        echo "<option value='usuarios'>Todos os usuários</option>";
        echo "<option value='funcionarios'>Todos os funcionários</option>";
        echo "<option value='gerenciadores'>Gerenciadores</option>";
        echo "<option value='diretores_vices'>Diretores e Vices</option>";
        echo "<option value='supervisores'>Supervisores</option>";
        echo "<option value='secretarios'>Secretários</option>";
        echo "<option value='professores'>Professores</option>";
        echo "<option value='alunos'>Alunos</option>";
        echo "</select>";

        echo "<button type='submit' name='btnRelatorios' id='gr' disabled>Gerar PDF</button>";
        echo "</form>";
        echo "</div>";
    }

    ?>

    <ul id="busca_resultado" style="margin-top:40px;">
    </ul>

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