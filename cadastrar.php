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

    <nav>
        <a href="visao_diretor.php">
            <img src="img/logo_transparente.png" alt="Logo do sistema">
        </a>
        <ul>
            <li> <a href="cadastrar.php">Cadastrar</a> </li>
            <li> <a href="boletim.php">Boletins</a> </li>
            <li> <a href="turmas.php">Turmas</a> </li>
            <li> <a href="informacao_diretores_vice.php">Informações</a> </li>
            <li> <a href="cadastros.php">Cadastros</a> </li>
            <li> <a href="calendario_diretor_e_vice-diretor.php">Calendário</a> </li>
            <li> <a href="financeiro.php">Financeiro</a> </li>
            <li> <a href="seletivas.php">Seletiva</a> </li>
            <li> <a href="jogo.php">Jogo(maratona)</a> </li>
            <li> <a href="index.php">Sair</a> </li>
        </ul>
        <div class="preenche-final"></div>
    </nav>

    <main>
        <h1 style="margin-bottom: 25px;" class="titulo-principal centralizar-texto">Cadastrar novos funcionários</h1>
        
        <div class="toRegister-box">
            <p style="margin-bottom: 25px;">Qual tipo de usuário gostaria de cadastrar?</p>
            <div class="buttons-group">
                <button class="option" id="supervisor">Supervisor(a)</button>
                <button class="option" id="secretario">Secretário(a)</button>
                <button class="option" id="professor">Professor(a)</button>
                <button class="option" id="aluno">Aluno(a)</button>
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