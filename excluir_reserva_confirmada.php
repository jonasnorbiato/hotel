<?php 
	include "sessao.php";
	include "conexao.inc";


	$codigo= $_GET['codigo'];

	$sql= "delete from reservas where idreserva=$codigo";

	$result=mysqli_query($con, $sql);

	header('location:cancelar_reserva.php?msg=ok');
?>