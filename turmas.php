<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIEGE - Turmas </title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link rel="stylesheet" type="text/css" href="CSS/inputs.css">
    <link rel="stylesheet" type="text/css" href="CSS/modal.css">
    <link rel="stylesheet" type="text/css" href="CSS/consultas.css">
    <link rel="stylesheet" type="text/css" href="CSS/modulos.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="JS/filtro_pesquisa_turma.js" type="module" defer></script>
    <script src="JS/modal-atualizar.js" async></script>
    <script src="JS/modal-excluir.js" async></script>
    <script src="JS/relatorios.js" defer></script>
</head>

<body>
    
    <?php
        include ('componentes/user_nav.php');
    ?>

    <h1 class="titulo-principal centralizar-texto" style="margin-bottom: 25px;">Turmas cadastradas</h1>

    <div class="box_search">
        <input type="text" id="barra_pesquisa" name="barra_pesquisa" placeholder="Pesquisar">
        <i class="fa fa-search" aria-hidden="true"></i>
    </div>

    
    <form class="user" action="#" method="post">
        <label>Marque o ano da turma que gostaria de ver os registros:</label> <br><br>

        <input type="checkbox" class="serieFiltro" id="seg" name="seg" value="segundo">
        <label for="seg">2° anos&emsp;</label>

        <input type="checkbox" class="serieFiltro" id="terc" name="terc" value="terceiro">
        <label for="terc">3° anos&emsp;</label>

        <input type="checkbox" class="serieFiltro" id="quart" name="quart" value="quarto">
        <label for="quart">4° anos&emsp;</label>

        <input type="checkbox" class="serieFiltro" id="quin" name="quin" value="quinto">
        <label for="quin">5° anos&emsp;</label>

        <input type="checkbox" class="serieFiltro" id="sext" name="sext" value="sexto">
        <label for="sext">6° anos&emsp;</label>

        <input type="checkbox" class="serieFiltro" id="seti" name="seti" value="setimo">
        <label for="seti">7° anos&emsp;</label>

        <input type="checkbox" class="serieFiltro" id="oit" name="oit" value="oitavo">
        <label for="oit">8° anos&emsp;</label>

        <input type="checkbox" class="serieFiltro" id="non" name="non" value="nono">
        <label for="non">9° anos&emsp;</label><br>
    </form>
    <br><br>

    <div id="conjuntoGerarRelatorio" style="float: right; margin-top: -55px; margin-right: 30px;">
        <form method='POST' target="_blank" id="form_relatorio" action='Relatorios/Turma/gerarPDF.php?opvl='>
            <select name="select_relatorios" id="select_relatorios" onclick="entityAddress('Turma')" style="text-align: center">
                <option value="" selected>-- Opções de relatórios PDF --</option>
                <option value="tudoturma">Turmas, alunos e disciplinas</option>
                <option value="soalunos">Turmas e alunos</option>
                <option value="sodisciplinas">Turmas e disciplinas</option>
                <option value="sonomes">Nomes das turmas</option>
            </select>

            <button type="submit" name="btnRelatorios" id="gr" disabled>Gerar PDF</button>
        </form>
    </div>

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