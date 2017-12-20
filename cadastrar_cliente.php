<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Cliente</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">	
	<script type="text/javascript" src="js/validacao.js"></script>
</head>
<body>

	<div class="info">
			<h2>Cadastro de Cliente </h2>
			<hr>
			<br>
			<div class="direita">

				<form method="post" name="cadastro" action="inserir_cliente.php" onsubmit="return validacao_cliente()">

					<label>*Nome:</label><br>
					<input type="text" class="form-control" name="nome" maxlength="50"><br><br>
					<label for="">*Sobrenome:</label><br>
					<input type="text" class="form-control" name="sobrenome" maxlength="80"><br><br>
					<label>*CPF:	</label><br>
					<input type="text" class="form-control" name="cpf" maxlength="14">
					<br><br>
					<LABEL>*Data de Nascimento:</LABEL><br>
					<input type="date" class="form-control" name="data_nasc" min="<?php echo date('Y-m-d', strtotime('-100 Years')); ?>" max="<?php echo date('Y-m-d', strtotime('-15 Years')); ?>">
					<br><br>
					<label>*Sexo:</label><br>
					<input type="radio" value="M" name="sexo">Masculino
					<input type="radio" value="F" name="sexo">Feminino
					<br><br>
					<label for="">*Telefone:</label><br>
					<input type="text" class="form-control" name="telefone" maxlength="12"><br><br>
					<label for="">*Email:</label><br>
					<input type="email" class="form-control" name="email" maxlength="45"><br><br>		
					<a href="index.php" class="btn btn-default"> Voltar</a>
					<button type="submit" class="btn btn-primary botao"> Salvar</button>	

				</form>
				<br> <br>
				<div class="alert result">
					<?php if(isset($_GET["msg"]) && $_GET["msg"]=='ok'): ?>
						<div class="alert alert-success">
							 Cadastro efetuado com sucesso.
						</div>
					<?php endif ?>

					<?php if(isset($_GET["msg"]) && $_GET["msg"]=='erro'): ?>
						div.alert <div class="alert-danger">
							Erro ao cadastrar, preencha todos os campos.
						</div>			
					<?php endif ?>
					
				</div>
		</div>
	</div>
</body>
</html>