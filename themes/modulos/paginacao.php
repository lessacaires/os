<?php
include("connect.php");
$limite = 5;
if (isset($_GET['pag'])){
	$pagina = $_GET['pag'];
}else{
	$pagina = 1;
}
$inicio = ($pagina * $limite) - $limite;
$sql = "SELECT username, date_format(AcctStartTime, '%d/%m/%Y') AS Date_I,
	date_format(AcctStartTime, '%T') AS Time_I, 
	date_format(AcctStopTime, '%d/%m/%Y') AS Date_F, 
	date_format(AcctStopTime, '%T') AS Time_F,
	timediff(AcctStopTime,AcctStartTime) AS Time_D FROM radacct  ORDER BY AcctStartTime LIMIT $inicio,$limite"; 
$query = $mysqli->query($sql);
while($dados = $query->fetch_array()){
	echo '<ul>';
	echo '<li>';
	echo '<strong>cpf:</strong> '.$dados['username'].'<br />';
	if($dados['Date_I'] == $dados['Date_F']){
		echo '<strong> Data de Início da conexão:</strong> '.$dados['Date_I'].'<br />';
		
		$hora_I = explode(":",$dados['Time_I']);
		$hora_I = mktime($hora_I[0],$hora_I[1],$hora_I[2],0,0,0);
		$hora_F = explode(":",$dados['Time_F']);
		$hora_F = mktime($hora_F[0],$hora_F[1],$hora_F[2],0,0,0);
		
		echo '<strong> Início:</strong> '.$dados['Time_I'].'<br />';
		echo '<strong> Fim:</strong> '.$dados['Time_F'].'</li>';
		echo '<strong> Tempo de conexão:</strong> ';
		echo $dados['Time_D'].'</li></ul>';
	}else{
		echo '<strong> Data de Início da conexão:</strong> '.$dados['Date_I'].'<br />';
		echo '<strong> Hora de Início da conexão:</strong> '.$dados['Time_I'].'<br />';
		echo '<strong> Data de Fim da conexão:</strong> '.$dados['Date_F']."<br />";
		echo '<strong> Hora de Fim da conexão:</strong> '.$dados['Time_F'].'<br />';
		echo '<strong> Tempo de conexão:</strong> ';
		echo $dados['Time_D'].'</li></ul>';
	}
}
$lim_pag = 4;
$consulta = "SELECT username FROM radacct";
$result = $mysqli->query($consulta);
$total_registros = $result->num_rows;
/*
Aqui usa-se a função "Ceil" para arredondar resultados para cima,
para que sejam evitados resultados como 4.5, neste exemplo o resultado
seria 5.
*/
$total_paginas = Ceil($total_registros / $limite);
$inicio = ((($pagina - $lim_pag) > 1) ? $pagina - $lim_pag : 1);
$fim = ((($pagina+$lim_pag) < $total_paginas) ? $pagina+$lim_pag : $total_paginas);
echo '<p align="center">';
echo "Total de registros encontrados: ".$total_registros."<br />";
if($pagina > 1){
	echo '<a href="paginacao.php">Página Inicial</a> ';
	echo "\t";
}
if($total_paginas > 1 && $pagina <= $total_paginas){
	for($i = $inicio; $i <= $fim; $i++){
		if($pagina == $i){
			echo " ".$i." ";
		}else{
			echo '<a href="paginacao.php?pag='.$i.'"> '.$i.'</a>';
		}
	}
}
if($pagina != $total_paginas){
	echo "\t";
	echo '<a href="paginacao.php?pag='.$total_paginas.'"> Última página</a>';
}
echo '</p>';
?>