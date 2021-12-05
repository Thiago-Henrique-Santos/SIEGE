<?php
$paginaAtual = basename($_SERVER['SCRIPT_NAME']);

if ($_SESSION['tip_usu'] == 3) {
    echo "<nav>";
    echo "<a href='pagina_inicial.php'>";
    echo "<img src='img/logo_transparente2.png' alt='Logo do sistema'>";
    echo "</a>";
    echo "<ul>";

    if ($paginaAtual == 'cadastrar.php') {
        echo "<li> <a href='cadastrar.php'> <button class='paginaAtual'>Cadastrar</button> </a> </li>";
    } else {
        echo "<li> <a href='cadastrar.php'> <button class='outraPagina'>Cadastrar</button> </a> </li>";
    }

    if ($paginaAtual == 'ferramentas.php') {
        echo "<li> <a href='ferramentas.php'> <button class='paginaAtual'>Ferramentas</button> </a> </li>";
    } else {
        echo "<li> <a href='ferramentas.php'> <button class='outraPagina'>Ferramentas</button> </a> </li>";
    }

    if ($paginaAtual == 'usuarios.php') {
        echo "<li> <a href='usuarios.php'> <button class='paginaAtual'>Usuários</button> </a> </li>";
    } else {
        echo "<li> <a href='usuarios.php'> <button class='outraPagina'>Usuários</button> </a> </li>";
    }

    if ($paginaAtual == 'turmas.php') {
        echo "<li> <a href='turmas.php'> <button class='paginaAtual'>Turmas</button> </a> </li>";
    } else {
        echo "<li> <a href='turmas.php'> <button class='outraPagina'>Turmas</button> </a> </li>";
    }

    if ($paginaAtual == 'boletim.php') {
        echo "<li> <a href='boletim.php'> <button class='paginaAtual'>Boletins</button> </a> </li>";
    } else {
        echo "<li> <a href='boletim.php'> <button class='outraPagina'>Boletins</button> </a> </li>";
    }

    echo "<li> <a href='sair.php'><button class='btn_sair'>Sair  <img class='img_logout' draggable='false' src='img/logout.png'></button></a> </li>";
    echo "</ul>";
    echo "</nav>";
} elseif ($_SESSION['tip_usu'] == 2) {
    echo "<nav>";
    echo "<a href='pagina_inicial.php'>";
    echo "<img src='img/logo_transparente2.png' alt='Logo do sistema'>";
    echo "</a>";
    echo "<ul>";

    if ($paginaAtual == 'ferramentas.php') {
        echo "<li> <a href='ferramentas.php'> <button class='paginaAtual'>Ferramentas</button> </a> </li>";
    } else {
        echo "<li> <a href='ferramentas.php'> <button class='outraPagina'>Ferramentas</button> </a> </li>";
    }

    if ($paginaAtual == 'usuarios.php') {
        echo "<li> <a href='usuarios.php'> <button class='paginaAtual'>Usuários</button> </a> </li>";
    } else {
        echo "<li> <a href='usuarios.php'> <button class='outraPagina'>Usuários</button> </a> </li>";
    }

    if ($paginaAtual == 'turmas.php') {
        echo "<li> <a href='turmas.php'> <button class='paginaAtual'>Turmas</button> </a> </li>";
    } else {
        echo "<li> <a href='turmas.php'> <button class='outraPagina'>Turmas</button> </a> </li>";
    }

    if ($paginaAtual == 'boletim.php') {
        echo "<li> <a href='boletim.php'> <button class='paginaAtual'>Boletins</button> </a> </li>";
    } else {
        echo "<li> <a href='boletim.php'> <button class='outraPagina'>Boletins</button> </a> </li>";
    }

    echo "<li> <a href='sair.php'><button class='btn_sair'>Sair  <img class='img_logout' draggable='false' src='img/logout.png'></button></a> </li>";
    echo "</ul>";
    echo "</nav>";
} elseif ($_SESSION['tip_usu'] == 1) {
    echo "<nav>";
    echo "<a href='pagina_inicial.php'>";
    echo "<img src='img/logo_transparente2.png' alt='Logo do sistema'>";
    echo "</a>";
    echo "<ul>";

    if ($paginaAtual == 'usuarios.php') {
        echo "<li> <a href='usuarios.php'> <button class='paginaAtual'>Pessoas</button> </a> </li>";
    } else {
        echo "<li> <a href='usuarios.php'> <button class='outraPagina'>Pessoas</button> </a> </li>";
    }

    if ($paginaAtual == 'turmas.php') {
        echo "<li> <a href='turmas.php'> <button class='paginaAtual'>Turma</button> </a> </li>";
    } else {
        echo "<li> <a href='turmas.php'> <button class='outraPagina'>Turma</button> </a> </li>";
    }

    if ($paginaAtual == 'boletim.php') {
        echo "<li> <a href='boletim.php'> <button class='paginaAtual'>Boletim</button> </a> </li>";
    } else {
        echo "<li> <a href='boletim.php'> <button class='outraPagina'>Boletim</button> </a> </li>";
    }

    echo "<li> <a href='sair.php'><button class='btn_sair'>Sair  <img class='img_logout' draggable='false' src='img/logout.png'></button></a> </li>";
    echo "</ul>";
    echo "</nav>";
}
