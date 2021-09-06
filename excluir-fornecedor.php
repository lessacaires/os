<?php
session_start();
include_once('config/config.php');
	$id 	= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

		$sql_fornecedor = "DELETE FROM fornecedores WHERE id = '".$id."'";
		$retorna = mysqli_query($mysqli, $sql_fornecedor);
		$row_fornecedor = mysqli_fetch_assoc($retorna);
		if(mysqli_affected_rows($mysqli) != '0'){
		$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  								<i class="fa fa-check" aria-hidden="true"></i>Fornecedor excluido com sucesso!
  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  								</button>
							  </div>';
		header("Location: ".HOME."/fornecedor");
		}else{
			$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  								<i class="fa fa-times-circle" aria-hidden="true"></i>Erro ao exluir Fornecedor!
	  								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    							<span aria-hidden="true">&times;</span>
	  								</button>
								</div>';
			header("Location: ".HOME."/fornecedor");
		}
?>