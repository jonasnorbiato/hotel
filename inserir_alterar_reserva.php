<?php

	include "sessao.php";
	include 'conexao.inc';

	if(!$con)
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	if(!(empty($_POST['valor'])) && !(empty($_POST['dataI'])) && !(empty($_POST['dataF'])) && !(empty($_POST["quant"])) && !(empty($_POST['codigo'])) && !(empty($_POST['total'])))
	{
		$codigo = $_POST['codigo'];
		$quantidade=$_POST["quant"];
		$dataI=$_POST["dataI"];	

		$sql_idquarto ="select idquarto from reservas where idreserva=$codigo";
		$result_idquarto=mysqli_query($con, $sql_idquarto);
		$id=mysqli_fetch_array($result_idquarto);
		$idquarto=$id['idquarto'];
	
		$sql="select * from reservas where
				not idreserva=$codigo and idquarto=$idquarto and dataInicio >= '$dataI'and 
				dataInicio <= date_add('$dataI', interval $quantidade day) or 
				not idreserva=$codigo and idquarto=$idquarto and
				dataFim >= '$dataI'and dataFim <= date_add('$dataI', interval $quantidade day)";
		  $result=mysqli_query($con, $sql);
		  $linhas=$result->num_rows;
		
		  if($linhas>0)
		  {
		  	header("location:alterar_reserva.php?codigo=$codigo&msg=erro");
		 
		  }

		if($linhas<=0)
		{	
			$dataF=$dataI;
			for ($i=0; $i <$quantidade ; $i++) { 
				$dataF= date('Y-m-d', strtotime($dataF. " + 1 days"));

			}
			 
			$sql_valor ="select valor from quartos where idquarto=$idquarto";
			$resultValor=mysqli_query($con, $sql_valor);
			$valor=mysqli_fetch_array($resultValor);
			$total=$valor['valor']*$quantidade;
			
			 $sql_update="UPDATE reservas set dataInicio='$dataI', dataFim='$dataF', total=$total, diarias=$quantidade  where idreserva=$codigo";
			 $atualizar=mysqli_query($con, $sql_update);
			 var_dump($atualizar);
			 header("location:alterar_reserva.php?codigo=$codigo&msg=ok");
	          
		}

	}else
	{
		$codigo=$_POST['codigo'];
		header("location:alterar_reserva.php?codigo=$codigo&msg=erro_p");
	}
?>