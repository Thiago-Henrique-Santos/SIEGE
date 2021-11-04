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
    <link rel="stylesheet" type="text/css" href="CSS/cadastrar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
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
                echo "<h4 style='margin-bottom: 120px; margin-top: -40px; text-align: center;'>Seja bem-vinda ao SIEGE</h4>";
            else
                echo "<h4 style='margin-bottom: 120px; margin-top: -40px; text-align: center;'>Seja bem-vinda ao SIEGE</h4>";
            ?>

            <div class="buttons-group" style="margin-top:20px;">

                <?php
                if ($_SESSION['tip_usu'] == 3) {
                    echo "<a href='cadastrar.php'>";
                    echo "<button>Cadastrar</button>";
                    echo "</a>";
                    echo "<a href='ferramentas.php'>";
                    echo "<button>Ferramentas</button>";
                    echo "</a>";
                    echo "<a href='usuarios.php'>";
                    echo "<button>Usuários</button>";
                    echo "</a>";
                    echo "<a href='turmas.php'>";
                    echo "<button>Turmas</button>";
                    echo "</a>";
                    echo "<a href='boletim.php'>";
                    echo "<button>Boletim</button>";
                    echo "</a>";
                } elseif ($_SESSION['tip_usu'] == 2) {
                    echo "<a href='ferramentas.php'>";
                    echo "<button>Ferramentas</button>";
                    echo "</a>";
                    echo "<a href='usuarios.php'>";
                    echo "<button>Usuários</button>";
                    echo "</a>";
                    echo "<a href='turmas.php'>";
                    echo "<button>Turmas</button>";
                    echo "</a>";
                    echo "<a href='boletim.php'>";
                    echo "<button>Boletim</button>";
                    echo "</a>";
                } elseif ($_SESSION['tip_usu'] == 1) {
                    echo "<a href='usuarios.php'>";
                    echo "<button>Pessoas</button>";
                    echo "</a>";
                    echo "<a href='turmas.php'>";
                    echo "<button>Turma</button>";
                    echo "</a>";
                    echo "<a href='boletim.php'>";
                    echo "<button>Boletim</button>";
                    echo "</a>";
                }
                ?>

            </div>

            <div class="buttons-group" style="margin-top:50px;">
                <a href='sair.php'>
                    <button>Sair</button>
                </a>
            </div>

            <br><br>
            <p>Customizar e melhorar o layout, bem como o menu, etc.</p>
        </main>
    </div>

</body>


</html>