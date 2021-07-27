<!DOCTYPE html>
<html lang="pt-br">

<head>
    <META charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIEGE - Ferramentas</title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/user_main.css">
    <link rel="stylesheet" type="text/css" href="CSS/cadastrar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    
    <?php
        include ('componentes/user_nav.php');
    ?>

    <h1 class="titulo-principal"> Ferramentas </h1>
    <br>

    <div class="buttons-group" style="margin-top:25px;">
        <a href="https://classroom.google.com/" target="area"><button>Google Classroom</button></a>
        <a href="https://jamboard.google.com/" target="area"><button>Google Jamboard</button></a>
        <a href="https://meet.google.com/" target="area"><button>Google Meet</button></a>
        <a href="https://mail.google.com/" target="area"><button>Gmail</button></a>
    </div>

    <div class="buttons-group" style="margin-top:30px;">
        <a href="https://simave.educacao.mg.gov.br/#!/pagina-inicial" target="area"><button>Simave</button></a>
        <a href="https://www2.educacao.mg.gov.br/" target="area"><button>Secretaria de Educação - MG</button></a>
    </div>

    <div class="buttons-group" style="margin-top:30px;">
        <a href="https://www.facebook.com/" target="area"><button>Facebook</button></a>
        <a href="https://www.instagram.com/" target="area"><button>Instagram</button></a>
        <a href="https://web.whatsapp.com/" target="area"><button>WhatsApp Web</button></a>
    </div>

    <center>
	<iframe name="area" src="https://www.extreme-e.com/" height="750px" width="95%" style="margin-top: 30px; border:2px solid black;"></iframe>
    </center>
</body>

</html>