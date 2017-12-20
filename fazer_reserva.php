<?php
	include 'sessao.php';
	include 'conexao.inc';
	if (!$con) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 

	$sql="select q.numero, q.idquarto, q.valor, q.descricao, t.nome from quartos q
 	inner join tipoQuartos t on t.idtipoQuarto = q.idtipoQuartos order by idtipoQuarto";
	$lista=mysqli_query($con, $sql);
?>

<!DOCTYPE>
<html lang="pt-br">
<head>
	<title>Hotel</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="UTF-8">
</head>
<body>

	<?php include "menu.php" ?>
	<div class="container">
		<div class="info">
			<br>
			<h2>Fazer Reserva</h2>
			<br>
		</div>

		<div class="alert result">
				<?php if(isset($_GET["msg"]) && $_GET["msg"]=='ok'): ?>
					<div class="alert alert-success">
							Reserva efetuada com sucesso, vá até visualizar reserva para fechar sua reserva.
					</div>
				<?php endif ?>
		</div>
		<br>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php while($row = mysqli_fetch_assoc($lista)):?>
					<?php
						include "conexao.inc";
						$cod=$row['idquarto'];
						$sql2="select * from imagens where idquarto=$cod";
						$lista2=mysqli_query($con, $sql2);
					?>
					<div class="panel panel-default">
						<div class="panel-heading"><?php echo $row['nome']; ?></div>
		 					<div class="panel-body">
			 					<div class="col-md-3">
									<label for="">Quarto: <?php echo $row ['numero'] ?></label>
									<br><br>
									<label for="">Descrição: <?php echo $row['descricao']; ?></label>
									<br><br>
									<label for="">Valor: <?php echo $row ['valor'] ?>,00</label>
									<br><br>
										<a class="btn btn-primary" href="incluir_reserva.php?codigo=<?php print $row['idquarto']; ?>">Incluir na reserva</a>	
								
								</div>
								<?php while($row = mysqli_fetch_assoc($lista2)):?>

									<div class="col-md-5 col-lg-3">
										<div class="thumbnail">
											<img src="<?php echo $row['nome'];?>" alt="">
										</div>
									</div>
								<?php endwhile ?>
								<br><br>
							</div>
					</div>
					<br>			
				<?php endwhile ?>
			</div>
		</div>			
	</div>
</body>
</html>
