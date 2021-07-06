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
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <?php
        include ('componentes/user_nav.php');
    ?>

    <h1 class="titulo-principal centralizar-texto" style="margin-bottom: 25px;">Turmas cadastradas</h1>


    <div class="box_search">
	    <input type="text" name="">
        <i class="fa fa-search" aria-hidden="true"></i>
    </div>


    <form class="user" action="#" method="post">
        <label>Marque o ano da turma que gostaria de ver os registros:</label> <br><br>

        <input type="checkbox" class="anoFiltro" id="seg" name="seg" value="segundo">
        <label for="seg">2° anos</label>

        <input type="checkbox" class="anoFiltro" id="terc" name="terc" value="terceiro">
        <label for="sup">3° anos</label>

        <input type="checkbox" class="anoFiltro" id="quart" name="quart" value="quarto">
        <label for="quart">4° anos</label>

        <input type="checkbox" class="anoFiltro" id="quin" name="quin" value="quinto">
        <label for="quin">5° anos</label>

        <input type="checkbox" class="anoFiltro" id="sext" name="sext" value="sexto">
        <label for="sext">6° anos</label>

        <input type="checkbox" class="anoFiltro" id="seti" name="seti" value="setimo">
        <label for="seti">7° anos</label>

        <input type="checkbox" class="anoFiltro" id="oit" name="oit" value="oitavo">
        <label for="oit">8° anos</label>

        <input type="checkbox" class="anoFiltro" id="non" name="non" value="nono">
        <label for="non">9° anos</label><br>
    </form>
    <br><br>

    <?php
        include ("CRUD/Turma/read.php");
    ?>

</body>

</html>