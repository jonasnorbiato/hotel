<?php
	include "sessao.php";
	include "conexao.inc";
	
	if(!$con)
	{
	    	die("Connection failed: " . $conn->connect_error);
	} 

	$sql="select r.total, r.diarias, r.idreserva, r.dataInicio, r.dataFim, q.numero, q.valor, qt.nome from reservas r inner join quartos q on q.idquarto = r.idquarto inner  join tipoQuartos qt on qt.idtipoQuarto = q.idtipoQuartos where confirma=1";

	$lista= mysqli_query($con, $sql);

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
		<br><br>
		<h2>Cancelar reservas Confirmadas</h2>
	</div>
	<br><br>
	<div class="alert result">
		<?php if(isset($_GET["msg"]) && $_GET["msg"]=='ok'): ?>
			<div class="alert alert-success">
				Resevar excluida com sucesso.
			</div>
		<?php endif ?>
	</div>
	<br>

	<?php while($row = mysqli_fetch_assoc($lista)): ?>

		<div class="col-md-10 col-md-offset-1">
			<h4>Quarto: <?php echo $row['numero']; ?></h4><br>
			<table>
				<tbody>
					<tr>
						<td class="info2">
							<label for="">Categoria</label><br>
							<input type="text" class="form-control" disabled value="<?php echo $row['nome']; ?>">
						</td>
						<td class="info2">
							<label for="">Valor da diria</label><br>
							<input type="text" class="form-control" disabled value="<?php echo $row['valor']; ?>">			
						</td>
						<td class="info2">
							<label for="">Diárias</label><br>
							<input type="text" class="form-control" disabled value="<?php echo $row['diarias']; ?>">
						</td>
						<td class="info2"> 
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

			<br>
			<a href="excluir_reserva_confirmada.php?codigo=<?php print$row['idreserva'];?>" class="btn btn-danger">Cancelar Reserva</a>
			<br>
			<hr>
		</div>
	<?php endwhile ?>


</body>
</html>


