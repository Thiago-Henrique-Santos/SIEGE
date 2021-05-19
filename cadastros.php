<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIEGE - Cadastros </title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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

    <h1 class="titulo-principal centralizar-texto" style="margin-bottom: 25px;">Funcionários cadastrados</h1>

    <form class="user" action="#" method="post">
        <label>Marque o tipo de funcionário que gostaria de ver os registros:</label> <br><br>

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

</body>

</html>