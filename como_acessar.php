<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/logo_juvenal.png" />
    <title>Como acessar</title>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <link rel="stylesheet" type="text/css" href="CSS/menu.css">
    <link rel="stylesheet" type="text/css" href="CSS/conquistas_boaspraticas_editais.css">
    <link rel="stylesheet" type="text/css" href="CSS/first_footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="flex-container">
        <?php
        include('componentes/first_nav.php');
        ?>

        <main>
            <div style="width: 100%; height: 50px; display: flex; 
            flex-flow: row nowrap; justify-content: center;">
                <h1 class="titulo-principal"> Como acessar </h1>
            </div>

            <section id='section_acontecimentos'>
                <center>
                    <p class='first_text' style='font-size: 20px;'><strong>Introdução: </strong>Para acessar suas notas e faltas, basta seguir o seguinte passo a passo:</p>
                </center>

                <p class='first_text'><strong>Passo 1: </strong>Ao acessar o site da escola, clique no botão vermelho "ACESSE O SIEGE", localizado no canto superior direito da página.</p>
                <center>
                    <img class='passo_a_passo' src='img/passo1.jpeg'>
                </center>

                <p class='first_text'><strong>Passo 2: </strong>Entrando na página de log-in, preencha os campos com o e-mail e a senha do aluno.</p>
                <center>
                    <img class='passo_a_passo' src='img/passo2.jpeg'>
                </center>

                <p class='first_text'><strong>Passo 3: </strong>Acessando o sistema, clique no botão amarelo "Acessar", no bloco azul "Boletim".</p>
                <center>
                    <img class='passo_a_passo' src='img/passo3.jpeg'>
                </center>

                <p class='first_text'><strong>Passo 4.1: </strong>Pronto! Você já pode visualizar as notas e faltas. (Nesta foto, foram utilizadas notas e faltas inventadas para exemplificar o boletim de um aluno).</p>
                <center>
                    <img class='passo_a_passo' src='img/passo4_1.jpeg'>
                </center>

                <p class='first_text'><strong>Passo 4.2: </strong>Caso você queira visualizar e/ou imprimir o boletim em PDF, basta clicar no botão laranja "Gerar boletim em PDF".</p>
                <center>
                    <img class='passo_a_passo' src='img/passo4_2.jpeg'>
                </center>

                <p class='first_text'><strong>Passo 4.3: </strong>Para baixar o boletim em PDF, basta clicar no botão indicado na imagem pela seta dourada e, para imprimi-lo, clique no botão indicado pela seta marrom. (Como na imagem utilizada no passo 4.1, o nome, os dados e todas as informações expostas são totalmente inventadas).</p>
                <center>
                    <img class='passo_a_passo' src='img/passo4_3.jpeg'>
                </center>
            </section>
        </main>
    </div>

    <?php
    include('componentes/first_footer.php');
    ?>
</body>

</html>