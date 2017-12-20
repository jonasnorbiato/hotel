<?php
	include "sessao.php";
	include 'conexao.inc';
	if(!(empty($_POST["quant"])) && !(empty($_POST["data"])))
	{

		if(!$con)
		{
	    	die("Connection failed: " . $conn->connect_error);
		} 

		$codigo = $_POST['codigo'];
		$quantidade=$_POST["quant"];

		$dataI=$_POST["data"];
		$dataF=$_POST["data"];

		for ($i=1; $i < $quantidade; $i++) 
		{ 
			$dataF= date('Y-m-d', strtotime($dataF. " + 1 days"));	
		}

		 $sql="select * from reservas where idquarto=$codigo and dataInicio >= '$dataI'and dataInicio <= date_add('$dataI', interval $quantidade day) or idquarto=$codigo and dataFim >= '$dataI'and dataFim <= date_add('$dataI', interval $quantidade day)";
		 $result=mysqli_query($con, $sql);
		 $linhas=$result->num_rows;
		
		 if($linhas>0)
		 {
		 	header("location:incluir_reserva.php?codigo=$codigo&msg=erro");

		 }
		 
		if($linhas<=0)
		{	
			
			$sql_valor ="select valor from quartos where idquarto=$codigo";
			$resultValor=mysqli_query($con, $sql_valor);
			
			$valor=mysqli_fetch_array($resultValor);
			
			$total=$valor['valor']*$quantidade;
			$sql_incluir="INSERT INTO reservas (idquarto, total, diarias, dataInicio, dataFim, confirma) values ($codigo, $total, $quantidade, '$dataI', '$dataF',0)";
			$result_incluir=mysqli_query($con, $sql_incluir);
			
			header("location:fazer_reserva.php?msg=ok");
	          
		}

	}
	else
	{
		 $cod = $_POST['codigo'];
		 header("location:incluir_reserva.php?codigo=$cod&msg=erro_p");
	}
?>