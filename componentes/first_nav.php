<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIEGE - Home </title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<?php
    echo "<nav>";
        echo "<a href='index.php'>";
            echo "<img src='img/logo_transparente.png' alt='Logo do sistema'>";
        echo "</a>";
        echo "<ul>";
            echo "<li> <a href='index.php'>Início</a> </li>";
            echo "<li> <a href='sobre.php'>Sobre</a> </li>";
            echo "<li> <a href='login.php'>Entre</a> </li>";
        echo "</ul>";
    echo "</nav>";
?>