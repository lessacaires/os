<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include_once("config/config.php"); ?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistema Ordem de Serviço</title>	
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">


</head>
<body>
<div id="container-fluid">
	<div id="box">
		<header>
				<div class="logo"></div>
				  <p class="lead" style="text-align: center; position: relative; top: -50px;">Olá <?php echo $_SESSION['nome']."."; ?> Seja muito bem vindo. Hoje <?php echo date('d/m/Y'); ?></p>
		</header>
		
		<div id="search">
			<div class="search">
				<div class="sector1">
					<div class="search">
						<form action="pesquisa" method="post" name="pesquisa">
							<h3>PESQUISAR ORDEM DE SERVIÇO</h3>
							<div class="form-row">
							    <div class="form-group col-4">
							      <label>Palavra chave:</label>
							      <input type="text" class="form-control" id="inputSearch" name="pesquisa" placeholder="Digite o termo a ser pesquisado">
							    </div>
							    <div class="form-group col-md-2">
							      <label>Data inicial:</label>
							      <input type="date" class="form-control" id="inputDate" name="data_inicio" placeholder="Digite a data inicial">
							    </div>
							    <div class="form-group col-md-2">
							      <label>Data final:</label>
							      <input type="date" class="form-control" id="inputDate" name="data_fim" placeholder="Digite a data final">
							    </div>
							    <div class="form-group col-md-2">
							      <label>Status:</label>
							      <select id="inputStatus" name="status" class="form-control">
							        <option value="" selected="selected">Escolha...</option>
							        <option value="0">pendente</option>
							        <option value="1">aprovada</option>
							        <option value="2">executando</option>
							        <option value="3">cancelada</option>
							        <option value="4">encerrada</option>
							      </select>
							    </div>
							    <div class="col-auto">
							    	<button type="submit" name="send" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"  data-toggle="tooltip" data-placement="bottom" title="Pesquisar ordem de serviço" ></i></button>
							    </div>
							</div>							 
						</form>
					</div>
			</div>	
		</div>
	</div>