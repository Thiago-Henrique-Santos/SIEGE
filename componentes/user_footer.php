<?php

$anoAtual = date("Y");
if ($_SESSION['tip_usu'] == 3) {

    echo "<footer class='footer'>";
    echo "<div class='inner-footer'>";
    echo "<div class='div_logo_footer'>";
    echo "<a class='link_hide' href='pagina_inicial.php'>";
    echo "<img src='img/logo_transparente2.png'>";
    echo "</a>";
    echo "</div>";
    echo "<div class='quick-links'>";
    echo "<ul>";
    echo "<li class='quick-items'><a href='cadastrar.php'><span class='links_footer'>Cadastrar</span></a></li>";
    echo "<li class='quick-items'><a href='ferramentas.php'><span class='links_footer'>Ferramentas</span></a></li>";
    echo "<li class='quick-items'><a href='usuarios.php'><span class='links_footer'>Usuários</span></a></li>";
    echo "<li class='quick-items'><a href='turmas.php'><span class='links_footer'>Turmas</span></a></li>";
    echo "<li class='quick-items'><a href='boletim.php'><span class='links_footer'>Boletins</span></a></li>";
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    echo "<div class='outer-footer'>";
    echo "SIEGE - Sistema Informativo E Gerenciamento Escolar - " . $anoAtual;
    echo "</div>";
    echo "<div class='outer-footer'>";
    echo "Desenvolvido por alunos do IF Sul de Minas - Campus Inconfidentes - 2021";
    echo "</div>";
    echo "</footer>";
} elseif ($_SESSION['tip_usu'] == 2) {

    echo "<footer class='footer'>";
    echo "<div class='inner-footer'>";
    echo "<div class='div_logo_footer'>";
    echo "<a class='link_hide' href='pagina_inicial.php'>";
    echo "<img src='img/logo_transparente2.png'>";
    echo "</a>";
    echo "</div>";
    echo "<div class='quick-links'>";
    echo "<ul>";
    echo "<li class='quick-items'><a href='ferramentas.php'><span class='links_footer'>Ferramentas</span></a></li>";
    echo "<li class='quick-items'><a href='usuarios.php'><span class='links_footer'>Usuários</span></a></li>";
    echo "<li class='quick-items'><a href='turmas.php'><span class='links_footer'>Turmas</span></a></li>";
    echo "<li class='quick-items'><a href='boletim.php'><span class='links_footer'>Boletins</span></a></li>";
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    echo "<div class='outer-footer'>";
    echo "SIEGE - Sistema Informativo E Gerenciamento Escolar - " . $anoAtual;
    echo "</div>";
    echo "<div class='outer-footer'>";
    echo "Desenvolvido por alunos do IF Sul de Minas - Campus Inconfidentes - 2021";
    echo "</div>";
    echo "</footer>";
} else {

    echo "<footer class='footer'>";
    echo "<div class='inner-footer'>";
    echo "<div class='div_logo_footer'>";
    echo "<a class='link_hide' href='pagina_inicial.php'>";
    echo "<img src='img/logo_transparente2.png'>";
    echo "</a>";
    echo "</div>";
    echo "<div class='quick-links'>";
    echo "<ul>";
    echo "<li class='quick-items'><a href='usuarios.php'><span class='links_footer'>Pessoas</span></a></li>";
    echo "<li class='quick-items'><a href='turmas.php'><span class='links_footer'>Turma</span></a></li>";
    echo "<li class='quick-items'><a href='boletim.php'><span class='links_footer'>Boletim</span></a></li>";
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    echo "<div class='outer-footer'>";
    echo "SIEGE - Sistema Informativo E Gerenciamento Escolar - " . $anoAtual;
    echo "</div>";
    echo "<div class='outer-footer'>";
    echo "Desenvolvido por alunos do IF Sul de Minas - Campus Inconfidentes - 2021";
    echo "</div>";
    echo "</footer>";
}
