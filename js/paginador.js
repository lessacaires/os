var numitens = 3
var pagina = 1

$(document).ready(function(){
	getitens(pagina, numitens);
});

function getitens(pag, maximo){
	pagina =pag;
	$.ajax({
		type: 'GET',
		data: 'tipo=listagem&pag='+pag+'&maximo='+maximo,
		url: 'getitens.php',
		success: function(retorno){
			$('#conteudo').html(retorno)
		}
	});
}

function contador(){
	$.ajax({
		type: 'GET',
		data: 'tipo=contador',
		url: 'getitens.php',
		success:function(retorno_pg){
			paginador(retorno_pg)
		}
	});
}

function paginador(cont){
	if(cont<=numitens){ //Verificando se há mais de uma página
		$('.pagination').html('<tr><td>Apenas uma Página<td><tr>')
	}else{
		$('.pagination').html('<tr></tr>');
		if(pagina!=1){ 
			$('.pagination tr').append('<td><a href="#" onclick="getitens('+(pagina-1)+', '+numitens+')">Página Anterior</a></td>')
		}
		var qtdpaginas=Math.ceil(cont/numitens); //arredondando divisão fracionada para cima
		for(var i=1;i<=qtdpaginas;i++){
			if(pagina==i){
				$('.pagination tr').append('<td  style="background: red"><a href="#" onclick="getitens('+i+', '+numitens+')">'+i+'</a></td>')
			}else{
				$('.pagination tr').append('<td><a href="#" onclick="getitens('+i+', '+numitens+')">'+i+'</a></td>')
				}
		}
		if(pagina!=qtdpaginas){
			$('.pagination tr').append('<td><a href="#" onclick="getitens('+(pagina+1)+', '+numitens+')">Próxima Página</a></td>')
		}
	}
}