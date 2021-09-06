		<footer>
				<div class="copy">&copy - Todos os direitos reservados</div>				
		</footer>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/82f149a0fd.js"></script>
	<script src="js/mask.js"></script>
	<script type="text/javascript">
	$('#modal-os').on('shown.bs.modal', function () {
	  $('#myInput').trigger('focus')
	});
	/*MASK*/
	$(document).ready(function(){
	  $('.date').mask('00/00/0000');
	  $('.time').mask('00:00:00');
	  $('.date_time').mask('00/00/0000 00:00:00');
	  $('.cep').mask('00000-000');
	  $('.phone').mask('0000-0000');
	  $('.phone_with_ddd').mask('(00) 0000-0000');
	  $('.phone_us').mask('(000) 000-0000');
	  $('.mixed').mask('AAA 000-S0S');
	  $('.cpf').mask('000.000.000-00', {reverse: true});
	  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
	  $('.money').mask('000.000.000.000.000,00', {reverse: true});
	  $('.money2').mask("#.##0,00", {reverse: true});
	  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
	    translation: {
	      'Z': {
	        pattern: /[0-9]/, optional: true
	      }
	    }
	  });
	  $('.ip_address').mask('099.099.099.099');
	  $('.percent').mask('##0,00%', {reverse: true});
	  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
	  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
	  $('.fallback').mask("00r00r0000", {
	      translation: {
	        'r': {
	          pattern: /[\/]/,
	          fallback: '/'
	        },
	        placeholder: "__/__/____"
	      }
	    });
	  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
	});


	/* VISUALIZA FORNECEDOR */
	$(document).ready(function(){
		$(document).on('click', '.view_data_forn', function(){
			var forn_id = $(this).attr('id');
			if(forn_id !== ''){
				var dados = {
					forn_id : forn_id
				};
				$.post('visualizar-fornecedor.php',dados,function(retorna){
					$('#visulFornecedor').html(retorna);
					$('#visualizaFornecedor').modal('show');
				});
			};
		});
	});
	/* VISUALIZA CATEGORIAS */
	$(document).ready(function(){
		$(document).on('click', '.view_data_cat', function(){
			var cat_id = $(this).attr('id');
			if(cat_id !== ''){
				var dados = {
					cat_id : cat_id
				};
				$.post('visualizar-categoria.php',dados,function(retorna){
					$('#visulCategoria').html(retorna);
					$('#visualizaCategoria').modal('show');
				});
			};
		});
	});
	/* VISUALIZA USUARIOS */
	$(document).ready(function(){
		$(document).on('click', '.view_data_user', function(){
			var user_id = $(this).attr('id');
			if(user_id !== ''){
				var dados = {
					user_id : user_id
				};
				$.post('visualizar-usuario.php',dados,function(retorna){
					$('#visulUsuario').html(retorna);
					$('#visualizaUsuarios').modal('show');
				});
			};
		});
	});
	/* VISUALIZA ORDEM DE SERVIÇO */
	$(document).ready(function(){
		$(document).on('click', '.view_data_ordem_servico', function(){
			var servico_id = $(this).attr('id');
			if(servico_id !== ''){
				var dados = {
					servico_id : servico_id
				};
				$.post('visualizar-ordem-de-servico.php',dados,function(retorna){
					$('#visulOrdemServico').html(retorna);
					$('#visualizaOrdemServico').modal('show');
				});
			};
		});
	});
	/* EDITA CATEGORIAS */
	$('#editaCategoria').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var id = button.data('id') // Extract info from data-* attributes
		var nome = button.data('nome') // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('.modal-title').text('Editar Categoria: ' + nome)
		modal.find('#id').val(id)
		modal.find('#recipient-name').val(nome)
	});
	/* EDITA USUARIO */
	$('#editaUsuario').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var id = button.data('id') // Extract info from data-* attributes
		var nome = button.data('nome') // Extract info from data-* attributes
		var senha = button.data('senha') // Extract info from data-* attributes
		var status = button.data('status') // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('.modal-title').text('Editar Usuário: ' + nome)
		modal.find('#id').val(id)
		modal.find('#recipient-name').val(nome)
		modal.find('#recipient-password').val(senha)
		modal.find('#recipient-status').val(status)
	});
	/* EDITA ORDEM DE SERVIÇO */
	$('#editaOrdemServico').on('show.bs.modal', function (event) {
		var button 				= $(event.relatedTarget) // Button that triggered the modal
		var id 					= button.data('id') // Extract info from data-* attributes
		var solicitante 		= button.data('solicitante') // Extract info from data-* attributes
		var tipo 				= button.data('tipo') // Extract info from data-* attributes
		var setor 				= button.data('setor') // Extract info from data-* attributes
		var equipamento 		= button.data('equipamento') // Extract info from data-* attributes
		var descricao 			= button.data('descricao') // Extract info from data-* attributes
		var observacoes 		= button.data('observacoes') // Extract info from data-* attributes
		var status 				= $("input[name='status']:checked").val();
		var status 				= button.data('status') // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('.modal-title').text('Editar Ordem de Serviço Nº: ' + id)
		modal.find('#id').val(id)
		modal.find('#recipient-solicitante').val(solicitante)
		modal.find('#recipient-tipo').val(tipo)
		modal.find('#recipient-setor').val(setor)
		modal.find('#recipient-equipamento').val(equipamento)
		modal.find('#recipient-descricao').val(descricao)
		modal.find('#recipient-observacoes').val(observacoes)
		modal.find('[name="status"][value="'+status+'"]').prop('checked', true)
	});
	/* EDITA FORNECEDOR */
	$('#editaFornecedor').on('show.bs.modal', function (event) {
		var button 			= $(event.relatedTarget) // Button that triggered the modal
		var id 				= button.data('id') // Extract info from data-* attributes
		var nome 			= button.data('nome') // Extract info from data-* attributes
		var email 			= button.data('email') // Extract info from data-* attributes
		var telefone 		= button.data('telefone') // Extract info from data-* attributes
		var cnpj 			= button.data('cnpj') // Extract info from data-* attributes
		var tipo_servicos 	= button.data('tipo-servicos') // Extract info from data-* attributes
		var status 			= button.data('status') // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('.modal-title').text('Editar Fornecedor: ' + nome)
		modal.find('#id').val(id)
		modal.find('#recipient-nome').val(nome)
		modal.find('#recipient-email').val(email)
		modal.find('#recipient-telefone').val(telefone)
		modal.find('#recipient-cnpj').val(cnpj)
		modal.find('#recipient-tipo-servicos').val(tipo_servicos)
		modal.find('#recipient-status').val(status)
	});
	/* JANELA MODAL DE CONFIRMAÇÃO DE EXCLUSÃO */
	$(document).ready(function(){
		$('a[data-confirm]').click(function(ev){
			var href = $(this).attr('href');
			if(!$('#confirm-delete').length){
				$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR REGISTRO<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja excluir o registro selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirm">Excluir</a></div></div></div></div>');
			}
			$('#dataConfirm').attr('href', href);
			$('#confirm-delete').modal({show:true});
			return false;
		});
	});
	$(function () {
  		$('[data-toggle="tooltip"]').tooltip()
	});
		$(document).ready(function() {
	    $('#relatorio, #data_table').DataTable();
	} );
</script>	
</body>
</html>