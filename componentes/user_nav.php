<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIEGE - Visão para diretor e vice-diretor </title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<?php
    echo "<nav>";
    echo "<a href='pagina_inicial.php'>";
        echo "<img src='img/logo_transparente2.png' alt='Logo do sistema'>";
    echo "</a>";
    echo "<ul>";
        echo "<li> <a href='cadastrar.php'>Cadastrar</a> </li>";
        echo "<li> <a href='boletim.php'>Boletins</a> </li>";
        echo "<li> <a href='ferramentas.php'>Ferramentas</a> </li>";
        echo "<li> <a href='registros.php'>Registros</a> </li>";
        echo "<li> <a href='cadastrar_noticias.php'>Notícias</a> </li>";
        echo "<li> <a href='index.php'>Sair</a> </li>";
    echo "</ul>";
    echo "</nav>";
?>