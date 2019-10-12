<?php
 $acao = "esqueciSenha";
 $idCliente = "";

 switch ($acao) {
	 case "esqueciSenha":
?>
		<div class="modal fade" id="dialogEsqueciSenha" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Esqueci senha</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Digite seu CPF de cadastro para receber uma senha provisória por email</p>
					<form method="post" id="form-esqueci-senha">
						<input type="hidden" name="acao" id="acao" value="esqueciSenha"/>
						<div class="form-group">
							<label for="cpf" class="col-form-label">CPF:</label>
							<input type="text" class="form-control" id="cpf" placeholder="CPF" required/>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<button type="button" id="btn_enviar_senha" class="btn btn-primary">Enviar</button>
				</div>
				</div>
			</div>
		</div>
<?php
		break;

		case "cadastrar":
?>
		<div class="modal fade" id="dialogCadastrarCliente" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Esqueci senha</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Digite seu CPF de cadastro para receber uma senha provisória por email</p>
					<form method="post" id="form-esqueci-senha">
						<input type="hidden" name="acao" id="acao" value="esqueciSenha"/>
						<!-- <div class="form-group"> -->
							<label for="cpf" class="col-form-label">CPF:</label>
							<input type="text" class="form-control" id="cpf" placeholder="CPF" required/>
						<!-- </div> -->
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<button type="button" id="btn_enviar_senha" class="btn btn-primary">Enviar</button>
				</div>
				</div>
			</div>
		</div>
<?php
		break;
	 
	 default:
		 # code...
		 break;
 }
?>



	<!-- <div class="modal fade" id="cadastrarCliente" tabindex="-1" role="dialog" aria-labelledby="addLabel">
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
			</div>
		</div>
	</div> -->
