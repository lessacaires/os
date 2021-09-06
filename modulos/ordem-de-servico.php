<?php 
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg']; 
		unset($_SESSION['msg']);
	}else{

	}
?>
<div class="data">
		<h3>Ordem de Serviço</h3>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-os">
  			Abrir nova Ordem de Serviço
		</button>
		<!-- Modal para visualizar-->
		<div class="visualizar">
			<div class="modal fade" id="visualizaOrdemServico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-xl" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Detalhe Ordem de Serviço</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <span id="visulOrdemServico"></span>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		<!-- Modal para cadastrar-->
		<!--Modal para editar registo-->
		<div class="modal fade" id="modal-os" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-xl" role="document">
		    <div class="modal-content">
		       	<div class="modal-body">
		        	<form action="cadastra-ordem-de-servico.php" method="post">		
						<legend>Abertura de Ordem de Serviço</legend>
						<div class="row">
							<div class="form-group col-md-3">
								<label>Solicitante:</label>
								<input type="text" class="form-control" name="solicitante" placeholder="Digite o nome do solicitante" required="">
							</div>
							<div class="form-group col-md-3">
								<label>Tipo de Serviço:</label>
								<input type="text" class="form-control" name="tipo" placeholder="Digite o tipo de Serviço" required="">
							</div>
							<div class="form-group col-md-3">
								<label>Setor:</label>
								<input type="text" class="form-control" name="setor" placeholder="Digite o nome do setor" required="">
							</div>
							<div class="form-group col-md-3">
								<label>Equipamento:</label>
								<input type="text" class="form-control" name="equipamento" placeholder="Digite o tipo de Equipamento" required="">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label>Descrição:</label>
								<textarea class="form-control" name="descricao" placeholder="Descreva o tipo de serviço" required=""></textarea>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label>Observações:</label>
								<textarea class="form-control" name="obs" placeholder="Digite as observações se necessário"></textarea>
							</div>
						</div>
						<div class="form-group col-md-12">
							<label>Situação:</label><br>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="status" id="status" value="0" checked="checked">
							  <label class="form-check-label" for="status">
							    pendente
							  </label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="status" id="status" value="1">
							  <label class="form-check-label" for="status">
							    aprovada
							  </label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="status" id="status" value="2">
							  <label class="form-check-label" for="status">
							    cancelada
							  </label>
							</div>
						</div>
						<input type="submit" name="send" class="btn btn-primary" value="Abir Ordem de Serviço">	
					</form>
				</div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
		<table border="0">
			<thead>
				<td>Nº OS</td>
				<td>Data Solicitação</td>
				<td>Solicitante</td>
				<td>Status</td>
				<td>Serviço</td>
				<td>Equipamento</td>
				<td>Descrição do Serviço</td>
				<td>Obeservações</td>
				<td>Setor</td>
				<td colspan="3">Ações</td>
			</thead>
			<?php 
				$sql = "SELECT * FROM servicos";
				$result = mysqli_query($mysqli, $sql);

				while($row = mysqli_fetch_array($result)):
					
					$id				= $row['id'];
					$solicitante 	= $row['solicitante'];
					$tipo 			= $row['tipo']; 
					$setor 			= $row['setor'];
					$equipamento 	= $row['equipamento'];
					$status 		= $row['status']; 	
					$data_cad 		= $row['data_cad'];
					$status 		= $row['status'];				
			 ?>
			<tbody>
				<tr>
					<td ><?php echo $id; ?></td>
					<td><?php echo date("d/m/Y", strtotime($data_cad)); ?></td>
					<td><?php echo $solicitante; ?></td>
					<td  class="btn btn-<?php if($status == '0'){echo 'warning';}elseif($status == '1'){echo 'success';}else{ echo 'danger';} ?>"><?php if($status == '0'){echo 'pendente';}elseif($status == '1'){echo 'aprovada';}else{ echo 'cancelada';} ?></td>
					<td><?php echo $tipo; ?></td>
					<td><?php echo $equipamento; ?></td>
					<td><?php echo $setor; ?></td>
					<td width="80"><button type="button" class="btn btn-dark view_data_ordem_servico" id="<?php echo $id; ?>">visulizar</button></td>
					<td width="80"><button type="button" class="btn btn-primary" id="<?php echo $id; ?>" >editar</button></td>
					<td width="80"><button type="button" class="btn btn-danger data_del_ordem_de_servico" id="<?php echo $id; ?>"data-confirm='Tem certeza que deseja excluir o item selecionado?'>excluir</button></td>
				</tr>
			</tbody>
				<?php endwhile; ?>
		</table>

		<div class="pagination">
		  <a href="#">&laquo;</a>
		  <a href="#">1</a>
		  <a href="#">2</a>
		  <a class="active" href="#">3</a>
		  <a href="#">4</a>
		  <a href="#">5</a>
		  <a href="#">6</a>
		  <a href="#">&raquo;</a>
		</div>
	</div>
</div>