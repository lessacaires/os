<?php 
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg']; 
		unset($_SESSION['msg']);
	}else{

	}

	$sql = "SELECT * FROM usuarios";
	$result = mysqli_query($mysqli, $sql);			
?>
<div class="data">
		<h3>Lista de Usuários</h3>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastraUsuario">
  			Cadastrar novo Usuário
		</button>
		<!-- Modal para visualizar-->
		<div class="modal fade" id="visualizaUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Detalhe Usuário</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <span id="visulUsuario"></span>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Modal para cadastrar-->
		<div class="modal fade" id="cadastraUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <form action="cadastra-usuario.php" method="post">		
					<legend>Cadastro de Usuários</legend>
						<div class="form-group">
							<label>Nome:</label>
							<input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
						</div>
						<div class="form-group">
							<label>Senha:</label>
							<input type="password" class="form-control" name="senha" placeholder="Digite a sua senha">
						</div>
						<div class="form-group">
							<label>Situação:</label><br>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="status" id="status" value="0">
							  <label class="form-check-label" for="status">
							    inativo
							  </label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="status" id="status" value="1">
							  <label class="form-check-label" for="status">
							    ativo
							  </label>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="send" class="btn btn-primary" value="Cadastrar">
						</div>
					</div>
				</form>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!--Modal para editar-->
		<div class="modal fade" id="editaUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Editando Usuário</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form method="post" action="editar-usuarios.php" enctype="multipart/form-data">
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label">Nome:</label>
		            <input type="text" class="form-control" id="recipient-name" name="nome">
		          </div>
		          <div class="form-group">
		            <label for="message-text" class="col-form-label">Senha:</label>
		            <input type="password" class="form-control" id="recipient-password" name="senha">
		          </div>
		        	<div class="form-group">
						<label>Situação:</label><br>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="status" id="recipient-status" checked="<?php echo ($status == 0) ? 'checked' : '' ?>" value="0">
							  <label class="form-check-label" for="recipient-status">
							    inativo
							  </label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="status" id="recipient-status" checked="<?php echo ($status == 1) ? 'checked' : '' ?>" value="1">
							  <label class="form-check-label" for="recipient-status">
							    ativo
							  </label>
							</div>
							<input type="hidden" name="id" id="id">
						</div>
						<div class="modal-footer">
				        	<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
				        	<button type="submit" class="btn btn-danger">Salvar Alterações</button>
				      	</div>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>
		<table border="0">
			<thead>
				<td>Nome</td>
				<td>Data Cadastro</td>
				<td>Data Atualização</td>
				<td>Status</td>
				<td colspan="3">Ações</td>
			</thead>

			<tbody>
			<?php 
			while($row = mysqli_fetch_array($result)):
				$id 		= $row['id'];
				$nome 		= $row['nome'];
				$senha 		= $row['senha'];
				$data_cad 	= $row['data_cad'];
				$data_mod	= $row['data_mod'];
				$status 	= $row['status'];
			?>			
				<tr>
					<td><?php echo $nome;  ?></td>
					<td><?php echo date('d/m/Y h:m:i', strtotime($data_cad)); ?></td>
					<td><?php echo date('d/m/Y h:m:i', strtotime($data_mod)); ?></td>
					<td class="btn btn-<?php echo ($status == '0') ? 'danger' : 'success' ; ?>"><?php echo ($status == '0') ? "inativo" : "ativo" ; ?></td>
					<td width="80"><button type="button" class="btn btn-dark view_data_user" id="<?php echo $id ?>">visulizar</button></td>
					<td width="80"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editaUsuario" data-id="<?php echo $id; ?>" data-nome="<?php echo $nome; ?>" data-senha="<?php echo $senha; ?>" data-status="<?php echo $status; ?>">editar</button></td>
					<td width="80"><a href="excluir-usuario.php?id=<?php echo $id ?>" class="btn btn-danger" data-confirm="Tem certeza que deseja excluir o usuário selecionado?">excluir</a></td>
				</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
</div>