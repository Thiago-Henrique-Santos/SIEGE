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
			<h3> CONQUISTAS </h3>
			<center>
				<section id='todas_estaticas'>
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/premio-transform.jpg" class="card-img-top" alt="...">
									<h5 class="card-title">Prêmio Escola Transformação</h5>
									<p class="card-text">A Escola Estadual Professor Juvenal Brandão está entre as escolas vencedoras da 1ª edição do Prêmio Escola Transformação, realizado pela Secretaria de Educação de Minas Gerais.</p>
									<a href="saiba_mais.php?materia=PremioEscolaTransformacao" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/ideb.jpg" class="card-img-top" alt="...">
									<h5 class="card-title">IDEB 2019: Juvenal Brandão ultrapassa meta</h5>
									<p class="card-text">A escola conquistou nota 7.2 para os anos iniciais e 5.6 para os anos finais no IDEB 2019, ultrapassando a meta definida para 2021 e 2019 respectivamente. Uma conquista de toda a comunidade escolar!</p>
									<a href="saiba_mais.php?materia=IDEB2019" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/saber1.jpg" class="card-img-top" alt="...">
									<h5 class="card-title">Premiação Gincana do Saber</h5>
									<p class="card-text">A escola foi premiada e reconhecida ao conquistar o primeiro lugar Regional e o primeiro lugar Municipal da competição sobre direitos e deveres. </p>
									<a href="saiba_mais.php?materia=PremiacaoGincanaDoSaber" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</center>
			<h3> BOAS PRÁTICAS</h3>
			<center>
				<section id='todas_estaticas'>
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/capa-cidadania.jpg" class="card-img-top" alt="...">
									<h5 class="card-title"> Educação para a vida</h5>
									<p class="card-text">Confira os projetos da Escola Estadual Professor Juvenal Brandão voltados para desenvolvimento de alunos mais conscientes e responsáveis.</p>
									<a href="saiba_mais.php?materia=EducacaoParaAVida" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/premio-transform.jpg" class="card-img-top" alt="...">
									<h5 class="card-title">Prêmio Escola Transformação</h5>
									<p class="card-text">A Escola Estadual Professor Juvenal Brandão está entre as escolas vencedoras da 1ª edição do Prêmio Escola Transformação, realizado pela Secretaria de Educação de Minas Gerais.</p>
									<a href="saiba_mais.php?materia=PremioEscolaTransformacao" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/ideb.jpg" class="card-img-top" alt="...">
									<h5 class="card-title">IDEB 2019: Juvenal Brandão ultrapassa meta</h5>
									<p class="card-text">A escola conquistou nota 7.2 para os anos iniciais e 5.6 para os anos finais no IDEB 2019, ultrapassando a meta definida para 2021 e 2019 respectivamente. Uma conquista de toda a comunidade escolar!</p>
									<a href="saiba_mais.php?materia=IDEB2019" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<img src="img/saber1.jpg" class="card-img-top" alt="...">
									<h5 class="card-title">Premiação Gincana do Saber</h5>
									<p class="card-text">A escola foi premiada e reconhecida ao conquistar o primeiro lugar Regional e o primeiro lugar Municipal da competição sobre direitos e deveres. </p>
									<a href="saiba_mais.php?materia=PremiacaoGincanaDoSaber" class="btn btn-primary btn_saiba_mais" style="background-color: #191970">SABER MAIS</a>
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
							<iframe width="100%" height="450" frameborder="1" style="border:1" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBxss0dCNTXBUAGR6SIZmv7HOdzNfwe078&q=Rua+Engenheiro+Américo+Guidi+Filho,+48,+Centro,+Ouro+Fino,Minas+Gerais" allowfullscreen>
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