<?php
    include('modulos/funcoes.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/logo_juvenal.png" />
    <?php
    if (isset($_GET['materia'])) {
        $materia = $_GET['materia'];
    } else {
        $materia = false;
    }

    switch ($materia) {
        case 'EducacaoParaAVida':
            echo "<title> Educação para a Vida </title>";
            break;

        case 'PremiacaoGincanaDoSaber':
            echo "<title> Gincana do Saber </title>";
            break;

        default:
            echo "<title> Ops... </title>";
            break;
    }
    ?>
    <link rel="stylesheet" type="text/css" href="CSS/reset.css">
    <link rel="stylesheet" type="text/css" href="CSS/texto.css">
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <link rel="stylesheet" type="text/css" href="CSS/menu.css">
    <link rel="stylesheet" type="text/css" href="CSS/notificacoes.css">
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
        <?php
            switch ($materia) {
                case 'EducacaoParaAVida':
                    echo "<div style='width: 100%; height: 50px; display: flex; flex-flow: row nowrap; justify-content: center;'>
                    <h1 class='titulo-principal'> Educação para a vida </h1>
                    </div>
                    <section id='section_acontecimentos'>
                        <p class='first_text'>A E.E. Professor Juvenal Brandão desenvolve a prática cívica num processo participativo, individual e coletivo, que requer reflexão e ação sobre os problemas sentidos por todos e pela sociedade. O exercício da cidadania significa que, para todos e para as pessoas com quem convive, faz-se sentir que a sua evolução acompanha a dinâmica de intervenção e mudança social. Durante anos a escola trabalha através de projetos que priorize contribuir para o cultivo de pessoas responsáveis, independentes e solidárias, que compreendam e exerçam seus direitos e deveres no processo de diálogo e respeito ao próximo, possuindo espírito democrático, pluralista, crítico e inovador. </p>

                        <div class='row'>
                             <div class='col-sm-6'>
                                <div class='card mb-3'>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <img src='img/cidadania1.jpg' class='card-img-top' alt='...'>
                                            <h5 class='card-title'>Projeto Feira das profissões | Como vai ser o meu futuro?</h5>
                                            <p class='card-text'>Palestra interativa com o Sargento Nelson e o Cabo Henrique – Parceria com a Polícia Militar de Ouro Fino</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class='col-sm-6'>
                                <div class='card mb-3'>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <img src='img/cidadania2.jpg' class='card-img-top' alt='...'>
                                            <h5 class='card-title'>Enfrentamento ao abuso e exploração sexual de crianças e adolescentes</h5>
                                            <p class='card-text'>Palestra com a equipe AÇÃO SOCIAL, CREAS E CRAS de Ouro Fino, com as psicólogas Jéssica e Danieli</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class='col-sm-6'>
                                <div class='card mb-3'>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <img src='img/cidadania3.jpg' class='card-img-top' alt='...'>
                                            <h5 class='card-title'>Sustentabilidade e Coleta Seletiva</h5>
                                            <p class='card-text'>Debate realizado com a representante da ACAMARE, a senhora Adriana.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class='col-sm-6'>
                                <div class='card mb-3'>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <img src='img/cidadania4.jpg' class='card-img-top' alt='...'>
                                            <h5 class='card-title'>Projeto Saúde Bucal</h5>
                                            <p class='card-text'>Aula interativa com Anos Inicias sob a responsabilidade das dentistas Lucilene e Viviane</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class='col-sm-6'>
                                    <div class='card mb-3'>
                                        <div class='card'>
                                            <div class='card-body'>
                                                <img src='img/cidadania5.jpg' class='card-img-top' alt='...'>
                                                <h5 class='card-title'>Campanha “Reciclagem”</h5>
                                                <p class='card-text'>Projeto desenvolvido pela professora Talita com apoio do PIBID- IF Inconfidentes.
                                                    Toneladas de lixo reciclável recolhidos e o valor conseguido revertido para a escola.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>

                            <p class='text_individuais'>Durante a pandemia muitos projetos foram adaptados e os recursos tecnológicos foram usados para que temas importantes fossem desenvolvidos. Mesmo longe da escola as práticas continuaram atrativas, transversais para que fosse oportunizado aos estudantes temas atuais e que a conexão com a escola continuasse fortalecida. Entre os projetos temos os desenvolvidos com a GIDE AVANÇADA: O CLUBE DA BOA INFLUÊNCIA.</p>

                            <center>
                                <div class='col-sm-6'>
                                    <div class='card mb-3'>
                                        <div class='card'>
                                            <div class='card-body'>
                                                <img src='img/cidadania6.jpg' class='card-img-top' alt='...'>
                                                <h6 class='card-title'>Encontro realizado pela professora Jacqueline (PEUB) com os estudantes interessados em participar do projeto.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>

                            <p class='text_individuais'>Nas reuniões que aconteciam pelo MEET os alunos debatiam sobre assuntos atuais e tinham a chance de montarem clubes de acordo com afinidades e interesses. Vários grupos foram criados e hoje mesmo com o retorno ao –presencial os grupos serão mantidos. Dentre os com mais participantes temos o Clube de jogos, que visa trabalhar o autocontrole ao passar menos horas jogando, além de colaborar o desenvolvimento de vídeos e tutoriais feito pelos estudantes. Clube do Livro, que visa estimular a prática da leitura e desenvolver a escrita e oralidade. Clube da Pintura, que visa incentivar a arte e desenvolver a criatividade. </p>

                            <div class='col-sm-6'>
                                <div class='card mb-3'>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <img src='img/cidadania8.jpg' class='card-img-top' alt='...'>
                                            <h6 class='card-title'>Clube de boa influência: pintura</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class='col-sm-6'>
                                <div class='card mb-3'>
                                    <div class='card'>
                                        <div class='card-body'>
                                            <img src='img/cidadania9.jpg' class='card-img-top' alt='...'>
                                            <h6 class='card-title'>Clube de boa inflência: Jogos | Desafio Minecraft</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <center>
                                <div class='col-sm-6'>
                                    <div class='card mb-3'>
                                        <div class='card'>
                                            <div class='card-body'>
                                                <img src='img/cidadania10.jpg' class='card-img-top' alt='...'>
                                                <h6 class='card-title'>Clube de boa influência: Livro | O trabalho com obras do acervo da escola.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </section>";
                    break;

                case 'PremiacaoGincanaDoSaber':
                    echo "<div style=width: 100%; height: 50px; display: flex; 
                    flex-flow: row nowrap; justify-content: center;>
                        <h1 class=titulo-principal> Gincana do Saber </h1>
                    </div>

                    <section id='section_acontecimentos'>
                        <p class='first_text'>A E.E. Professor Juvenal Brandão conquistou nos últimos anos o primeiro lugar Municipal e Regional da Gincana do Saber. A Gincana do Saber é um jogo entre escolas, de perguntas e respostas, de caráter educativo e não competitivo, em que todos saem ganhando conhecimento sobre a Constituição Federal de uma forma divertida, através da publicação Constituição em Miúdos.</p>

                        <div class=row>
                            <center>
                                <div class=col-sm-6>
                                    <div class=card mb-3>
                                        <div class=card>
                                            <div class=card-body>
                                                <img src=img/saber1.jpg class=card-img-top alt=...>
                                                <h5 class=card-title>Premiação Regional 2018</h5>
                                                <p class=card-text>As alunas Amanda e Giovanna representaram muito bem a nossa instituição.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>

                            <center>
                                <div class=col-sm-6>
                                    <div class=card mb-3>
                                        <div class=card>
                                            <div class=card-body>
                                                <img src=img/saber2.jpg class=card-img-top alt=...>
                                                <h5 class=card-title>Premiação Municipal 2019</h5>
                                                <p class=card-text>Os alunos Kelvin e Maria Luísa representaram a escola na fase municipal e obtiveram êxito.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <p class='text_individuais'> Liderados pelo professor Flávio, os alunos ficaram por semanas estudando e treinando. Com muito trabalho e dedicação, as duplas se sairam muito bem, ultrapassando as pontuações concorrentes e conquistando os primeiros lugares na gincana.
                                A Escola Estadual Professor Juvenal Brandão parabeniza e reconhece o esforço feito pelos alunos e pelo professor! </p>
                        </div>
                    </section>";            
                    break;
                    case 'SAEB':
                        echo "<div style=width: 100%; height: 50px; display: flex; 
                        flex-flow: row nowrap; justify-content: center;>
                            <h1 class=titulo-principal> Desde 2007 acima da meta no SAEB </h1>
                        </div>
    
                        <section id='section_acontecimentos'>
                            <p class='first_text'>A E.E. Professor Juvenal Brandão vem, desde 2007, ultrapassando a meta no Sistema de Avaliação da Educação Básica. Os resultados supreendem e o reconhecimento vai para toda a comunidade escolar que se empenha em formar alunos mais capacitados e cidadãos mais participativos.</p>
    
                            <div class=row>
                                <center>
                                    <div class=col-sm-6>
                                        <div class=card mb-3>
                                            <div class=card>
                                                <div class=card-body>
                                                    <img src=img/saebiniciais.jpeg class=card-img-top alt=...>
                                                    <p class=card-text>Grade de notas dos anos iniciais</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </center>
    
                                <center>
                                    <div class=col-sm-6>
                                        <div class=card mb-3>
                                            <div class=card>
                                                <div class=card-body>
                                                    <img src=img/saebfinais.jpeg class=card-img-top alt=...>
                                                    <p class=card-text>Grade de notas do anos finais</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                                <p class='text_individuais'> 'O Sistema de Avaliação da Educação Básica (Saeb) é um conjunto de avaliações externas em larga escala que permite ao Inep realizar um diagnóstico da educação básica brasileira e de fatores que podem interferir no desempenho do estudante. Por meio de testes e questionários, aplicados a cada dois anos na rede pública e em uma amostra da rede privada, o Saeb reflete os níveis de aprendizagem demonstrados pelos estudantes avaliados, explicando esses resultados a partir de uma série de informações contextuais.
                                O Saeb permite que as escolas e as redes municipais e estaduais de ensino avaliem a qualidade da educação oferecida aos estudantes. O resultado da avaliação é um indicativo da qualidade do ensino brasileiro e oferece subsídios para a elaboração, o monitoramento e o aprimoramento de políticas educacionais com base em evidências.' </p>
                            </div>
                        </section>";            
                        break;

                        case 'PremioTransformacao':
                            echo "<div style=width: 100%; height: 50px; display: flex; 
                            flex-flow: row nowrap; justify-content: center;>
                                <h1 class=titulo-principal> Prêmio Escola Transformação </h1>
                            </div>
        
                            <section id='section_acontecimentos'>
                                <p class='first_text'>A Secretaria de Estado de Educação de Minas Gerais (SEE/MG) divulgou a lista com as unidades de ensino que se classificaram na primeira etapa do Prêmio Escola Transformação. E com muita alegria, comunicamos que estamos entre as escolas vencedoras dessa 1ª edição! Nossa escola se destacou positivamente e representa Ouro Fino e a SRE de Pouso Alegre com muita honra. Destacamos que isso é possível graças ao trabalho árduo te todos os servidores da instituição, que diariamente se esforçam para que todos os estudantes sejam atendidos, buscando sempre o engajamento de toda a família. A esses profissionais (Professores, supervisores e equipe do administrativo), nossa admiração! Aos familiares e estudantes agradecemos pela confiança e parceria. Nesse momento tão atípico a conexão entre escola e família prevaleceu! Gratidão a 'família Juvenal Brandão'!</p>
        
                                <div class=row>
                                    <center>
                                        <div class=col-sm-6>
                                            <div class=card mb-3>
                                                <div class=card>
                                                    <div class=card-body>
                                                        <img src=img/cidadania6.jpg class=card-img-top alt=...>
                                                        <p class=card-text>Encontros virtuais para realização de projetos durante o período de pandemia.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </center>

                                    <p class='text_individuais'> 'O Prêmio Escola Transformação tem o objetivo de reconhecer publicamente as práticas e experiências exitosas das unidades escolares no processo de melhoria da qualidade do ensino. É destinado às escolas que ofertam etapas de ensino regular - ensino fundamental, ensino fundamental em tempo integral, ensino médio propedêutico, ensino médio em tempo integral propedêutico e ensino médio em tempo integral profissional.' </p>
                                </div>
                            </section>";            
                            break;

                
                
                default:
                    $img = "img/estudante.png";
                    $titulo = "Matéria não encontrada!";
                    $paragrafo = "Parece que você tentou acessar uma matéria inexisteste!
                    Por favor, volte à página inicial e clique em ".'"'."SABER
                    MAIS".'"'." no bloco da matéria que deseja ler por completo.";
                    mensagem_alerta($img, $titulo, $paragrafo);
                    break;
            }
        ?>
        </div>
    </main>
</div>
<?php
    include('componentes/first_footer.php');
?>
</body>
</html>