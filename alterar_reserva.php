<?php
	include "sessao.php";
	include "conexao.inc";
	$codigo = $_GET["codigo"];

	$sql="select r.total, r.diarias, r.dataInicio, r.idreserva, r.idquarto, r.dataFim, q.idquarto, q.numero, q.valor, qt.nome from reservas r inner join quartos q on q.idquarto = r.idquarto inner  join tipoQuartos qt on qt.idtipoQuarto = q.idtipoQuartos where confirma=0 and idreserva=$codigo";
		$result =mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hotel</title>
	<script type="text/javascript" src="js/validacao.js"></script>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	
	<?php include "menu.php"; ?>	
	<div class="col-md-10 col-md-offset-1">
		<form action="inserir_alterar_reserva.php" name="alterar" method="post">
			<br>
			<?php while($row = mysqli_fetch_assoc($result)): ?>
				<h4>Quarto: <?php echo $row['numero']; ?></h4>	
				<br>	
				<table>
					<tbody>
						<tr>
							<td class="info2">
								<label for="">Categoria</label><br>
								<input type="text" disabled class="form-control"	 value="<?php echo $row['nome']; ?>">
							</td>
							<td class="info2">
								<label for="">Valor da diária</label><br>
								<input type="text" name="valor" id="txtvalor" class="form-control" readonly value="<?php echo $row['valor']; ?>">			
							</td>
							<td class="info2">
								<label for="">Diárias</label><br>
								<input type="text" name="quant" id="txtquant" class="form-control" value="<?php echo $row['diarias']; ?>">
							</td>
							<td class="info2"> 
								<label for="">Início da hospedagem</label><br>
								<input type="date" name="dataI" id="txtdataI" class="form-control" value="<?php echo $row['dataInicio']; ?>">				
							</td>
							<td class="info2">
								<label for="">Final da hospedagem</label><br>
								<input type="date" name="dataF" id="txtdataF" class="form-control" readonly value="<?php echo $row['dataFim']; ?>">			
							</td>
							<td class="info2">
								<label for="">Total</label><br>
								<input type="text" name="total" id="txttotal" class="form-control"  readonly value="<?php echo $row['total']; ?>">	
								<input type="text" name="codigo" hidden value="<?php echo $row['idreserva']; ?>">			
							</td>
						</tr>
					</tbody>
				</table>
			<?php endwhile ?>
			<br>
			<a href="visualizar_reserva.php" class="	btn btn-default">Voltar</a>
			<button type="button" class="botao btn btn-success" onclick="return consultar();">Calcular Total</button>
			<button type="submit" class="botao btn btn-primary">Atualizar</button>
		</form>
	</div>
	
	<div class="col-md-10 col-md-offset-1 result">
		<br><br>
		<div class="alert result">
			<?php if(isset($_GET["msg"]) && $_GET["msg"]=='ok'): ?>
				<div class="alert alert-success">
						Reserva alterada com sucesso.
				</div>
			<?php endif ?>
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