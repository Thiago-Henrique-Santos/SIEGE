<?php
session_start();
if (!isset($_SESSION['campo_email']) || empty($_SESSION['campo_email'])) {
    header("Location: login.php");
}

if ($_SESSION['tip_usu'] == 1) {
    header("Location: pagina_inicial.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <META charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/icon_siege.png" />
    <title>SIEGE - Ferramentas</title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/ferramentas.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/main_nav.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_footer.css">
    <link rel="stylesheet" type="text/css" href="CSS/box.css">
    <link rel="stylesheet" type="text/css" href="CSS/modulos.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="module">
        import componentes from 'modulos/componentes.js';
    </script>
</head>

<body>

    <?php
    include('componentes/main_nav.php');
    ?>

    <main>
        <h1 class="titulo-principal"> Ferramentas </h1>
        <br>

        <button onclick="<?php echo "componentes.displayAlert('Cadastro repetido!', 'Testando');"; ?>" id='btn_tst'>Teste</button>

        <div class="buttons-group" style="margin-top:10px;">
            <a href="https://classroom.google.com/" target="_blank">
                <button class="sites">
                    <img src="img/logo_classroom.png" class="img_tools" title="Google Classroom" alt="Logo Google Sala de Aula">
                </button>
            </a>
            <a href="https://jamboard.google.com/" target="_blank">
                <button class="sites">
                    <img src="img/logo_jamboard.png" class="img_tools" title="Google Jamboard" alt="Logo Google Jamboard">
                </button>
            </a>
            <a href="https://meet.google.com/" target="_blank">
                <button class="sites">
                    <img src="img/logo_meet.png" class="img_tools" title="Google Meet" alt="Logo Google Meet">
                </button>
            </a>
            <a href="https://mail.google.com/" target="_blank">
                <button class="sites">
                    <img src="img/logo_gmail.png" class="img_tools" title="Gmail" alt="Logo Gmail">
                </button>
            </a>
            <a href="https://drive.google.com/" target="_blank">
                <button class="sites">
                    <img src="img/logo_drive.png" class="img_tools" title="Google Drive" alt="Logo Google Drive">
                </button>
            </a>
            <a href="https://calendar.google.com/" target="_blank">
                <button class="sites">
                    <img src="img/logo_calendar.png" class="img_tools" title="Google Calendar" alt="Logo Google Calendar">
                </button>
            </a>
        </div>

        <div class="buttons-group" style="margin-top:20px;">
            <a href="https://docs.google.com/" target="_blank">
                <button class="sites">
                    <img src="img/logo_docs.png" class="img_tools" title="Google Docs" alt="Logo Google Docs">
                </button>
            </a>
            <a href="https://docs.google.com/presentation/" target="_blank">
                <button class="sites">
                    <img src="img/logo_slides.png" class="img_tools" title="Google Slides" alt="Logo Google Slides">
                </button>
            </a>
            <a href="https://docs.google.com/spreadsheets/" target="_blank">
                <button class="sites">
                    <img src="img/logo_sheets.png" class="img_tools" title="Google Sheets" alt="Logo Google Sheets">
                </button>
            </a>
            <a href="https://docs.google.com/forms/" target="_blank">
                <button class="sites">
                    <img src="img/logo_forms.png" class="img_tools" title="Google Forms" alt="Logo Google Forms">
                </button>
            </a>
        </div>

        <div class="buttons-group" style="margin-top:20px;">
            <a href="https://wordwall.net/pt" target="_blank">
                <button class="sites">
                    <img src="img/logo_wordwall.png" class="img_tools" title="Wordwall" alt="Logo Wordwall">
                </button>
            </a>
            <a href="https://www.escolagames.com.br/" target="_blank">
                <button class="sites">
                    <img src="img/logo_escolagames.png" class="img_tools" title="Escola Games" alt="Logo Escola Games">
                </button>
            </a>
        </div>

        <div class="buttons-group" style="margin-top:20px;">
            <a href="https://simave.educacao.mg.gov.br/#!/pagina-inicial" target="_blank">
                <button class="sites">
                    <img src="img/logo_simave.png" class="img_tools" title="Simave" alt="Logo Simave">
                </button>
            </a>
            <a href="https://www2.educacao.mg.gov.br/" target="_blank">
                <button class="sites">
                    <img src="img/logo_secretaria.png" class="img_tools" title="Secretaria de Educação - MG" alt="Logo Secretaria de Educação MG">
                </button>
            </a>
            <a href="https://www.gov.br/pt-br" target="_blank">
                <button class="sites">
                    <img src="img/logo_gov.png" class="img_tools" title="Gov.br" alt="Logo Gov.br">
                </button>
            </a>

        </div>

        <div class="buttons-group" style="margin-top:20px;">
            <a href="https://www.facebook.com/escolajuvenalbrandao" target="_blank">
                <button class="sites">
                    <img src="img/logo_facebook.png" class="img_tools" title="Facebook" alt="Logo Facebook">
                </button>
            </a>
            <a href="https://www.messenger.com/" target="_blank">
                <button class="sites">
                    <img src="img/logo_messenger.png" class="img_tools" title="Messenger" alt="Logo Messenger">
                </button>
            </a>
            <a href="https://www.instagram.com/escolajuvenalbrandao/" target="_blank">
                <button class="sites">
                    <img src="img/logo_instagram.png" class="img_tools" title="Instagram" alt="Logo Instagram">
                </button>
            </a>
            <a href="https://web.whatsapp.com/" target="_blank">
                <button class="sites">
                    <img src="img/logo_whatsapp.png" class="img_tools" title="WhatsApp Web" alt="Logo WhatsApp Web">
                </button>
            </a>
        </div>

        <?php
        include('componentes/user_footer.php');
        ?>

    </main>
</body>

</html>