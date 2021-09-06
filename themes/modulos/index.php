<!DOCTYPE html>
<?php session_start(); ?>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Área Administativa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<h2>Área Restrita</h2>
	<?php 
		echo $_SESSION['msg']; 
		unset($_SESSION['msg']); 
	?>
	<form method="post" action="valida.php" name="form-login">
		<label>Usuário:</label>
		<input type="text" name="login" placeholder="Digite seu usuário">
		<label>Senha:</label>
		<input type="password" name="senha" placeholder="Digite sua senha">
		<input type="submit" name="btn-login" value="Acessar">
	</form>
	<a href="#">Esqueci minha senha</a>



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>