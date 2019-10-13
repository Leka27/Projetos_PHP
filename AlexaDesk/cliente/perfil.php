<?php
	session_start();
	$tituloPagina = "Perfil";
	include_once('../'.$_SESSION['tipoLogin'].'/menu.php');
	$cliente = $_SESSION['cliente_id'];
	$botaoVoltar ="";
	if(isset($_GET['id'])){
		$cliente = $_GET['id'];
		$botaoVoltar = "<a href='listaClientes.php' class='primary'>Voltar lista</a>";
	}

	$cliente = $FuncoesGerais->selecionarDados("cliente","*","","cliente_id='{$cliente}'");
?>
	<section class="wrapper"  style='margin-left:10%;'>
		<div class="inner">
			<header class="special">
				<h2>Perfil</h2>
			</header>
			<ul class="alt" style="text-align:left;width:60%;margin-left:20%;">
				<li><b>Código:</b> <?php echo $cliente[0]['cliente_id']; ?></li>
				<li><b>Nome:</b> <?php echo $cliente[0]['cliente_nome']; ?></li>
				<li><b>CPF:</b> <?php echo $cliente[0]['cliente_cpf']; ?></li>
				<li><b>Telefone:</b> <?php echo $cliente[0]['cliente_telefone']; ?></li>
				<li><b>Nascimento:</b> <?php echo $FuncoesGerais->corrigeData($cliente[0]['cliente_data_nascimento']); ?></li>
				<li><b>Cadastro:</b> <?php echo $FuncoesGerais->corrigeData($cliente[0]['cliente_data_cadastro']); ?></li>
				<li><button type="button" data-toggle="modal" data-target="#dialogAlterarCliente" idCliente="<?php echo $cliente[0]['cliente_id'] ?>" id="btn_form_editar_cliente" class="primary">Alterar</button>&nbsp;<?php echo $botaoVoltar ?></li>
			</ul>
		</div>
	</section>
<?php
	$acao = "alterar";
	include('form.php');
	include_once('../rodape.php');
?>