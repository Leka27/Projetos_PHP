<?php
$idCliente = $_SESSION['cliente_id'];

switch ($acao) {
	case "cadastrar":
?>
	<div class="modal fade" id="dialogCadastrarUsuarioSuporte" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Cadastro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="form-cadastrar_usuario_suporte">
					<input type="hidden" name="acao" id="acao" value="cadastrar"/>
					<div class="form-group">
						<label for="nomeCadastro" class="col-form-label">Nome:</label>
						<input type="text" class="form-control" id="nomeCadastro" placeholder="Nome" required/>
					</div>
					<div class="form-group">
						<label for="perfilCadastro" class="col-form-label">Senha:</label>
						<select name="perfilCadastro" class="form-control" id="perfilCadastro">
							<option value="suporte">Suporte</option>
							<option value="admin">Administrador</option>
							<option value="diretor">Diretor</option>
						</select>
					</div>
					<div class="form-group">
						<label for="loginCadastro" class="col-form-label">Login:</label>
						<input type="email" class="form-control" id="loginCadastro" placeholder="usuario@usuario.com" required/>
					</div>
					<div class="form-group">
						<label for="senhaCadastro" class="col-form-label">Senha:</label>
						<input type="password" class="form-control" id="senhaCadastro" placeholder="*****" required/>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				<button type="button" id="btn_cadastrar_usuario_suporte" class="btn btn-primary">Cadastrar</button>
			</div>
			</div>
		</div>
	</div>
<?php
	break;

	case "alterar":
?>	
	<div class="modal fade" id="dialogAlterarUsuarioSuporte" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Editar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="form-editar_usuario_suporte">
					<input type="hidden" name="acao" id="acao" value="alterar"/>
					<input type="hidden" name="suporte_id" id="suporte_id"/>
					<div class="form-group">
						<label for="nomeAlterar" class="col-form-label">Nome:</label>
						<input type="text" class="form-control" id="nomeAlterar" placeholder="Nome" required/>
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
				<button type="button" id="btn_editar_usuario_suporte" class="btn btn-primary">Alterar</button>
			</div>
			</div>
		</div>
	</div>
<?php
	break;
}
?>



