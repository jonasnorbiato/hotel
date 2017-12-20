<?php
	include 'sessao.php';
	include 'conexao.inc';

	if(isset($_GET["codigo"]))
	{
		if(!$con){
	    	die("Connection failed: " . $conn->connect_error);
		} 
		$cod=$_GET["codigo"];
		 $sql= "select q.numero, q.idquarto, q.valor, q.descricao, t.nome from quartos q inner join tipoQuartos t on t.idtipoQuarto = q.idtipoQuartos where idquarto=$cod";
		 $result=mysqli_query($con, $sql);
	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hotel</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
</head>
<body>
	<?php include "menu.php" ?>
	<div class="col-md-12">
		<div class="info">
			<br>
			<?php while($row = mysqli_fetch_assoc($result)): ?>
				<h2>Fazer reserva do quarto  <?php echo $row['numero'];?></h2>
				<br>
				<label for="">Categoria do quarto: <?php echo $row['nome'];?></label><br>
				<label for="">Valor do quarto: <?php echo $row['valor'];?></label><br>

			<?php endwhile ?>			
			<br><br>
			<form action="inserir_reserva.php" method="POST">
				<label for=""> Diarias </label><br>
				<input type="number" name="quant" min="1"><br><br>
				<label for="">Data de inicio</label><br>
				<input type="date" name="data" min="<?php echo date('Y-m-d'); ?>"><br><br>
				<input type="hidden" name="codigo" value="<?php print $_GET['codigo']; ?>">
				<button class= "btn btn-primary" type="submit">Reservar</button>
			</form>
			<br><br>
		</div>
	</div>
	<br>
	<div class="col-md-8 col-md-offset-2 ">
		<div class="alert result">
			<?php if(isset($_GET["msg"]) && $_GET["msg"]=='erro'): ?>
				<div class="alert alert-danger">
						Data escolhida já possui reserva.
				</div>
			<?php endif ?>
			<?php if(isset($_GET["msg"]) && $_GET["msg"]=='erro_p'): ?>
				<div class="alert alert-danger">
					Preencha todos os campos.
				</div>
			<?php endif ?>
		</div>
	</div>
</body>
</html>