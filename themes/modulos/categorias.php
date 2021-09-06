<?php 
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg']; 
		unset($_SESSION['msg']);
	}else{

	}

	$sql = "SELECT * FROM categorias";
	$result = mysqli_query($mysqli, $sql);			
?>
    <div class="data">
        <h3>Lista de Categorias</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastraCategoria">
            Cadastrar nova Categoria
        </button>
        <!-- Modal para visualizar-->
        <div class="modal fade" id="visualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhe Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="visulCategoria"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para cadastrar-->
        <div class="modal fade" id="cadastraCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="cadastra-categoria.php" method="post">
                            <legend>Cadastro de Categoria</legend>
                            <div class="form-group">
                                <label>Nome:</label>
                                <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
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
        <div class="modal fade" id="editaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editando Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="editar-categoria.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nome:</label>
                                <input type="text" class="form-control" id="recipient-name" name="nome">
                            </div>
                            <input type="hidden" name="id" id="id">
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
                <td>Nome da Categoria</td>
                <td colspan="3">Ações</td>
            </thead>

            <tbody>
                <?php 
			while($row = mysqli_fetch_array($result)):
				$id 		= $row['id'];
				$nome 		= $row['nome'];
			?>
                    <tr>
                        <td>
                            <?php echo $nome;  ?>
                        </td>
                        <td width="80">
                            <button type="button" class="btn btn-info view_data_cat" id="<?php echo $id ?>">visulizar</button>
                        </td>
                        <td width="80">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editaCategoria" data-id="<?php echo $id; ?>" data-nome="<?php echo $nome; ?>">editar</button>
                        </td>
                        <td width="80"><a href="excluir-categoria.php?id=<?php echo $id ?>" class="btn btn-danger" data-confirm="Tem certeza que deseja excluir registro selecionado?">excluir</a></td>
                    </tr>
                    <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    </div>