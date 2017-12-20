<?php
	include 'conexao.inc';
	include 'sessao.php';
	
	if(isset($_POST["nome"])&&isset($_POST["sobrenome"])&&isset($_POST["cpf"])&&isset($_POST["data_nasc"])&&isset($_POST["sexo"])&&isset($_POST["telefone"])&&isset($_POST["email"]))
	{
		$nome 			 = $_POST["nome"];
		$sobrenome		 = $_POST["sobrenome"];
		$cpf 			 = $_POST["cpf"];
		$data_nasc 		 = $_POST["data_nasc"];
		$sexo 			 = $_POST["sexo"];
		$telefone 		 = $_POST["telefone"];
		$email	 		 = $_POST["email"];
		
		if (!$con) {
	    	die("Connection failed: " . $conn->connect_error);
		} 
		$sql= "INSERT INTO clientes ( nome, sobrenome, cpf, data_nasc, sexo, telefone, email) values('$nome','$sobrenome','$cpf','$data_nasc','$sexo','$telefone','$email')";

		mysqli_query($con, $sql);

		header("location:cadastrar_cliente.php?msg=ok");
		
	}
	else
	{
		header("location:cadastrar_cliente.php?msg=erro");
	}

?>