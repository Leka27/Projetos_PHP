<?php
	$tituloPagina = "Perfil";
	include_once('menu.php');
	$usuario = $_SESSION['suporte_id'];
	$botaoVoltar ="";
	if(isset($_GET['id'])){
		$usuario = $_GET['id'];
		$botaoVoltar = "<a href='listaUsuarios.php' class='primary'>Voltar lista</a>";
	}
	$suporte = $FuncoesGerais->selecionarDados("suporte","*","","suporte_id='{$usuario}'");
?>
	<section class="wrapper"  style='margin-left:10%;'>
		<div class="inner">
			<header class="special">
				<h2>Perfil</h2>
			</header>
			<ul class="alt" style="text-align:left;width:60%;margin-left:20%;">
				<li><b>Código:</b> <?php echo $suporte[0]['suporte_id']; ?></li>
				<li><b>Nome:</b> <?php echo $suporte[0]['suporte_nome']; ?></li>
				<li><b>Login:</b> <?php echo $suporte[0]['suporte_login']; ?></li>
				<li><b>Admissão:</b> <?php echo $FuncoesGerais->corrigeData($suporte[0]['suporte_data_cadastro']); ?></li>
				<li><b>Perfil:</b> <?php echo $FuncoesGerais->corrigeData($suporte[0]['suporte_perfil_usuario']); ?></li>
				<li><button type="button" data-toggle="modal" data-target="#dialogAlterarUsuarioSuporte" idSuporte="<?php echo $suporte[0]['suporte_id'] ?>" id="btn_form_editar_usuario_suporte" class="primary">Alterar</button> &nbsp;<?php echo $botaoVoltar ?></li>
			</ul>
		</div>
	</section>
<?php
	$acao = "alterar";
	include('form.php');
	include_once('../rodape.php');
?>