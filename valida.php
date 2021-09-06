<?php
session_start();
include_once('config/config.php');
$btnlogin 	= filter_input(INPUT_POST, 'btn-login', FILTER_SANITIZE_STRING);
$lembrete 	= filter_input(INPUT_POST, 'lembrete', FILTER_SANITIZE_STRING);
$login 		= filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha 		= filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$login 		= (isset($login)) ? $login : '';
$senha 		= (isset($senha)) ? $senha : '';
$lembrete 	= (isset($lembrete)) ? $lembrete : '';

	if(isset($btnlogin)){
		$senha = md5($senha);
		
		if(!empty($login) && !empty($senha)){
			$sql = 'SELECT * FROM usuarios WHERE login = "'.$login.'" AND senha = "'.$senha.'" AND status = 1 LIMIT 1';
			$query = mysqli_query($mysqli, $sql);

			if($query){
				$row_usuario = mysqli_fetch_assoc($query);
				if($senha == $row_usuario['senha']){
					$_SESSION['id'] 	= $row_usuario['id'];
					$_SESSION['nome'] 	= $row_usuario['nome'];
					$_SESSION['login'] 	= $row_usuario['login'];
					$_SESSION['senha'] 	= $row_usuario['senha'];
					$_SESSION['nivel'] 	= $row_usuario['nivel'];
					$_SESSION["sessiontime"] = time() + 60*4;

					if($lembrete == 'sim'):
 
					   $expira = time() + 60*60*24*30; 
					   setCookie('CookieLembrete', 'sim', $expira);
					   setCookie('CookieEmail', $email, $expira);
					   setCookie('CookieSenha', $senha, $expira);
			 
					else:
			 
					   setCookie('CookieLembrete');
					   setCookie('CookieEmail');
					   setCookie('CookieSenha');
			 
					endif;

					header("Location: home");
				}else{
					$_SESSION['msg'] = "<div class='col-sm-12 alert alert-warning alert-dismissible fade show' role='alert'>Login ou senha incorreto!</div>";
					header('Location: index.php');
				}
			}				
		}else{
			$_SESSION['msg'] = "<div class='col-sm-12 alert alert-warning alert-dismissible fade show' role='alert'>Login ou senha incorreto!</div>";
			header('Location: index.php');
		}
	}else{
		$_SESSION['msg'] = "<div class='col-sm-12 alert alert-warning alert-dismissible fade show' role='alert'>Página não encontrada!</div>";
		header('Location: index.php');
	}
 ?>