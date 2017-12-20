<?php 
	include "sessao.php";
	include "conexao.inc";

	$codigo= $_GET['codigo'];

	$sql="update reservas set confirma=1 where idreserva=$codigo";
	mysqli_query($con, $sql);

	header('location:visualizar_reserva.php?msg=ok');

?>