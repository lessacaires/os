<?php
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

	$query = "INSERT INTO usuarios(nome, email) VALUES (".$nome.", ".$email.", NOW(), ".$status." )";
	$result = mysqli_query($con, $query);

	if(mysqli_insert_id($con)){
		$_SESSION['msg'] = "Usuário cadasrado com sucesso!";
		header("Location: index.php");
	}else{
		header("Location: index.php");
	}
 ?>