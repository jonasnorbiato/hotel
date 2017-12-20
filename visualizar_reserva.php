<?php
	include "sessao.php";
	include "conexao.inc";

	if(!$con)
	{
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql="select r.total, r.diarias, r.idreserva, r.dataInicio, r.dataFim, q.numero, q.valor, qt.nome from reservas r inner join quartos q on q.idquarto = r.idquarto inner  join tipoQuartos qt on qt.idtipoQuarto = q.idtipoQuartos where confirma=0";
	$lista=mysqli_query($con, $sql);

	$sql2="select r.total, r.diarias, r.idreserva, r.dataInicio, r.dataFim, q.numero, q.valor, qt.nome from reservas r inner join quartos q on q.idquarto = r.idquarto inner  join tipoQuartos qt on qt.idtipoQuarto = q.idtipoQuartos where confirma=1";

	$lista2=mysqli_query($con, $sql2);


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
	<div class="info">
		<br>
		<h2>Vizualizar Reserva</h2>
		<br><br>
		<h3> Reservas não confirmadas</h4>
		<br>
		<div class="alert result">
			<?php if(isset($_GET["msg"]) && $_GET["msg"]=='ex'): ?>
				<div class="alert alert-success">
						Resevar excluida com sucesso.
				</div>
			<?php endif ?>
			<?php if(isset($_GET["msg"]) && $_GET["msg"]=='ok'): ?>
				<div class="alert alert-success">
						Reserva fechada com sucesso.
				</div>
			<?php endif ?>
		</div>
	</div>	
	
	<?php while($row = mysqli_fetch_assoc($lista)): ?>
		<div class="col-md-10 col-md-offset-1">
			<h4>Quarto <?php echo $row['numero']; ?></h4><br>
				<table>
					<tbody>
						<tr>
							<td class="info2">
								<label for="">Categoria</label><br>
								<input type="text" class="form-control" disabled value="<?php echo $row['nome']; ?>">
							</td>
							<td class="info2">
								<label for="">Valor da diária</label><br>
								<input type="text" class="form-control" disabled value="<?php echo $row['valor']; ?>">			
							</td>
							<td class="info2">
								<label for="">Diárias</label><br>
								<input type="text" class="form-control" disabled value="<?php echo $row['diarias']; ?>">
							</td class="info2">
							<td> 
								<label for="">Início da hospedagem</label><br>
								<input type="date" class="form-control" disabled value="<?php echo $row['dataInicio']; ?>">						
							</td>
							
							<td class="info2">
								<label for="">Final da hospedagem</label><br>
								<input type="date" class="form-control" disabled value="<?php echo $row['dataFim']; ?>">			
							</td>
							<td class="info2">
								<label for="">Total</label><br>
								<input type="text" class="form-control" disabled value="<?php echo $row['total']; ?>">			
							</td>
						</tr>
					</tbody>
				</table>
				<input type="text" name="codigo" hidden value="<?php print $row['idreserva'];?>">
				<br>		
				<a class="btn btn-danger" href="excluir_reserva.php?codigo=<?php print$row['idreserva'];?>" >Excluir </a>
				<a class="btn btn-success" href="alterar_reserva.php?codigo=<?php print$row['idreserva'];?>" >Alterar</a>
				<a class="btn btn-primary" href="fechar_reserva.php?codigo=<?php print $row['idreserva'];?>">Fechar Reservar</a><br><br><hr>
		</div>		
	<?php endwhile ?>

	<div class="col-md-12 res">
		<h3>Reservas confirmadas</h3>
	</div>

	<?php while($row = mysqli_fetch_assoc($lista2)): ?>	
		<div class="col-md-10 col-md-offset-1">
			<h4>Quarto: <?php echo $row['numero']; ?></h4><br>
			<table>
				<tbody>
					<tr>
						<td class="info2">
							<label for="">categoria</label><br>
							<input type="text" class="form-control" disabled value="<?php echo $row['nome']; ?>">
						</td>
						<td class="info2">
							<label for="">Valor da diaria</label><br>
							<input type="text" class="form-control" disabled value="<?php echo $row['valor']; ?>">			
						</td>
						<td class="info2">
							<label for="">diarias</label><br>
							<input type="text" class="form-control" disabled value="<?php echo $row['diarias']; ?>">
						</td>
						<td class="info2"> 
							<label for="">Inicio da hospedagem</label><br>
							<input type="date" class="form-control" disabled value="<?php echo $row['dataInicio']; ?>">						
						</td>
						
						<td class="info2">
							<label for="">Final da hospedagem</label><br>
							<input type="date" class="form-control" disabled value="<?php echo $row['dataFim']; ?>">			
						</td>
						<td class="info2">
							<label for="">total</label><br>
							<input type="text" class="form-control" disabled value="<?php echo $row['total']; ?>">			
						</td>
					</tr>
				</tbody>
			</table>	
			<br><br><hr>
		</div>
	<?php endwhile ?>
	
</body>
</html>