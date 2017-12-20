<?php
	session_start();

	if($_POST['login']=='teste' && $_POST['senha']=='teste')
	{
		$login 			 = $_POST["login"];
		$senha  		 = $_POST["senha"];
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
	 	header('Location: index_cliente.php');
		
	}
	else{
		session_destroy();
		 echo"<script language='javascript' type='text/javascript'>alert('login não confere');window.location.href='index.php';</script>";
	          die();
		
	}

?>