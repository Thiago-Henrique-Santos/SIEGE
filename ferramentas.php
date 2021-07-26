<!DOCTYPE html>
<html lang="pt-br">

<head>
    <META charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIEGE - Ferramentas</title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link rel="stylesheet" type="text/css" href="CSS/cadastrar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    
    <?php
        include ('componentes/user_nav.php');
    ?>

    <h1 class="titulo-principal"> Ferramentas </h1>
    <br>

    <div class="buttons-group" style="margin-top:25px;">
        <button href="https://classroom.google.com/" target="area">Google Classroom</button>
        <button href="https://jamboard.google.com/" target="area">Google Jamboard</button>
        <button href="https://meet.google.com/" target="area">Google Meet</button>
        <button href="https://mail.google.com/" target="area">Gmail</button>
    </div>

    <div class="buttons-group" style="margin-top:25px;">
        <button href="https://simave.educacao.mg.gov.br/#!/pagina-inicial" target="area">Simave</button>
        <button href="https://www2.educacao.mg.gov.br/" target="area">Secretaria Educação MG</button>
    </div>

    <center>
	<iframe name="area" src="https://www.extreme-e.com/" height="750px" width="98%" style="margin-top: 30px;"></iframe>
    </center>
</body>

</html>