<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIEGE - Cadastrar </title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link rel="stylesheet" type="text/css" href="CSS/modal.css">
    <link rel="stylesheet" type="text/css" href="CSS/cadastrar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="JS/modal-cadastrar.js" async></script>
</head>

<body>

    <?php
        include ('componentes/user_nav.php');
    ?>

    <main>
        <h1 style="margin-bottom: 25px;" class="titulo-principal centralizar-texto">Cadastrar novos funcionários</h1>
        
        <div class="toRegister-box">
            <p style="margin-bottom: 25px;">Qual tipo de usuário gostaria de cadastrar?</p>
            <div class="buttons-group">
                <button class="option" id="diretor">Diretor(a) e vice</button>
                <button class="option" id="supervisor">Supervisor(a)</button>
                <button class="option" id="secretario">Secretário(a)</button>
                <button class="option" id="professor">Professor(a)</button>
                <button class="option" id="aluno">Aluno(a)</button>
            </div>
            <p style="margin-top:50px;">Outros cadastros:</p>
            <div class="buttons-group" style="margin-top:25px;">
                <button class="option" id="turma">Turma</button>
                <button class="option" id="disciplina">Disciplina</button>
            </div>
        </div>
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