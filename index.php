<!DOCTYPE html>
<?php session_start(); ?>
<html lang="pt-br">
<?php 
	$login = (isset($_COOKIE['CookieLogin'])) ? base64_decode($_COOKIE['CookieLogin']) : '';
	$senha = (isset($_COOKIE['CookieSenha'])) ? base64_decode($_COOKIE['CookieSenha']) : '';
	$lembrete = (isset($_COOKIE['CookieLembrete'])) ? base64_decode($_COOKIE['CookieLembrete']) : '';
	$checked = ($lembrete == 'sim') ? 'checked' : '';
 ?>
<head>
	<meta charset="utf-8">
	<title>Área Administativa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="valida.php" method="post" enctype="multipart/form-data">
					<span class="login100-form-title p-b-32">
						Área Restrita
					</span>
							<?php echo $_SESSION['msg'];  ?>									
					<span class="txt1 p-b-11">
						Login
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Login obrigatório">
						<input class="input100" type="text" name="login" placeholder="Digite o seu login">
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Senha
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Senha obrigatória">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="senha" id="senha" placeholder="Digite a sua senha">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" value="sim" type="checkbox" checked="<? $checked; ?>" name="lembrete">
							<label class="label-checkbox100" for="ckb1">
								Manter conectado
							</label>
						</div>

						<div>
							<a href="#" class="txt3">
								Esqueceu sua senha?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="btn-login" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	<script src="js/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/animsition/js/animsition.min.js"></script>
	<script src="js/bootstrap/js/popper.js"></script>
	<script src="js/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/select2/select2.min.js"></script>
	<script src="js/daterangepicker/moment.min.js"></script>
	<script src="js/daterangepicker/daterangepicker.js"></script>
	<script src="js/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('.fa').on('click',function(){
		    	$('#senha').attr('type','password');
		    });
		});
	</script>
</body>
</html>