<?php
session_start();
include_once('config/config.php');
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

$query = "UPDATE usuarios SET nome = '".$nome."', login = '".$login."', senha = '".md5($senha)."', status = '".$status."', data_mod = NOW() WHERE id = '".$id."'";
$executa = mysqli_query($mysqli, $query);
if($executa){
		$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  								<i class="fa fa-check" aria-hidden="true"></i>Usuário editado com sucesso!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							  </div>';
		header("Location: ".HOME."/usuarios");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  								<i class="fa fa-times-circle" aria-hidden="true"></i>Erro ao alterar dados do Usuário!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							</div>';
		header("Location: ".HOME."/usuarios");
	}
?>