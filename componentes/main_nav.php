<?php
$paginaAtual = basename($_SERVER['SCRIPT_NAME']);

if ($_SESSION['tip_usu'] == 3) {

    echo "<input type='checkbox' id='check'>";
    echo "<label for='check'>";
    echo "<div id='entorno_btn'>";
    echo "<center>";
    echo "<i class='fas fa-bars' id='btn'></i>";
    echo "</center>";
    echo "</div>";
    echo "<i class='fas fa-times' id='fechar_menu'></i>";
    echo "</label>";

    echo "<div class='sidebar'>";
    echo "<header><a class='link_hide' href='pagina_inicial.php'><img src='img/logo_transparente2.png' alt='Logo do sistema'></a></header>";
    echo "<ul>";
    if ($paginaAtual == 'cadastrar.php') {
        echo "<li class='paginaAtual'><a href='cadastrar.php'><i class='fas fa-plus-circle'></i>Cadastrar</a></li>";
    } else {
        echo "<li><a href='cadastrar.php'><i class='fas fa-plus-circle'></i>Cadastrar</a></li>";
    }

    if ($paginaAtual == 'ferramentas.php') {
        echo "<li class='paginaAtual'><a href='ferramentas.php'><i class='fas fa-desktop'></i>Ferramentas</a></li>";
    } else {
        echo "<li><a href='ferramentas.php'><i class='fas fa-desktop'></i>Ferramentas</a></li>";
    }

    if ($paginaAtual == 'usuarios.php') {
        echo "<li class='paginaAtual'><a href='usuarios.php'><i class='fas fa-users'></i>Usuários</a></li>";
    } else {
        echo "<li><a href='usuarios.php'><i class='fas fa-users'></i>Usuários</a></li>";
    }

    if ($paginaAtual == 'turmas.php') {
        echo "<li class='paginaAtual'><a href='turmas.php'><i class='fas fa-chalkboard-teacher'></i>Turmas</a></li>";
    } else {
        echo "<li><a href='turmas.php'><i class='fas fa-chalkboard-teacher'></i>Turmas</a></li>";
    }

    if ($paginaAtual == 'boletim.php') {
        echo "<li class='paginaAtual'><a href='boletim.php'><i class='fas fa-file-invoice'></i>Boletins</a></li>";
    } else {
        echo "<li><a href='boletim.php'><i class='fas fa-file-invoice'></i>Boletins</a></li>";
    }

    echo "<center>";
    echo "<a href='sair.php' class='no_border'><button class='btn_sair'><span class='nm_btn'>Sair</span><img class='img_logout' draggable='false' src='img/logout.png'></button></a>";
    echo "</center>";
    echo "</ul>";
    echo "</div>";
} elseif ($_SESSION['tip_usu'] == 2) {

    echo "<input type='checkbox' id='check'>";
    echo "<label for='check'>";
    echo "<div id='entorno_btn'>";
    echo "<center>";
    echo "<i class='fas fa-bars' id='btn'></i>";
    echo "</center>";
    echo "</div>";
    echo "<i class='fas fa-times' id='fechar_menu'></i>";
    echo "</label>";

    echo "<div class='sidebar'>";
    echo "<header><a class='link_hide' href='pagina_inicial.php'><img src='img/logo_transparente2.png' alt='Logo do sistema'></a></header>";
    echo "<ul>";

    if ($paginaAtual == 'ferramentas.php') {
        echo "<li class='paginaAtual'><a href='ferramentas.php'><i class='fas fa-desktop'></i>Ferramentas</a></li>";
    } else {
        echo "<li><a href='ferramentas.php'><i class='fas fa-desktop'></i>Ferramentas</a></li>";
    }

    if ($paginaAtual == 'usuarios.php') {
        echo "<li class='paginaAtual'><a href='usuarios.php'><i class='fas fa-users'></i>Usuários</a></li>";
    } else {
        echo "<li><a href='usuarios.php'><i class='fas fa-users'></i>Usuários</a></li>";
    }

    if ($paginaAtual == 'turmas.php') {
        echo "<li class='paginaAtual'><a href='turmas.php'><i class='fas fa-chalkboard-teacher'></i>Turmas</a></li>";
    } else {
        echo "<li><a href='turmas.php'><i class='fas fa-chalkboard-teacher'></i>Turmas</a></li>";
    }

    if ($paginaAtual == 'boletim.php') {
        echo "<li class='paginaAtual'><a href='boletim.php'><i class='fas fa-file-invoice'></i>Boletins</a></li>";
    } else {
        echo "<li><a href='boletim.php'><i class='fas fa-file-invoice'></i>Boletins</a></li>";
    }

    echo "<center>";
    echo "<a href='sair.php' class='no_border'><button class='btn_sair'><span class='nm_btn'>Sair</span><img class='img_logout' draggable='false' src='img/logout.png'></button></a>";
    echo "</center>";
    echo "</ul>";
    echo "</div>";
} else {

    echo "<input type='checkbox' id='check'>";
    echo "<label for='check'>";
    echo "<div id='entorno_btn'>";
    echo "<center>";
    echo "<i class='fas fa-bars' id='btn'></i>";
    echo "</center>";
    echo "</div>";
    echo "<i class='fas fa-times' id='fechar_menu'></i>";
    echo "</label>";

    echo "<div class='sidebar'>";
    echo "<header><a class='link_hide' href='pagina_inicial.php'><img src='img/logo_transparente2.png' alt='Logo do sistema'></a></header>";
    echo "<ul>";

    if ($paginaAtual == 'usuarios.php') {
        echo "<li class='paginaAtual'><a href='usuarios.php'><i class='fas fa-users'></i>Pessoas</a></li>";
    } else {
        echo "<li><a href='usuarios.php'><i class='fas fa-users'></i>Pessoas</a></li>";
    }

    if ($paginaAtual == 'turmas.php') {
        echo "<li class='paginaAtual'><a href='turmas.php'><i class='fas fa-chalkboard-teacher'></i>Turma</a></li>";
    } else {
        echo "<li><a href='turmas.php'><i class='fas fa-chalkboard-teacher'></i>Turma</a></li>";
    }

    if ($paginaAtual == 'boletim.php') {
        echo "<li class='paginaAtual'><a href='boletim.php'><i class='fas fa-file-invoice'></i>Boletim</a></li>";
    } else {
        echo "<li><a href='boletim.php'><i class='fas fa-file-invoice'></i>Boletim</a></li>";
    }

    echo "<center>";
    echo "<a href='sair.php' class='no_border'><button class='btn_sair'><span class='nm_btn'>Sair</span><img class='img_logout' draggable='false' src='img/logout.png'></button></a>";
    echo "</center>";
    echo "</ul>";
    echo "</div>";
}

?>
<!-- //<!DOCTYPE html> -->