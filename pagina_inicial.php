<?php
    session_start();
    if(!isset($_SESSION['campo_email']) || empty($_SESSION['campo_email'])){
        header ("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/icon_siege.png"/>
    <title>SIEGE - Página Inicial </title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

    <div class="flex-container">

        <?php
            include ('componentes/user_nav.php');
        ?>

        <main>
            <div style="width: 100%; height: 120px; display: flex; 
            flex-flow: row nowrap; justify-content: center;">
                <h1 class="titulo-principal"> Página principal</h1>
            </div>
            <p>Colocar os botões do menu e alterar o menu, colocando apenas a logo do SIEGE</p>
        </main>
    </div>

</body>


</html>