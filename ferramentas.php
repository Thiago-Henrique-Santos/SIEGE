<?php
    session_start();
    if(!isset($_SESSION['campo_email']) || empty($_SESSION['campo_email'])){
        header ("Location: login.php");
    }

    if($_SESSION['tip_usu'] == 1){
        header ("Location: pagina_inicial.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <META charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/icon_siege.png"/>
    <title>SIEGE - Ferramentas</title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/ferramentas.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link rel="stylesheet" type="text/css" href="CSS/cadastrar.css">
    <link rel="stylesheet" type="text/css" href="CSS/modulos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    
    <?php
        include ('componentes/user_nav.php');
    ?>

    <h1 class="titulo-principal"> Ferramentas </h1>
    <br>

    <div class="buttons-group" style="margin-top:20px;">
        <a href="https://classroom.google.com/" target="_blank">
            <button>
                <img src="img/logo_classroom.png" width="200px" height="70px" title="Google Classroom" alt="Logo Google Sala de Aula">
            </button>
        </a>
        <a href="https://jamboard.google.com/" target="_blank">
            <button>
                <img src="img/logo_jamboard.png" width="200px" height="70px" title="Google Jamboard" alt="Logo Google Jamboard">
            </button>
        </a>
        <a href="https://meet.google.com/" target="_blank">
            <button>
                <img src="img/logo_meet.png" width="200px" height="70px" title="Google Meet" alt="Logo Google Meet">
            </button>
        </a>
        <a href="https://mail.google.com/" target="_blank">
            <button>
                <img src="img/logo_gmail.png" width="200px" height="70px" title="Gmail" alt="Logo Gmail">
            </button>
        </a>
        <a href="https://drive.google.com/" target="_blank">
            <button>
                <img src="img/logo_drive.png" width="200px" height="70px" title="Google Drive" alt="Logo Google Drive">
            </button>
        </a>
        <a href="https://calendar.google.com/" target="_blank">
            <button>
                <img src="img/logo_calendar.png" width="200px" height="70px" title="Google Calendar" alt="Logo Google Calendar">
            </button>
        </a>
    </div>

    <div class="buttons-group" style="margin-top:20px;">
        <a href="https://docs.google.com/" target="_blank">
            <button>
                <img src="img/logo_docs.png" width="200px" height="70px" title="Google Docs" alt="Logo Google Docs">
            </button>
        </a>
        <a href="https://docs.google.com/presentation/" target="_blank">
            <button>
                <img src="img/logo_slides.png" width="200px" height="70px" title="Google Slides" alt="Logo Google Slides">
            </button>
        </a>
        <a href="https://docs.google.com/spreadsheets/" target="_blank">
            <button>
                <img src="img/logo_sheets.png" width="200px" height="70px" title="Google Sheets" alt="Logo Google Sheets">
            </button>
        </a>
        <a href="https://docs.google.com/forms/" target="_blank">
            <button>
                <img src="img/logo_forms.png" width="200px" height="70px" title="Google Forms" alt="Logo Google Forms">
            </button>
        </a>
    </div>

    <div class="buttons-group" style="margin-top:20px;">
        <a href="https://wordwall.net/pt" target="_blank">
            <button>
                <img src="img/logo_wordwall.png" width="200px" height="70px" title="Wordwall" alt="Logo Wordwall">
            </button>
        </a>
        <a href="https://www.escolagames.com.br/" target="_blank">
            <button>
                <img src="img/logo_escolagames.png" width="200px" height="70px" title="Escola Games" alt="Logo Escola Games">
            </button>
        </a>
    </div>

    <div class="buttons-group" style="margin-top:20px;">
        <a href="https://simave.educacao.mg.gov.br/#!/pagina-inicial" target="_blank">
            <button>
                <img src="img/logo_simave.png" width="200px" height="70px" title="Simave" alt="Logo Simave">
            </button>
        </a>
        <a href="https://www2.educacao.mg.gov.br/" target="_blank">
            <button>
                <img src="img/logo_secretaria.png" width="200px" height="70px" title="Secretaria de Educação - MG" alt="Logo Secretaria de Educação MG">
            </button>
        </a>
        <a href="https://www.gov.br/pt-br" target="_blank">
            <button>
                <img src="img/logo_gov.png" width="200px" height="70px" title="Gov.br" alt="Logo Gov.br">
            </button>
        </a>
        
    </div>

    <div class="buttons-group" style="margin-top:20px;">
        <a href="https://www.facebook.com/escolajuvenalbrandao" target="_blank">
            <button>
                <img src="img/logo_facebook.png" width="200px" height="70px" title="Facebook" alt="Logo Facebook">
            </button>
        </a>
        <a href="https://www.messenger.com/" target="_blank">
            <button>
                <img src="img/logo_messenger.png" width="200px" height="70px" title="Messenger" alt="Logo Messenger">
            </button>
        </a>
        <a href="https://www.instagram.com/escolajuvenalbrandao/" target="_blank">
            <button>
                <img src="img/logo_instagram.png" width="200px" height="70px" title="Instagram" alt="Logo Instagram">
            </button>
        </a>
        <a href="https://web.whatsapp.com/" target="_blank">
            <button>
                <img src="img/logo_whatsapp.png" width="200px" height="70px" title="WhatsApp Web" alt="Logo WhatsApp Web">
            </button>
        </a>
    </div>
</body>

</html>