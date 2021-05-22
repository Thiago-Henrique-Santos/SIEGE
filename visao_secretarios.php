<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIEGE - Visão para secretários </title>
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
                <h1 class="titulo-principal"> Página principal para secretários </h1>
            </div>
            <p>Nesta página irá conter a visão inicial dos secretários, com o menu para abrir cada aba(alterar notas,
                visualizar boletins, visualizar ranking, visualizar turmas virtuais, acessar e aprovar o que foi dado em
                aula, calendários e outros).</p>
        </main>
    </div>
    <br><br>

</body>


</html>