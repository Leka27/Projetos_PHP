<?php
$idCliente = $_SESSION['cliente_id'];

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
				<p>Digite seu Login de cadastro para receber uma senha provisória por email</p>
				<form method="post" id="form-esqueci-senha">
					<input type="hidden" name="acao" id="acao" value="esqueciSenha"/>
					<div class="form-group">
						<label for="loginEsqueci" class="col-form-label">Login:</label>
						<input type="text" class="form-control" id="loginEsqueci" placeholder="Login" required/>
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
				<h5 class="modal-title">Cadastro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="form-cadastrar_cliente">
					<input type="hidden" name="acao" id="acao" value="cadastrar"/>
					<div class="form-group">
						<label for="nome" class="col-form-label">Nome:</label>
						<input type="text" class="form-control" id="nome" placeholder="Nome" required/>
					</div>
					<div class="form-group">
						<label for="cpfCliente" class="col-form-label">CPF:</label>
						<input type="text" class="form-control" id="cpf" placeholder="CPF" required/>
					</div>
					<div class="form-group">
						<label for="telefone" class="col-form-label">Telefone:</label>
						<input type="tel" class="form-control" id="telefone" placeholder="(00)0000-0000" pattern="([0-9]{2})-[0-9]{5}-[0-9]{4}" required/>
					</div>
					<div class="form-group">
						<label for="data_nascimento" class="col-form-label">Nascimento:</label>
						<input type="date" class="form-control" id="data_nascimento" placeholder="00/00/0000" required/>
					</div>
					<div class="form-group">
						<label for="loginCadastro" class="col-form-label">Login:</label>
						<input type="email" class="form-control" id="loginCadastro" placeholder="cliente@cliente.com" required/>
					</div>
					<div class="form-group">
						<label for="senhaCadastro" class="col-form-label">Senha:</label>
						<input type="password" class="form-control" id="senhaCadastro" placeholder="*****" required/>
					</div>
					<div class="form-group">
						<label for="confirmarSenha" class="col-form-label">Confirmar senha:</label>
						<input type="password" class="form-control" id="confirmarSenha" placeholder="*****" required/>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="button" id="btn_cadastrar_cliente" class="btn btn-primary">Cadastrar</button>
			</div>
			</div>
		</div>
	</div>
<?php
	break;

	case "alterar":
?>
	
	<div class="modal fade" id="dialogAlterarCliente" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Editar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="form-editar_cliente">
					<input type="hidden" name="acao" id="acao" value="alterar"/>
					<input type="hidden" name="cliente_id" id="cliente_id"/>
					<div class="form-group">
						<label for="nome" class="col-form-label">Nome:</label>
						<input type="text" class="form-control" id="nome" placeholder="Nome" required/>
					</div>
					<div class="form-group">
						<label for="cpf" class="col-form-label">CPF:</label>
						<input type="text" class="form-control" id="cpf" placeholder="CPF" required/>
					</div>
					<div class="form-group">
						<label for="telefone" class="col-form-label">Telefone:</label>
						<input type="text" class="form-control" id="telefone" placeholder="(00)0000-0000" required/>
					</div>
					<div class="form-group">
						<label for="data_nascimento" class="col-form-label">Nascimento:</label>
						<input type="date" class="form-control" id="data_nascimento" placeholder="00/00/0000" required/>
					</div>
					<div class="form-group">
						<label for="loginAlterar" class="col-form-label">Login:</label>
						<input type="email" class="form-control" id="loginAlterar" placeholder="cliente@cliente.com" required/>
					</div>
					<div class="form-group">
						<label for="senhaAlterar" class="col-form-label">Senha:</label>
						<input type="password" class="form-control" id="senhaAlterar" placeholder="*****" required/>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="button" id="btn_editar_cliente" class="btn btn-primary">Alterar</button>
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



