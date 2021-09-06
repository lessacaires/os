<?php
session_start(); 
if ( isset( $_SESSION["sessiontime"] ) ) { 
	if ($_SESSION["sessiontime"] < time() ) { 
		session_unset();
		header("Location: index.php");
		
		//Seta mais tempo 60 segundos
		$_SESSION["sessiontime"] = time() + 60*4;
	}
} else { 
	session_unset();
	header("Location: index.php");
}
?>
<?php include_once('includes/header.php'); ?>
<?php include_once('includes/sidebar.php'); ?>		
	<div id="content"> 
		<?php
			$Url[1] = (empty($Url[1]) ? null : $Url[1]);
			if(file_exists(REQUIRE_PATH .'/'. $Url[0]. '.php')):
				require REQUIRE_PATH.'/'.$Url[0].'.php';
			elseif(file_exists(REQUIRE_PATH.'/'.$Url[0].'/'.$Url[1].'.php')):
				require REQUIRE_PATH.'/'.$Url[0].'/'.$Url[1].'.php';
			else:
				require REQUIRE_PATH .'/404.php';
			endif;

		  ?>
	</div>
</div>
<?php include_once('includes/footer.php'); ?>
