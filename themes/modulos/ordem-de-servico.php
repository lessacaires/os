<?php 
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg']; 
		unset($_SESSION['msg']);
	}else{

	}
?>
    <div class="data"> 
        <h3>Lista de Ordem de Serviço</h3>     
        <button type="button" class="btn btn-primary" data-target="#modal-os" data-toggle="modal" data-placement="bottom" title="Abrir Nova Ordem de Serviço" >
            <i class="far fa-plus-square"></i>
        </button>
        <!-- Modal para visualizar Ordem de Serviço-->
        <div class="visualizar visibility" id="yesprint">
            <div class="modal fade" id="visualizaOrdemServico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="logo"><img src="images/logo.png"></div>
                            <h5 class="modal-title" id="exampleModalLabel">Detalhe da Ordem de Serviço</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span id="visulOrdemServico"></span>
                        </div>
                        <div class="ass">
                            <div class="ass_resp">
                                <span class="ass_chefe col-sm-4">Assinatura Manutenção</span>
                                <span class="ass_adm col-sm-3">Assintatura Administrativo</span>
                                <span class="ass_ger col-sm-4">Assinatura Gerência</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-relatorio" onclick="window.print()"><span>Print</span><i class="fa fa-print" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal para editar Ordem de Serviço-->
        <div class="modal fade" id="editaOrdemServico" tabindex="-1" role="dialog" aria-labelledby="editaOrdemServico" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editaOrdemServico">Alterar Ordem de Servico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="editar-ordem-de-servico.php" enctype="multipat/form-data">
                  <div class="row">
                        <div class="form-group col-md-3">
                            <label>Solicitante:</label>
                            <input type="text" class="form-control" name="solicitante" id="recipient-solicitante">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tipo de Serviço:</label>
                            <input type="text" class="form-control" name="tipo" id="recipient-tipo">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Setor:</label>
                            <input type="text" class="form-control" name="setor" id="recipient-setor">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Equipamento:</label>
                            <input type="text" class="form-control" name="equipamento" id="recipient-equipamento">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Descrição:</label>
                            <textarea class="form-control" name="descricao" id="recipient-descricao"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Observações Técnicas:</label>
                            <textarea class="form-control" name="observacoes" id="recipient-observacoes"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Situação:</label><br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="recipient-status" value="0" <?php echo ($status_check  == "0")? "checked" : "" ; ?>>
                          <label class="form-check-label" for="status">
                            pendente
                          </label>
                          <div id="mostrar" style="display:none;"></div>                          
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="recipient-status" value="1" <?php echo ($status_check  == "1")? "checked" : "" ; ?>>
                          <label class="form-check-label" for="status">
                            aprovada
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="recipient-status" value="2" <?php echo ($status_check  == "2")? "checked" : "" ; ?>>
                          <label class="form-check-label" for="status">
                            em andamento
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="recipient-status" value="3" <?php echo ($status_check  == "3")? "checked" : "" ; ?>>
                          <label class="form-check-label" for="status">
                            cancelada
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="recipient-status" value="4" <?php echo ($status_check  == "4")? "checked" : "" ; ?>>
                          <label class="form-check-label" for="status">
                            encerrada
                          </label>
                        </div>
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
        <!-- Modal para cadastrar Ordem de Serviço-->
        <div class="modal fade" id="modal-os" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="cadastra-ordem-de-servico.php" method="post">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
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
                                    <label>Observações Técnicas:</label>
                                    <textarea class="form-control" name="obs" placeholder="Digite as observações se necessário"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Situação:</label>
                                <br>
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
                                        em andamento
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="3">
                                    <label class="form-check-label" for="status">
                                        cancelada
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="4">
                                    <label class="form-check-label" for="status">
                                        encerrada
                                    </label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <input type="submit" name="send" class="btn btn-primary" value="Abir Ordem de Serviço">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table border="0">
            <thead>
                <td>OS</td>
                <td>Abertura</td>
                <td>Solicitante</td>
                <td>Status</td>
                <td>Serviço</td>
                <td>Equipamento</td>
                <td>Setor</td>
                <td colspan="3">Ações</td>
            </thead>
            <?php
                //Serve para contar quantos registro você tem na sua tabela de registros
                if($_SESSION['nivel'] != '0' && $_SESSION['nivel'] != '1' && $_SESSION['nivel'] != '2' ):
                    $sql = "SELECT * FROM servicos WHERE  status <> '4' AND  criacao = '".$_SESSION['nome']."'";
                else:
                    $sql = "SELECT * FROM servicos WHERE  status <> '4'";
                endif;
                    $result = mysqli_query($mysqli, $sql);
                    $countTotal = mysqli_num_rows($result);

                /*INICIO DA PAGINAÇÃO*/
                $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
                if($_SESSION['nivel'] != '0' && $_SESSION['nivel'] != '1' && $_SESSION['nivel'] != '2' ):
                $result_os = "SELECT * FROM servicos  WHERE  status <> '4' AND  criacao = '".$_SESSION['nome']."'";
                else:
                $result_os = "SELECT * FROM servicos WHERE  status <> '4'";
                endif;  
                $resultado_os = mysqli_query($mysqli, $result_os);
                $total_os = mysqli_num_rows($resultado_os);
                $quantidade_paginas = 8;

                $num_pagina = ceil($total_os/$quantidade_paginas);
                $inicio = ($quantidade_paginas*$pagina)-$quantidade_paginas;
                if($_SESSION['nivel'] != '0' && $_SESSION['nivel'] != '1' && $_SESSION['nivel'] != '2' ):
                    $result_os = "SELECT * FROM servicos WHERE  status <> '4' AND criacao = '".$_SESSION['nome']."' ORDER BY id DESC LIMIT $inicio, $quantidade_paginas";
                else:
                    $result_os = "SELECT * FROM servicos WHERE  status <> '4' ORDER BY id DESC LIMIT $inicio, $quantidade_paginas ";
                endif;
                $resultado_os = mysqli_query($mysqli, $result_os);
                $total_registros = mysqli_num_rows($resultado_os);
            ?>
             <tbody>
            <?php
            if($total_registros == 0){
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <i class='fa fa-info-circle' aria-hidden='true'></i>Nenhum resultado para ser apresentado.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
            }else{
                
				while($row = mysqli_fetch_array($resultado_os)):

					$id				= $row['id'];
					$solicitante 	= $row['solicitante'];
					$tipo 			= $row['tipo']; 
					$setor 			= $row['setor'];
					$equipamento 	= $row['equipamento'];
                    $descricao      = $row['descricao'];
                    $observacoes    = $row['observacoes'];
					$status 		= $row['status']; 	
					$data_cad 		= $row['data_cad'];
					$status 		= $row['status'];
                    $criacao        = $row['criacao'];				
			 ?>
                    <tr>
                        <td>
                            <?php echo $id; ?>
                        </td>
                        <td>
                            <?php echo date("d/m/Y", strtotime($data_cad)); ?>
                        </td>
                        <td>
                            <?php echo $solicitante; ?>
                        </td>
                        <td class="btn btn-<?php if($status == '0'){echo 'pendente';}elseif($status == '1'){echo 'aprovada';}elseif($status == '2'){ echo 'executando';}elseif($status == '3'){echo 'cancelada';}elseif($status == '4'){echo 'encerrada';} ?>">
                            <?php if($status == '0'){echo 'pendente';}elseif($status == '1'){echo 'aprovada';}elseif($status == '2'){ echo 'executando';}elseif($status == '3'){echo 'cancelada';}elseif($status == '4'){echo 'encerrada';} ?>
                        </td>
                        <td>
                            <?php echo $tipo; ?>
                        </td>
                        <td>
                            <?php echo $equipamento; ?>
                        </td>
                        <td>
                            <?php echo $setor; ?>
                        </td>
                        <td width="80">
                            <button type="button" class="btn btn-info view_data_ordem_servico" data-toggle="tooltip" data-placement="bottom" title="Visualizar Registro" id="<?php echo $id; ?>"><i class="far fa-eye"></i></button>
                        </td>
                        <td width="80">
                            <button name="editar" type="button" class="btn btn-primary editar" id="<?php echo $id; ?>" data-toggle="modal" data-target="#editaOrdemServico" data-id="<?php echo $id; ?>" data-solicitante="<?php echo $solicitante; ?>" data-tipo="<?php echo $tipo; ?>" data-setor="<?php echo $setor; ?>" data-equipamento="<?php echo $equipamento; ?>" data-descricao="<?php echo $descricao; ?>" data-observacoes="<?php echo $observacoes; ?>" data-status="<?php echo $status; ?>"><i class="far fa-edit"></i></button></td>
                        <td width="80">
                        <?php if($_SESSION['nivel'] <= 2 ): ?>
                          <a class="btn btn-danger data_del_ordem_de_servico" data-toggle="tooltip" data-placement="bottom" title="Excluir Registro" href="excluir-ordem-de-servico.php?id=<?php echo $id; ?>"data-confirm='Tem certeza que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i></a>                           
                        <?php else:?>
                             <a class="btn btn-danger data_del_ordem_de_servico"><i class="far fa-trash-alt"></i></a>
                        <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; }?>
            </tbody>
        </table>
        <?php 
            $pagina_anterior = $pagina -1;
            $pagina_posterior = $pagina + 1; 
         ?>
        <?php 
            if($total_registros > $quantidade_paginas){

            }else{
         ?>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <?php if($pagina_anterior != 0){?>
                <li class="page-item">
                  <a class="page-link" href="ordem-de-servico&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                    <span aria-hidden="true">Anterior</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
            <?php }else{?>
                <li class="page-item disabled">
                    <a class="page-link" aria-label="Previous">
                    <span aria-hidden="true">Anterior</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
            <?php } ?>
            <?php 
                for($i=1; $i < $num_pagina + 1; $i++){?>
                <li class="page-item  <?php echo ($pagina == $i)? 'active': '';?>"><a class="page-link" href="<?php  ?>ordem-de-servico&pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            <?php if($pagina_posterior <= $num_pagina){?>
                <li class="page-item">
                  <a class="page-link" href="ordem-de-servico&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
                    <span aria-hidden="true">Próxima</span>
                    <span class="sr-only">Próxima</span>
                  </a>
                </li>
            <?php }else{ ?>
                <li class="page-item disabled">
                  <a class="page-link" aria-label="Next">
                    <span aria-hidden="true">Próxima</span>
                    <span class="sr-only">Próxima</span>
                  </a>
                </li>
            <?php } ?>
          </ul>
        </nav>
    <?php } ?>
    </div>
    </div>