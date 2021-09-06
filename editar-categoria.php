<?php
session_start();
include_once('config/config.php');
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$query = "UPDATE categorias SET nome = '".$nome."' WHERE id = '".$id."'";
$executa = mysqli_query($mysqli, $query);
if($executa){
		$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  								<i class="fa fa-check" aria-hidden="true"></i>Registro editado com sucesso!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							  </div>';
		header("Location: ".HOME."/categorias");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  								<i class="fa fa-times-circle" aria-hidden="true"></i>Erro ao alterar Registr!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							</div>';
		header("Location: ".HOME."/categorias");
	}
?>