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
    <link rel="stylesheet" type="text/css" href="CSS/inputs.css">
    <link rel="stylesheet" type="text/css" href="CSS/modal.css">
    <link rel="stylesheet" type="text/css" href="CSS/modulos.css">
    <link rel="stylesheet" type="text/css" href="CSS/consultas.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="JS/filtro_pesquisa_usuario.js" type="module" defer></script>
    <script src="JS/modal-atualizar.js" async></script>
    <script src="JS/modal-excluir.js" async></script>
</head>

<body>

    <?php
    include('componentes/user_nav.php');
    ?>

    <h1 class="titulo-principal centralizar-texto" style="margin-bottom: 25px;">Usuários cadastrados</h1>

    <div class="box_search">
        <input type="text" id="barra_pesquisa" name="barra_pesquisa">
        <i class="fa fa-search" aria-hidden="true"></i>
    </div>

    <form class="user" action="#" method="post">
        <label>Marque o tipo de funcionário que gostaria de ver os registros:</label> <br><br>

        <input type="checkbox" class="cargoFiltro" id="dir" name="dir" value="diretor">
        <label for="dir"> Diretor(a) e Vice</label>

        <input type="checkbox" class="cargoFiltro" id="secr" name="secr" value="secretario">
        <label for="secr"> Secretário(a)</label>

        <input type="checkbox" class="cargoFiltro" id="sup" name="sup" value="supervisor">
        <label for="sup">Supervisor(a)</label>

        <input type="checkbox" class="cargoFiltro" id="prof" name="prof" value="professor">
        <label for="prof">Professor(a)</label>

        <input type="checkbox" class="cargoFiltro" id="alu" name="alu" value="aluno">
        <label for="alu">Aluno(a)</label><br>
    </form>
    <br><br>

    <div id="busca_resultado">
    </div>

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