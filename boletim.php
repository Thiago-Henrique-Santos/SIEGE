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
    <title>SIEGE - Boletins </title>
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link rel="stylesheet" href="CSS/boletim.css" type="text/css">
    <script src="JS/boletim.js"></script>
    <script src="JS/filtro_boletim.js"></script>
</head>

<body>
    
    <?php
        include ('componentes/user_nav.php');
    ?>

    <h1 class="titulo-principal">Boletim</h1>
    <button id="btn_editar" name="btn_editar" type="button" onclick="toogle_disabled(false)">Editar</button>
    <button id="btn_cancelar" name="btn_cancelar" type="button" onclick="cancel(true)">Cancelar</button>

    <br><br>
    <!--tr = linha, td = coluna-->

    <!-- Tabela na visão de gerenciadores e professores -->
    
        <table class="boletim">

            <!-- ***** Parte Fixa abaixo*****-->
            <tr class="titulo_tabela">
                <td></td>
                <td colspan="2">
                    <h2>1° Bimestre</h2>
                </td>

                <td colspan="2">
                    <h2>2° Bimestre</h2>
                </td>

                <td colspan="2">
                    <h2>3° Bimestre</h2>
                </td>

                <td colspan="2">
                    <h2>4° Bimestre</h2>
                </td>

                <td rowspan="2">
                    <h2>Faltas finais</h2>
                </td>

                <td rowspan="2">
                    <h2>Notas finais</h2>
                </td>

                <td rowspan="2">
                    <h2>Situações</h2>
                </td>
            </tr>

            <tr class="titulo_tabela">
                <td>
                    <h2>Alunos</h2>
                </td>

                <!--1° bimestre-->
                <td>
                    <h2>Faltas</h2>
                </td>

                <td>
                    <h2>Notas</h2>
                </td>

                <!--2° bimestre-->
                <td>
                    <h2>Faltas</h2>
                </td>

                <td>
                    <h2>Notas</h2>
                </td>

                <!--3° bimestre-->
                <td>
                    <h2>Faltas</h2>
                </td>

                <td>
                    <h2>Notas</h2>
                </td>

                <!--4° bimestre-->
                <td>
                    <h2>Faltas</h2>
                </td>

                <td>
                    <h2>Notas</h2>
                </td>

            </tr>

            
        </table>
</body>
</html>