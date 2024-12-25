<?php
session_start();
if (!isset($_SESSION['campo_email']) || empty($_SESSION['campo_email'])) {
    header("Location: login.php");
}

if ($_SESSION['tip_usu'] != 3) {
    header("Location: pagina_inicial.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/icon_siege.png" />
    <title>SIEGE - Cadastrar</title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/main_nav.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_footer.css">
    <link rel="stylesheet" type="text/css" href="CSS/modal.css">
    <link rel="stylesheet" type="text/css" href="CSS/cadastrar.css">
    <link rel="stylesheet" type="text/css" href="CSS/box.css">
    <link rel="stylesheet" type="text/css" href="CSS/modulos.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="JS/modal-cadastrar.js" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    include('componentes/main_nav.php');
    ?>

    <main>
        <h1 class="titulo-principal centralizar-texto">Cadastrar novos usuários</h1>

        <div class="toRegister-box">
            <p style="margin-bottom: 25px;margin-top: -20px;font-weight: bold;font-size: 21.5px;">Qual tipo de usuário gostaria de cadastrar?</p>

            <br>
            <p style="margin-bottom: 20px;text-decoration: underline;font-size: 18.5px;">Gerenciadores</p>
            <div class="buttons-group" style="margin-bottom: 50px;">
                <div class="cdt_btns">
                    <h3 class="titulo_btn">Diretor(a) e vice</h3>
                    <img src="img/icon_diretores.png" class="icons_cdt" draggable="false">
                    <button class="option" id="diretor">Cadastrar</button>
                </div>
                <div class="cdt_btns">
                    <h3 class="titulo_btn">Supervisor(a)</h3>
                    <img src="img/icon_supervisores.png" class="icons_cdt" draggable="false">
                    <button class="option" id="supervisor">Cadastrar</button>
                </div>
                <div class="cdt_btns">
                    <h3 class="titulo_btn">Secretário(a)</h3>
                    <img src="img/icon_secretarios.png" class="icons_cdt" draggable="false">
                    <button class="option" id="secretario">Cadastrar</button>
                </div>
            </div>

            <p style="margin-bottom:20px;margin-top: 25px;text-decoration: underline;font-size: 18.5px;">Docentes e Discentes</p>
            <div class="buttons-group" style="margin-bottom: 50px;">
                <div class="cdt_btns">
                    <h3 class="titulo_btn">Professor(a)</h3>
                    <img src="img/icon_professores.png" class="icons_cdt" draggable="false">
                    <button class="option" id="professor">Cadastrar</button>
                </div>
                <div class="cdt_btns">
                    <h3 class="titulo_btn">Aluno(a)</h3>
                    <img src="img/icon_alunos.png" class="icons_cdt" draggable="false">
                    <button class="option" id="aluno">Cadastrar</button>
                </div>
            </div>

            <p style="margin-bottom:20px;margin-top: 25px;text-decoration: underline;font-size: 18.5px;">Outros cadastros:</p>
            <div class="buttons-group" style="margin-bottom: 50px;">
                <div class="cdt_btns_2">
                    <h3 class="titulo_btn_2">Turma</h3>
                    <img src="img/icon_turmas2.png" class="icons_cdt" draggable="false">
                    <button class="option option_2" id="turma">Cadastrar</button>
                </div>
                <div class="cdt_btns_2">
                    <h3 class="titulo_btn_2">Disciplina</h3>
                    <img src="img/icon_disciplinas.png" class="icons_cdt" draggable="false">
                    <button class="option option_2" id="disciplina">Cadastrar</button>
                </div>
            </div>
        </div>

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
