<div class="form">
	<form action="processa.php" method="post">		
			<legend>Cadastro de Usuários</legend>
			<?php 
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg']; 
					unset($_SESSION['msg']);
				}else{

				}
			?>
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
			</div>
			<div class="form-group">
				<label>senha:</label>
				<input type="password" class="form-control" name="senha" placeholder="Digite a sua senha">
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="status" id="status" value="0">
			  <label class="form-check-label" for="status">
			    Inativo
			  </label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="status" id="status" value="01">
			  <label class="form-check-label" for="status">
			    Ativo
			  </label>
			</div>
			<div class="form-group">
				<a href="http://localhost/os/usuarios" class="btn btn-dark">voltar</a>
				<input type="submit" name="send" class="btn btn-primary" value="Cadastrar">
			</div>
		</div>
	</form>
</div>
