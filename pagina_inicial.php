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
    <title>Página Inicial </title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/menu_pagina_inicial.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_footer.css">
    <link rel="stylesheet" type="text/css" href="CSS/box.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="flex-container">

        <nav>
            <ul>
                <a href='pagina_inicial.php'> <img class='logo_menu' src='img/logo_transparente2.png' alt='Logo do sistema' /> </a>
            </ul>
        </nav>

        <main>
            <div style="width: 100%; height: 120px; display: flex; 
            flex-flow: row nowrap; justify-content: center;">
                <h1 class="titulo-principal"> Página Inicial</h1>
            </div>

            <?php
            if ($_SESSION['sx'] == 'F')
                echo "<h4 style='margin-bottom: 34px; margin-top: -54px; text-align: center;'>Seja bem-vinda ao SIEGE</h4>";
            else
                echo "<h4 style='margin-bottom: 34px; margin-top: -54px; text-align: center;'>Seja bem-vindo ao SIEGE</h4>";
            ?>

            <div class="buttons-group">

                <?php
                if ($_SESSION['tip_usu'] == 3) {
                    echo "<div class='pi_btns'>";
                    echo "<h3 class='titulo_btn'>Cadastrar</h3>"; //Cadastrar
                    echo "<hr class='separador'>";
                    echo "<center>";
                    echo "<div class='descr_pi'>";
                    echo "<p class='txt_descr_pi'>";
                    echo "Cadastre usuários para acessar o sistema, como funcionários (gerenciadores e professores) e alunos, além também de turmas e disciplinas.";
                    echo "</p>";
                    echo "</div>";
                    echo "<img class='icons_pi' draggable='false' src='img/icon_cadastrar.png'>";
                    echo "</center>";
                    echo "<a href='cadastrar.php'>";
                    echo "<button class='btn_pi'>Acessar</button>";
                    echo "</a>";
                    echo "</div>";
                    echo "<div class='pi_btns'>";
                    echo "<h3 class='titulo_btn'>Ferramentas</h3>"; //Ferramentas
                    echo "<hr class='separador'>";
                    echo "<center>";
                    echo "<div class='descr_pi'>";
                    echo "<p class='txt_descr_pi'>";
                    echo "Página criada com o intuito de facilitar o acesso a páginas, aplicativos e ferramentas digitais para professores e gerenciadores, apenas em um botão.";
                    echo "</p>";
                    echo "</div>";
                    echo "<img class='icons_pi' draggable='false' src='img/icon_ferramentas.png'>";
                    echo "</center>";
                    echo "<a href='ferramentas.php'>";
                    echo "<button class='btn_pi'>Acessar</button>";
                    echo "</a>";
                    echo "</div>";
                    echo "</div>"; //Fecha a div class='buttons-group'
                    echo "<div class='buttons-group' style='margin-top:28px;'>";
                    echo "<div class='pi_btns'>";
                    echo "<h3 class='titulo_btn'>Usuários</h3>"; //Usuários
                    echo "<hr class='separador'>";
                    echo "<center>";
                    echo "<div class='descr_pi'>";
                    echo "<p class='txt_descr_pi'>";
                    echo "Consulte os usuários cadastrados, além de atualizá-los e excluí-los. Há opções de filtros e de gerar PDFs de acordo com a opção escolhida também.";
                    echo "</p>";
                    echo "</div>";
                    echo "<img class='icons_pi' draggable='false' src='img/icon_usuarios.png'>";
                    echo "</center>";
                    echo "<a href='usuarios.php'>";
                    echo "<button class='btn_pi'>Acessar</button>";
                    echo "</a>";
                    echo "</div>";
                    echo "<div class='pi_btns'>";
                    echo "<h3 class='titulo_btn'>Turmas</h3>"; //Turmas
                    echo "<hr class='separador'>";
                    echo "<center>";
                    echo "<div class='descr_pi'>";
                    echo "<p class='txt_descr_pi'>";
                    echo "Consulte as turmas cadastradas, observando as disciplinas e seus respectivos professores, além de visualizar os alunos e de gerar PDFs também.";
                    echo "</p>";
                    echo "</div>";
                    echo "<img class='icons_pi' draggable='false' src='img/icon_turmas.png'>";
                    echo "</center>";
                    echo "<a href='turmas.php'>";
                    echo "<button class='btn_pi'>Acessar</button>";
                    echo "</a>";
                    echo "</div>";
                    echo "<div class='pi_btns'>";
                    echo "<h3 class='titulo_btn'>Boletins</h3>"; //Boletins
                    echo "<hr class='separador'>";
                    echo "<center>";
                    echo "<div class='descr_pi'>";
                    echo "<p class='txt_descr_pi'>";
                    echo "Acesse os boletins das turmas em cada disciplina, podendo, também, inserir as notas e faltas de cada aluno e, ao final, postá-las no sistema.";
                    echo "</p>";
                    echo "</div>";
                    echo "<img class='icons_pi' draggable='false' src='img/icon_boletim.png'>";
                    echo "</center>";
                    echo "<a href='boletim.php'>";
                    echo "<button class='btn_pi'>Acessar</button>";
                    echo "</a>";
                    echo "</div>";
                } elseif ($_SESSION['tip_usu'] == 2) {
                    echo "<div class='pi_btns'>";
                    echo "<h3 class='titulo_btn'>Ferramentas</h3>"; //Ferramentas
                    echo "<hr class='separador'>";
                    echo "<center>";
                    echo "<div class='descr_pi'>";
                    echo "<p class='txt_descr_pi'>";
                    echo "Página criada com o intuito de facilitar o acesso a páginas, aplicativos e ferramentas digitais para professores e gerenciadores, apenas em um botão.";
                    echo "</p>";
                    echo "</div>";
                    echo "<img class='icons_pi' draggable='false' src='img/icon_ferramentas.png'>";
                    echo "</center>";
                    echo "<a href='ferramentas.php'>";
                    echo "<button class='btn_pi'>Acessar</button>";
                    echo "</a>";
                    echo "</div>";
                    echo "<div class='pi_btns'>";
                    echo "<h3 class='titulo_btn'>Usuários</h3>"; //Usuários
                    echo "<hr class='separador'>";
                    echo "<center>";
                    echo "<div class='descr_pi'>";
                    echo "<p class='txt_descr_pi'>";
                    echo "Consulte os usuários cadastrados. Há opções de filtros por ocupação e pela barra de pesquisa também, pesquisando pelo nome ou por outro atributo.";
                    echo "</p>";
                    echo "</div>";
                    echo "<img class='icons_pi' draggable='false' src='img/icon_usuarios.png'>";
                    echo "</center>";
                    echo "<a href='usuarios.php'>";
                    echo "<button class='btn_pi'>Acessar</button>";
                    echo "</a>";
                    echo "</div>";
                    echo "</div>"; //Fecha a div class='buttons-group'
                    echo "<div class='buttons-group' style='margin-top:20px;'>";
                    echo "<div class='pi_btns'>";
                    echo "<h3 class='titulo_btn'>Turmas</h3>"; //Turmas
                    echo "<hr class='separador'>";
                    echo "<center>";
                    echo "<div class='descr_pi'>";
                    echo "<p class='txt_descr_pi'>";
                    echo "Consulte as turmas cadastradas, observando as disciplinas e seus respectivos professores, além de visualizar os alunos de cada turma também.";
                    echo "</p>";
                    echo "</div>";
                    echo "<img class='icons_pi' draggable='false' src='img/icon_turmas.png'>";
                    echo "</center>";
                    echo "<a href='turmas.php'>";
                    echo "<button class='btn_pi'>Acessar</button>";
                    echo "</a>";
                    echo "</div>";
                    echo "<div class='pi_btns'>";
                    echo "<h3 class='titulo_btn'>Boletins</h3>"; //Boletins
                    echo "<hr class='separador'>";
                    echo "<center>";
                    echo "<div class='descr_pi'>";
                    echo "<p class='txt_descr_pi'>";
                    echo "Acesse os boletins das turmas em cada disciplina ministrada, podendo, também, inserir as notas e faltas de cada aluno e, ao final, postá-las no sistema.";
                    echo "</p>";
                    echo "</div>";
                    echo "<img class='icons_pi' draggable='false' src='img/icon_boletim.png'>";
                    echo "</center>";
                    echo "<a href='boletim.php'>";
                    echo "<button class='btn_pi'>Acessar</button>";
                    echo "</a>";
                    echo "</div>";
                } elseif ($_SESSION['tip_usu'] == 1) {
                    echo "<div class='pi_btns'>";
                    echo "<h3 class='titulo_btn'>Pessoas</h3>"; //Pessoas
                    echo "<hr class='separador'>";
                    echo "<center>";
                    echo "<div class='descr_pi'>";
                    echo "<p class='txt_descr_pi'>";
                    echo "Consulte os professores e alunos da sua turma, além dos diretores e vices. Você também pode filtrar pela ocupação e pesquisar pela barra de pesquisa.";
                    echo "</p>";
                    echo "</div>";
                    echo "<img class='icons_pi' draggable='false' src='img/icon_usuarios.png'>";
                    echo "</center>";
                    echo "<a href='usuarios.php'>";
                    echo "<button class='btn_pi'>Acessar</button>";
                    echo "</a>";
                    echo "</div>";
                    echo "<div class='pi_btns'>";
                    echo "<h3 class='titulo_btn'>Turma</h3>"; //Turma
                    echo "<hr class='separador'>";
                    echo "<center>";
                    echo "<div class='descr_pi'>";
                    echo "<p class='txt_descr_pi'>";
                    echo "Consulte os membros da sua turma, como os alunos e as disciplinas vinculadas com os professores, contendo os mesmos filtros da página de pessoas.";
                    echo "</p>";
                    echo "</div>";
                    echo "<img class='icons_pi' draggable='false' src='img/icon_turmas.png'>";
                    echo "</center>";
                    echo "<a href='turmas.php'>";
                    echo "<button class='btn_pi'>Acessar</button>";
                    echo "</a>";
                    echo "</div>";
                    echo "<div class='pi_btns'>";
                    echo "<h3 class='titulo_btn'>Boletim</h3>"; //Boletim
                    echo "<hr class='separador'>";
                    echo "<center>";
                    echo "<div class='descr_pi'>";
                    echo "<p class='txt_descr_pi'>";
                    echo "Acesse e consulte as suas notas e faltas bimestrais, notal final, faltas finais e as situações para cada disciplina. Você também pode gerar o PDF e imprimi-lo.";
                    echo "</p>";
                    echo "</div>";
                    echo "<img class='icons_pi' draggable='false' src='img/icon_boletim.png'>";
                    echo "</center>";
                    echo "<a href='boletim.php'>";
                    echo "<button class='btn_pi'>Acessar</button>";
                    echo "</a>";
                    echo "</div>";
                }
                ?>

                <!--Fecha a div class='buttons-group'-->
            </div>

            <div class="buttons-group" style="margin-top:55px;">
                <a href='sair.php'>
                    <button class='btn_sair'>Sair <img class='img_logout' draggable='false' src='img/logout.png'></button>
                </a>
            </div>

            <?php
            include('componentes/user_footer.php');
            ?>
        </main>
    </div>

</body>


</html>