<?php 
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg']; 
		unset($_SESSION['msg']);
	}else{

	}

	$sql = "SELECT * FROM fornecedores";
	$result = mysqli_query($mysqli, $sql);			
?>
    <div class="data">
        <h3>Lista de Fornecedores</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastraFornecedor">
            Cadastrar novo Fornecedor
        </button>
        <!-- Modal para visualizar-->
        <div class="modal fade" id="visualizaFornecedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog .modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhe Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="visulFornecedor"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para cadastrar-->
        <div class="modal fade" id="cadastraFornecedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="cadastra-fornecedores.php" method="post">
                            <legend>Cadastro de Fornecedores</legend>
                            <div class="form-group">
                                <label>Nome:</label>
                                <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
                            </div>
                            <div class="form-group">
                                <label>Telefone:</label>
                                <input type="text" class="form-control" name="telefone" placeholder="Digite a sua senha">
                            </div>
                             <div class="form-group">
                                <label>E-mail:</label>
                                <input type="text" class="form-control" name="email" placeholder="Digite a sua senha">
                            </div>
                             <div class="form-group">
                                <label>CNPJ:</label>
                                <input type="text" class="form-control" name="cnpj" placeholder="Digite a sua senha">
                            </div>
                             <div class="form-group">
                                <label>Serviços:</label>
                                <input type="text" class="form-control" name="tipo_servicos" placeholder="Digite a sua senha">
                            </div>
                            <div class="form-group">
                                <label>Situação:</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="0">
                                    <label class="form-check-label" for="status">
                                        inativo
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" checked="checked" value="1">
                                    <label class="form-check-label" for="status">
                                        ativo
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <input type="submit" name="send" class="btn btn-primary" value="Cadastrar Fornecedor">
	                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal para editar-->
        <div class="modal fade" id="editaFornecedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editando Fornecedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="editar-fornecedor.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nome:</label>
                                <input type="text" class="form-control" id="recipient-nome" name="nome">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Telefone:</label>
                                <input type="text" class="form-control" id="recipient-telefone" name="telefone">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Email:</label>
                                <input type="text" class="form-control" id="recipient-email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">CNPJ:</label>
                                <input type="text" class="form-control" id="recipient-cnpj" name="cnpj">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Serviços:</label>
                                <input type="text" class="form-control" id="recipient-tipo-servicos" name="tipo-servicos">
                            </div>
                            <div class="form-group">
                                <label>Situação:</label>
                                <br>
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
                <td>Telefone</td>
                <td>E-mail</td>
                <td>CNPJ</td>
                <td>Serviços</td>
                <td>Status</td>
                <td colspan="3">Ações</td>
            </thead>

            <tbody>
                <?php 
			while($row = mysqli_fetch_array($result)):
				$id 		    = $row['id'];
				$nome 		    = $row['nome'];
				$telefone 	    = $row['telefone'];
                $email          = $row['email'];
                $cnpj           = $row['cnpj'];
                $tipo_servicos  = $row['tipo_servicos'];
				$data_cad 	    = $row['data_cad'];
				$data_mod	    = $row['data_mod'];
				$status 	    = $row['status'];
			?>
                    <tr>
                        <td>
                            <?php echo $nome;  ?>
                        </td>
                        <td class="phone_with_ddd"><?php echo $telefone;  ?></td>
                        <td><?php echo $email;  ?></td>
                        <td class="cnpj"><?php echo $cnpj;  ?></td>
                        <td><?php echo $tipo_servicos;  ?></td>
                        <td class="btn btn-<?php echo ($status == '0') ? 'danger' : 'success' ; ?>">
                            <?php echo ($status == '0') ? "inativo" : "ativo" ; ?>
                        </td>
                        <td width="80">
                            <button type="button" class="btn btn-info view_data_forn" id="<?php echo $id ?>">visulizar</button>
                        </td>
                        <td width="80">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editaFornecedor" data-id="<?php echo $id; ?>" data-nome="<?php echo $nome; ?>" data-telefone="<?php echo $telefone; ?>" data-email="<?php echo $email; ?>" data-cnpj="<?php echo $cnpj; ?>" data-tipo-servicos="<?php echo $tipo_servicos; ?>" data-status="<?php echo $status; ?>">editar</button>
                        </td>
                        <td width="80"><a href="excluir-fornecedor.php?id=<?php echo $id ?>" class="btn btn-danger" data-confirm="Tem certeza que deseja excluir o usuário selecionado?">excluir</a></td>
                    </tr>
                    <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    </div>