<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIEGE - Registros </title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    
    <?php
        include ('componentes/user_nav.php');
    ?>

    <h1 class="titulo-principal centralizar-texto" style="margin-bottom: 25px;">Funcionários cadastrados</h1>

    <form class="user" action="#" method="post">
        <label>Marque o tipo de funcionário que gostaria de ver os registros:</label> <br><br>

        <input type="checkbox" id="dir" name="dir" value="diretor">
        <label for="dir"> Diretor(a) e Vice</label>

        <input type="checkbox" id="secr" name="secr" value="secretario">
        <label for="secr"> Secretário(a)</label>

        <input type="checkbox" id="sup" name="sup" value="supervisor">
        <label for="sup">Supervisor(a)</label>

        <input type="checkbox" id="prof" name="prof" value="professor">
        <label for="prof">Professor(a)</label>

        <input type="checkbox" id="alu" name="alu" value="aluno">
        <label for="alu">Aluno(a)</label><br>
    </form>
    <br><br>

    <?php
        include ("CRUD/Usuario/read.php");
    ?>

</body>

</html>