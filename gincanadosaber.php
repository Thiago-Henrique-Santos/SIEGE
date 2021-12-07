<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/logo_juvenal.png" />
    <title>SIEGE - Gincana do Saber</title>
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
                <h1 class="titulo-principal"> Gincana do Saber </h1>
            </div>

            <section id='section_acontecimentos'>
                <p class='first_text'>A E.E. Professor Juvenal Brandão conquistou nos últimos anos o primeiro lugar Municipal e Regional da Gincana do Saber. A Gincana do Saber é um jogo entre escolas, de perguntas e respostas, de caráter educativo e não competitivo, em que todos saem ganhando conhecimento sobre a Constituição Federal de uma forma divertida, através da publicação Constituição em Miúdos.</p>

                <div class="row">
                    <center>
                        <div class="col-sm-6">
                            <div class="card mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="img/saber1.jpg" class="card-img-top" alt="...">
                                        <h5 class="card-title">Premiação Regional 2018</h5>
                                        <p class="card-text">As alunas Amanda e Giovanna representaram muito bem a nossa instituição.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>

                    <center>
                        <div class="col-sm-6">
                            <div class="card mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="img/saber2.jpg" class="card-img-top" alt="...">
                                        <h5 class="card-title">Premiação Municipal 2019</h5>
                                        <p class="card-text">Os alunos Kelvin e Maria Luísa representaram a escola na fase municipal e obtiveram êxito.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>
                    <p class='text_individuais'> Liderados pelo professor Flávio, os alunos ficaram por semanas estudando e treinando. Com muito trabalho e dedicação, as duplas se sairam muito bem, ultrapassando as pontuações concorrentes e conquistando os primeiros lugares na gincana.
                        A Escola Estadual Professor Juvenal Brandão parabeniza e reconhece o esforço feito pelos alunos e pelo professor! </p>
                </div>
            </section>
        </main>
    </div>

    <?php
    include('componentes/first_footer.php');
    ?>
</body>

</html>