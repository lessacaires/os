<div id="sidebar">
<nav>
	<div class="menu">
		<span class="titulo">Navegação Paginas</span>
		<ul>
		<?php if($_SESSION['nivel'] != '0' && $_SESSION['nivel'] != '1' && $_SESSION['nivel'] != '2' ):?>
			<li>
				<a href="home">Home</a>
				<a href="<?php echo HOME ?>/usuarios">Usuários</a>
				<a href="<?php echo HOME ?>/ordem-de-servico">Ordens de Serviço</a>
				<a href="logoff.php">Sair</a>
			</li>
		<?php else: ?>
			<li>
				<a href="home">Home</a>
				<a href="logoff.php">Sair</a>
			</li>
		</ul>
		<ul>
			<span class="titulo">Navegação Admin</span>
			<li>
				<a href="<?php echo HOME ?>/categorias">Categorias</a>
				<a href="<?php echo HOME ?>/usuarios">Usuários</a>
				<a href="<?php echo HOME ?>/fornecedor">Fornecedores</a>
				<a href="<?php echo HOME ?>/ordem-de-servico">Ordens de Serviço</a>
				<a href="<?php echo HOME ?>/relatorio">Relatório OS</a>
			</li>
		<?php endif; ?>
		</ul>
	</div>
</nav>
</div>	