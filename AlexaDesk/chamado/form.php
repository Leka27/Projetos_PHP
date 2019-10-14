<?php

switch ($acao) {
	case "cadastrar":
?>
	<div class="modal fade" style="margin-top:50px;" id="dialogCadastrarChamado" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Cadastro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="form-cadastrar_chamado">
					<input type="hidden" name="acao" id="acao" value="cadastrar"/>
					<input type="hidden" name="tipoLogin" id="tipoLogin" value="<?php echo $_SESSION['tipoLogin'] ?>"/>
					<div class="form-group" id="campoClienteCadastro">
						<label for="clienteCadastro" class="col-form-label">Cliente:</label>
						<select name="clienteCadastro" class="form-control" id="clienteCadastro">
							<option></option>
						</select>
					</div>
					<div class="form-group">
						<label for="motivoCadastro" class="col-form-label">Motivo:</label>
						<select name="motivoCadastro" class="form-control" id="motivoCadastro">
							<option></option>
						</select>
					</div>
					<div class="form-group">
						<label for="assuntoCadastro" class="col-form-label">Assunto:</label>
						<input type="text" class="form-control" id="assuntoCadastro" placeholder="Assunto" required/>
					</div>
					<div class="form-group">
						<label for="descricaoCadastro" class="col-form-label">Descrição:</label>
						<textarea rows="5" class="form-control" id="descricaoCadastro" placeholder="Descreva o problema"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btn_cadastrar_chamado" class="btn btn-primary">Cadastrar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
			</div>
		</div>
	</div>
<?php
	break;

	case "adicionarInteracao":
?>	
	<div class="modal fade" style="margin-top:50px;" id="dialogAdicionarInteracaoChamado" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Adicionar interação</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="form-adicionar-interacao">
					<input type="hidden" name="acao" id="acao" value="adicionarInteracao"/>
					<input type="hidden" name="idChamado" id="idChamado"/>
					<div class="form-group">
						<label for="descricaoInteracao" class="col-form-label">Descrição:</label>
						<textarea rows="8" class="form-control" id="descricaoInteracao" placeholder="Escreva uma resposta"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btn_cadastrar_interacao_chamado" class="btn btn-primary">Enviar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
			</div>
		</div>
	</div>
<?php
	break;
}
?>



