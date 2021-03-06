<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="img/logo_juvenal.png" />
	<title>SIEGE - Home </title>
	<link rel="stylesheet" type="text/css" href="CSS/reset.css">
	<link rel="stylesheet" type="text/css" href="CSS/main.css">
	<link rel="stylesheet" type="text/css" href="CSS/texto.css">
	<link rel="stylesheet" type="text/css" href="CSS/menu.css">
	<link rel="stylesheet" type="text/css" href="CSS/index.css">
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
			<section>

				<!-- Optional JavaScript -->
				<!-- jQuery first, then Popper.js, then Bootstrap JS -->
				<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

				<div class="container">
					<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item">
								<img src="img/juvenal1.jpg" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item active">
								<img src="img/juvenal2.jpg" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item">
								<img src="img/juvenal3.jpg" class="d-block w-100" alt="...">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only"></span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only"></span>
						</a>
			</section>
			<br><br>
			<h3 id='conquistas' style='margin-left: 5%; margin-top:10px; margin-bottom:15px;'> Conquistas </h3>
			<center>
				<section id='todas_estaticas'>
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/premio-transform.jpg" class="card-img-top" alt="...">
									<h5 class="card-title">Pr??mio Escola Transforma????o</h5>
									<p class="card-text">A Escola Estadual Professor Juvenal Brand??o est?? entre as escolas vencedoras da 1?? edi????o do Pr??mio Escola Transforma????o, realizado pela Secretaria de Educa????o de Minas Gerais.</p>
									<a href="saiba_mais.php?materia=PremioTransformacao" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/ideb.jpg" class="card-img-top" alt="...">
									<h5 class="card-title">IDEB 2019: Juvenal Brand??o ultrapassa meta</h5>
									<p class="card-text">A escola conquistou nota 7.2 para os anos iniciais e 5.6 para os anos finais no IDEB 2019, ultrapassando a meta definida para 2021 e 2019 respectivamente. Uma conquista de toda a comunidade escolar!</p>
									<a href="saiba_mais.php?materia=IDEB2019" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/gincana.png" class="card-img-top" alt="...">
									<h5 class="card-title">Premia????o Gincana do Saber</h5>
									<p class="card-text">A escola foi premiada e reconhecida ao conquistar o primeiro lugar Regional e o primeiro lugar Municipal da competi????o sobre direitos e deveres. </p>
									<a href="saiba_mais.php?materia=PremiacaoGincanaDoSaber" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/saeb.png" class="card-img-top" alt="...">
									<h5 class="card-title">Desde 2007 acima da meta no SAEB</h5>
									<p class="card-text"> Notas da Escola Estadual Professor Juvenal Brand??o ultrapassam a meta no Sistema de Avalia????o da Educa????o B??sica desde 2007. </p>
									<a href="saiba_mais.php?materia=SAEB" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</center>

			<h3 id='boas_praticas' style='margin-left: 5%; margin-top:50px; margin-bottom:15px;'> Boas Pr??ticas</h3>
			<center>
				<section id='todas_estaticas'>
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/capa-cidadania.jpg" class="card-img-top" alt="...">
									<h5 class="card-title"> Educa????o para a vida</h5>
									<p class="card-text">Confira os projetos da Escola Estadual Professor Juvenal Brand??o voltados para desenvolvimento de alunos mais conscientes e respons??veis.</p>
									<a href="saiba_mais.php?materia=EducacaoParaAVida" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/feira1.jpg" class="card-img-top" alt="...">
									<h5 class="card-title">Feira de Ci??ncias e Conhecimentos Diversos</h5>
									<p class="card-text">Anualmente a escola promove a Feira de Conhecimentos com trabalhos realizados e apresentados pelos alunos.</p>
									<a href="saiba_mais.php?materia=FeiraCiencias" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/desfile1-capa.jpg" class="card-img-top" alt="...">
									<h5 class="card-title">Dia da Independ??ncia e civismo</h5>
									<p class="card-text">Entendendo que as crian??as de hoje s??o os adultos do amanh??, a escola trabalha valores voltados ao civismo e amor a p??tria, tamb??m participa anualmente do desfile de 7 de Setembro em comemora????o ao Dia da Indep??ndecia.</p>
									<a href="saiba_mais.php?materia=Desfile" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/horta1.jpg" class="card-img-top" alt="...">
									<h5 class="card-title">Horta na Escola: um recurso did??tico</h5>
									<p class="card-text"> Revitalizando uma pr??tica do per??odo de funda????o, a Juvenal Brand??o tem desenvolvido uma horta nas depend??ncias da escola, a fim de trabalhar apectos sociais e ambientais com os alunos.</p>
									<a href="saiba_mais.php?materia=Horta" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</center>
			<h3 id='editais' style='margin-left: 5%; margin-top:50px; margin-bottom:15px;'> Editais</h3>
			<center>
				<section id='todas_estaticas'>
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="Documentos/leilao1.jpg" class="card-img-top" style='height:70%;' alt="...">
									<h5 class="card-title">Aviso de Licita????o na Modalidade Leil??o</h5>
									<p class="card-text">A Dire????o da Escola Estadual Professor Juvenal Brand??o, comunica que realizou leil??o de equipamentos e materiais diversos no estado de conserva????o em que se encontram.</p>
									<a href="https://www.facebook.com/198889310593696/posts/1150305635452054/?sfnsn=wiwspmo" target="_blank" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="Documentos/edital1_2.jpeg" class="card-img-top" style='height:70%;' alt="...">
									<h5 class="card-title">10?? Edital de Divulga????o de vaga para Contrata????o Tempor??ria/Convoca????o</h5>
									<p class="card-text">A Escola Estadual Professor Juvenal Brand??o, por meio deste edital, procura professores de LIBRAS para contrata????o.</p>
									<a href="Documentos/edital1_1.jpeg" target="_blank" class="btn btn-primary btn_saiba_mais" style="background-color: #191970;margin-top:-32px;">SABER MAIS</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</center>
			<br><br>
			<section id='mapa'>
				<div class="field field-name-como-chegar field-type-ds field-label-above">
					<h3 class="field-label">Como chegar:&nbsp;</h3>
					<div class="field-items">
						<div class="field-item even">
							<iframe width="100%" height="450" frameborder="1" style="border:1" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBxss0dCNTXBUAGR6SIZmv7HOdzNfwe078&q=Rua+Engenheiro+Am??rico+Guidi+Filho,+48,+Centro,+Ouro+Fino,Minas+Gerais" allowfullscreen>
							</iframe>
						</div>
			</section>

		</main>
	</div>

	<?php
	include('componentes/first_footer.php');
	?>
</body>

</html>