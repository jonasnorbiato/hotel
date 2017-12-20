<!DOCTYPE html>
<html>
<head>
	<title>HOTEL</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/validacao.js"></script>
</head>
<body>
<br>
	<div class="col-md-6">
		<a class="btn btn-default" href="#hotel">Sobre o Hotel</a>
		<a class="btn btn-default"   href="#localizacao">Localização</a>
		<a class="btn btn-default" href="#fotos">Fotos</a>
	</div>
	<div class="col-md-1"></div>
	<form action="validacao_login.php" method="post" class="">
		<div class="col-md-2">
			<input type="text" class="form-control" name="login" placeholder="usuário">
		</div>
		<div class="col-md-2">
			<input type="password" class="form-control" name="senha" placeholder="senha">
		</div>
		<div class="col-md-1">
			<button  class="btn btn-info" type="submit">entrar</button>
		</div>
	</form>
	<br>
	<br>
	<hr>

<br>
	
	<div class="info">

		<br><br>
		<img src="img/hotel.png" alt="">
		
			<br> <br>

	</div>

	<div class="hotel" id="hotel">
			<h3>Sobre o Hotel</h3>
			<p>O Hotel Beira mar é um requinte a parte. Nossa equipe pensa em cada detalhe para que sua estadia seja perfeita e supere suas expectativas. <br>
			Todas as acomodações são cuidadosamente limpas, e estão equipadas com tudo que você precisa para ter uma estadia super confortável seja à trabalho ou à lazer. <br>
			Faça já o seu <a href="cadastrar_cliente.php">cadastro </a>!
			</p>
	</div>
	<div class="localizacao" id="localizacao">
		<h3>Localização</h3>
		<br>
		<p>Cidade: Marataizes <br> Av. Beira Mar  nº:50</p>
		<img src="img/localizacao.png" alt="" class="tamanho2">
		<br>
	</div>

	<div class="fotos" id="fotos">
	<br>
		<h3>Fotos</h3>
					<img src="img/hotel1.jpg" alt="" class="tamanho">
					<img src="img/hotel2.jpg" alt="" class="tamanho">
					<img src="img/hotel3.jpg" alt="" class="tamanho">
		
	</div>

</body>
</html>

