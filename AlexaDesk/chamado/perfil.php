<?php
	session_start();
	$tituloPagina = "Chamado";
	include_once('../'.$_SESSION['tipoLogin'].'/menu.php');
	$botaoVoltar ="";
	if(isset($_GET['id'])){
		$chamadoId = $_GET['id'];
		$botaoVoltar = "<a href='listaChamados.php' class='primary'>Voltar lista</a>";
	}
	$chamado = $FuncoesGerais->selecionarDados("chamado","*"," left join suporte on chamado_suporte_id=suporte_id left join cliente on cliente_id=chamado_cliente_id left join motivo on motivo_id=chamado_motivo_id","chamado_id='{$chamadoId}'");
	if($chamado[0]['chamado_flag_status']=="A"){
		$status="Atendimento";
	}else if($chamado[0]['chamado_flag_status']=="F"){
		$status="Finalizado";
	}else{
		$status="Pendente";
	}

	if($chamado[0]['chamado_flag_status']!="F"){
		if(isset($_SESSION['suporte_id'])){
			$botaoFinalizar = '<button type="button" id="btn_finalizar_chamado" idChamado="'.$chamado[0]['chamado_id'] .'" id="btn_form_editar_usuario_suporte" class="primary">Finalizar chamado</button> &nbsp';
		}
		$botaAdicionarInteracao = '<button type="button" data-toggle="modal" id="btn_form_adicionar_interacao" data-target="#dialogAdicionarInteracaoChamado" idChamado="'.$chamado[0]['chamado_id'].'" id="btn_form_editar_usuario_suporte" class="primary">Adicionar interação</button> &nbsp';
	}
?>
	<section id="main" class="dadosChamado" style="text-align:left;width:100%;float:left;">
		<div class="inner">
			<header class="special">
				<h2>Dados chamado</h2>
			</header>
			<ul class="alt">
				<li><b>Código:</b> <?php echo $chamado[0]['chamado_id']; ?></li>
				<li><b>Cliente:</b> <?php echo $chamado[0]['cliente_nome']; ?></li>
				<li><b>Status:</b> <?php echo $status; ?></li>
				<li><b>Atendente:</b> <?php echo $chamado[0]['suporte_nome']=="" ? "Nenhum" : $chamado[0]['suporte_nome']; ?></li>
				<li><b>Abertura:</b> <?php echo $FuncoesGerais->corrigeData($chamado[0]['chamado_data_cadastro']) ?></li>
				<li><b>Finalização:</b> <?php echo $FuncoesGerais->corrigeData($chamado[0]['chamado_data_finalizado']) ?></li>
				<li><b>Inicio Atendimento:</b> <?php echo $FuncoesGerais->corrigeData($chamado[0]['chamado_data_inicio_atendimento']) ?></li>
				<li><b>Motivo:</b> <?php echo $chamado[0]['motivo_descricao'] ?></li>
				<li><b>Assunto:</b> <?php echo $chamado[0]['chamado_assunto']; ?></li>
				<p><b>Descrição:</b> <?php echo $chamado[0]['chamado_descricao']; ?></p>
				<li>
					<?php echo $botaoFinalizar ?>
					<?php echo $botaoVoltar ?>
				</li>
			</ul>
		</div>
	</section>
<?php
	$interacoes = $FuncoesGerais->selecionarDados("interacao","*"," left join chamado on chamado_id=interacao_chamado_id left join suporte on chamado_suporte_id=suporte_id left join cliente on cliente_id=chamado_cliente_id","interacao_chamado_id='{$chamadoId}'");
?>
	<section id="main" class="dadosChamado" style="text-align:left;width:100%;float:left;">
		<div class="inner">
			<header class="special">
				<h2>Interações</h2>
			</header>
			<?php echo $botaAdicionarInteracao ?>
			<div style="margin-top:5px;" class="table-wrapper">
			<?php
				foreach ($interacoes as $key => $interacao) {
					
					if($interacao['interacao_cliente_id']!=0){
						$usuario = "Cliente - ".$interacao['cliente_nome'];
						$corLinha = "#F0F8FF";
					}
					if($interacao['interacao_suporte_id']!=0){
						$usuario = "Suporte - ".$interacao['suporte_nome'];
						$corLinha = "#FFFACD";
					}
			?>		
				<dl style="border: 1px solid black;background-color:<?php echo $corLinha ?> !important">	
					<dt ><?php echo $FuncoesGerais->corrigeData($interacao['interacao_data_cadastro'])." - ". $usuario; ?></dt>
					<dd>
						<p><?php echo $interacao['interacao_descricao']; ?></p>
					</dd>
				</dl>
			<?php
				}
			?>
										
			</div>
		</div>
	</section>
	
<?php
	$acao = "adicionarInteracao";
	include('form.php');
	include_once('../rodape.php');
?>