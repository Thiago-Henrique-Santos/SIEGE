<?php
if ($_SESSION['tip_usu'] == 3) {
    echo "<nav>";
    echo "<a href='pagina_inicial.php'>";
    echo "<img src='img/logo_transparente2.png' alt='Logo do sistema'>";
    echo "</a>";
    echo "<ul>";
    echo "<li> <a href='cadastrar.php'>Cadastrar</a> </li>";
    echo "<li> <a href='ferramentas.php'>Ferramentas</a> </li>";
    echo "<li> <a href='usuarios.php'>Usuários</a> </li>";
    echo "<li> <a href='turmas.php'>Turmas</a> </li>";
    echo "<li> <a href='boletim.php'>Boletins</a> </li>";
    echo "<li> <a href='sair.php'><button class='btn_sair'>Sair  <img class='img_logout' draggable='false' src='img/logout.png'></button></a> </li>";
    echo "</ul>";
    echo "</nav>";
} elseif ($_SESSION['tip_usu'] == 2) {
    echo "<nav>";
    echo "<a href='pagina_inicial.php'>";
    echo "<img src='img/logo_transparente2.png' alt='Logo do sistema'>";
    echo "</a>";
    echo "<ul>";
    echo "<li> <a href='ferramentas.php'>Ferramentas</a> </li>";
    echo "<li> <a href='usuarios.php'>Usuários</a> </li>";
    echo "<li> <a href='turmas.php'>Turmas</a> </li>";
    echo "<li> <a href='boletim.php'>Boletins</a> </li>";
    echo "<li> <a href='sair.php'><button class='btn_sair'>Sair  <img class='img_logout' draggable='false' src='img/logout.png'></button></a> </li>";
    echo "</ul>";
    echo "</nav>";
} elseif ($_SESSION['tip_usu'] == 1) {
    echo "<nav>";
    echo "<a href='pagina_inicial.php'>";
    echo "<img src='img/logo_transparente2.png' alt='Logo do sistema'>";
    echo "</a>";
    echo "<ul>";
    echo "<li> <a href='usuarios.php'>Pessoas</a> </li>";
    echo "<li> <a href='turmas.php'>Turma</a> </li>";
    echo "<li> <a href='boletim.php'>Boletim</a> </li>";
    echo "<li> <a href='sair.php'><button class='btn_sair'>Sair  <img class='img_logout' draggable='false' src='img/logout.png'></button></a> </li>";
    echo "</ul>";
    echo "</nav>";
}
