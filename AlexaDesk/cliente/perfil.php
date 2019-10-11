<?php
  include_once('menu.php');
  $tituloPagina = "Perfil";
  $cliente = $FuncoesGerais->selecionarDados("cliente","*","","cliente_id='{$_SESSION['usuarioId']}'");
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
						<li><a href="form.php?acao=a&i=<?php echo$cliente[0]['cliente_id']; ?>" class="button primary">Alterar</a></li>
					</ul>
				</div>
			</section>
			
			<script src="../front/js/jquery.min.js"></script>
			<script src="../front/js/browser.min.js"></script>
			<script src="../front/js/breakpoints.min.js"></script>
			<script src="../front/js/util.js"></script>
			<script src="../front/js/main.js"></script>
	</body>
</html>