<?php
session_start();
$id = filter_input(INPUT_POST, 'servico_id', FILTER_SANITIZE_STRING);
$sessao = $_SESSION['id'];

	if(isset($id)){
		include_once('config/config.php');

		$resultado = '';
		$sql_servico = "SELECT * FROM servicos WHERE id = '".$id."'";
		$retorna = mysqli_query($mysqli, $sql_servico);
		$row_servico = mysqli_fetch_assoc($retorna);

		$resultado .= '<div class="row">';
		$resultado .= '<div class="col-md-3">';
		$resultado .= '<label>Data Abertura:</label>';
		$resultado .= '<input type="text" class="form-control" name="solicitante" value="'.date('d/m/Y', strtotime($row_servico['data_cad'])).'" placeholder="Digite o nome do';
		$resultado .= 'solicitante" required="">';
		$resultado .= '</div>';
		$resultado .= '<div class="col-md-3">';
		$resultado .= '<label>Núnero da OS:</label>';
		$resultado .= '<input type="text" class="form-control" value="'.$row_servico['id'].'" name="tipo" placeholder="Digite o tipo de Serviço"'; 
		$resultado .= 'required="">';
		$resultado .= '</div>';
		$resultado .= '</div>';
		$resultado .= '<div class="row">';
		$resultado .= '<div class="col-md-3">';
		$resultado .= '<label>Solicitante:</label>';
		$resultado .= '<input type="text" class="form-control" name="solicitante" value="'.$row_servico['solicitante'].'" placeholder="Digite o nome do';
		$resultado .= 'solicitante" required="">';
		$resultado .= '</div>';
		$resultado .= '<div class="col-md-3">';
		$resultado .= '<label>Tipo de Serviço:</label>';
		$resultado .= '<input type="text" class="form-control" value="'.$row_servico['tipo'].'" name="tipo" placeholder="Digite o tipo de Serviço"'; 
		$resultado .= 'required="">';
		$resultado .= '</div>';
		$resultado .= '<div class="col-md-3">';
		$resultado .= '<label>Setor:</label>';
		$resultado .= '<input type="text" class="form-control" value="'.$row_servico['setor'].'" name="setor" placeholder="Digite o nome do setor"'; 
		$resultado .= 'required="">';
		$resultado .= '</div>';
		$resultado .= '<div class="col-md-3">';
		$resultado .= '<label>Equipamento:</label>';
		$resultado .= '<input type="text" class="form-control" value="'.$row_servico['equipamento'].'" name="equipamento" placeholder="Digite o tipo de'; 
		$resultado .= 'Equipamento" required="">';
		$resultado .= '</div>';
		$resultado .= '</div>';
		$resultado .= '<div class="row">';
		$resultado .= '<div class="col-md-12">';
		$resultado .= '<label>Descrição:</label>';
		$resultado .= '<textarea class="form-control" name="descricao" placeholder="Descreva o tipo de serviço"'; 
		$resultado .= 'required="" id="textarea">'.$row_servico['descricao'].'</textarea>';
		$resultado .= '</div>';
		$resultado .= '</div>';
		$resultado .= '<div class="row">';
		$resultado .= '<div class="col-md-12">';
		$resultado .= '<label>Observações:</label>';
		$resultado .= '<textarea class="form-control" name="obs" id="textarea" placeholder="Digite as observações se necessário"';
		$resultado .= '>'.$row_servico['observacoes'].'</textarea>';
		$resultado .= '</div>';
		$resultado .= '</div>';
		$resultado .= '<div class="row">';
		$resultado .= '<div class="col-md-3">';
		$resultado .= '<label>Situação:</label>';
		if($row_servico['status'] == 0){
			$row_servico['status'] = 'pendente';
		}elseif($row_servico['status'] == 1){
			$row_servico['status'] = 'aprovada';
		}elseif($row_servico['status'] == 2){
			$row_servico['status'] = 'executando';
		}elseif($row_servico['status'] == 3){
			$row_servico['status'] = 'cancelada';
		}elseif($row_servico['status'] == 4){
			$row_servico['status'] = 'encerrada';
		}else{
			$row_servico['status'] = '';
		}
		$resultado .= '<input type="text" class="form-control" value="'.$row_servico['status'].'" name="equipamento" placeholder="Digite o tipo de'; 
		$resultado .= 'Equipamento" required="">';
		$resultado .= '</div>';
		$resultado .= '</div>';

		echo $resultado;
		
	}
 ?>