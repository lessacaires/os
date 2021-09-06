<?php 
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg']; 
		unset($_SESSION['msg']);
	}else{

	}

	if($_SESSION['nivel'] >= '2' ):
        $sql = "SELECT * FROM servicos WHERE criacao = '".$_SESSION['nome']."'";
    else:
        $sql = "SELECT * FROM servicos";
    endif;
	$result = mysqli_query($mysqli, $sql);			
?>
    <div class="relatorio">
    <div class="logo"></div>	
        <h3>Relatório de Ordem de Serviços</h3>
        <table id="relatorio" class="display" style="width:100%">
            <thead>
            	<th>OS</th>
                <th>Abertura</th>
                <th>Solicitante</th>
                <th>Status</th>
                <th>Serviço</th>
                <th>Equipamento</th>
                <th>Setor</th>
            </thead>
            <tbody>
            <?php 
            	while($row = mysqli_fetch_assoc($result)):
            		$id				= $row['id'];
					$solicitante 	= $row['solicitante'];
					$tipo 			= $row['tipo']; 
					$setor 			= $row['setor'];
					$equipamento 	= $row['equipamento'];
                    $descricao      = $row['descricao'];
                    $observacoes    = $row['observacoes'];
					$status 		= $row['status']; 	
					$data_cad 		= $row['data_cad'];
                    $criacao        = $row['criacao'];	
            ?>
            	<tr>
	            	<td><?php echo $id; ?></td>
	                <td><?php echo date('d/m/y',strtotime($data_cad)); ?></td>
	                <td><?php echo $solicitante; ?></td>
	                <td><?php if($status == '0'){echo 'pendente';}elseif($status == '1'){echo 'aprovada';}elseif($status == '2'){ echo 'executando';}elseif($status == '3'){echo 'cancelada';}elseif($status == '4'){echo 'encerrada';} ?></td>
	                <td><?php echo $tipo; ?></td>
	                <td><?php echo $equipamento; ?></td>
	                <td><?php echo $setor; ?></td>
            	</tr>
            <?php endwhile; ?>
            </tbody>
            <tfoot>
	            <tr>
	                <th>OS</th>
	                <th>Abertura</th>
	                <th>Solicitante</th>
	                <th>Status</th>
	                <th>Serviço</th>
	                <th>Equipamento</th>
	                <th>Setor</th>
	            </tr>
        	</tfoot>
        </table>
        <button type="button" class="btn btn-dark btn-relatorio" onclick="window.print()"><span>Print</span><i class="fa fa-print" aria-hidden="true"></i></button>
    </div>
    </div>