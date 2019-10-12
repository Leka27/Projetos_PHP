<?php
//   $cliente = $FuncoesGerais->selecionarDados("cliente","*","","cliente_id='{$_SESSION['usuarioId']}'");
//   if($_GET['acao']=="a"){
// 	$acao = "Alterar";
//   }else{
// 	$acao = "Cadastrar";
//   }
?>
	<div class="modal fade" id="cadastrarCliente" tabindex="-1" role="dialog" aria-labelledby="addLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">New message</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="addLabel">Inserir </h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="cliente_nome" class="col-form-label">Nome:</label>
						<input type="text" class="form-control" id="cliente_nome" placeholder="Nome">
					</div>
					<div class="form-group">
						<label for="cliente_cpf" class="col-form-label">CPF:</label>
						<input type="text" class="form-control" id="cliente_cpf" placeholder="CPF">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="button" id="cadastrarNovoCliente" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Send message</button>
			</div>
			</div>
		</div>
	</div>
