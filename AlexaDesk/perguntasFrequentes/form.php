<?php
  include_once('menu.php');
  $tituloPagina = "Perfil";
  $cliente = $FuncoesGerais->selecionarDados("cliente","*","","cliente_id='{$_SESSION['usuarioId']}'");
  if($_GET['acao']=="a"){
	$acao = "Alterar";
  }else{
	$acao = "Cadastrar";
  }
?>
		<section class="wrapper" style="margin-left:15% !important;">
                <header class="special" style="text-align:left !important;">
                    <h2>Cadastro</h2>
                </header>
                <div class="highlights">
                    <form class="row gtr-uniform" method="post" action="acao.php">
						<input type="hidden" name="id" id="id" value="<?php echo $cliente[0]['cliente_id']; ?>"/>
						<input type="hidden" name="acao" id="acao" value="<?php echo $acao; ?>"/>
                        <div class="col-12 col-12-xsmall">
							<label for="radio-alpha">Nome:</label>
							<input type="text" name="Nome" id="Nome" value="<?php echo $cliente[0]['cliente_nome']; ?>" placeholder="Nome"/>
						</div>
                        <div class="col-12 col-12-xsmall">
							<label for="radio-alpha">Telefone:</label>
                            <input type="tel" name="telefone" id="telefone" value="<?php echo $cliente[0]['cliente_telefone']; ?>" placeholder="Telefone"/>
						</div>
						<div class="col-12 col-12-xsmall">
							<label for="radio-alpha">CPF:</label>
                            <input type="text" name="cpf" id="cpf" value="<?php echo $cliente[0]['cliente_cpf']; ?>" placeholder="CPF"/>
						</div>
						<div class="col-12 col-12-xsmall">
							<label for="radio-alpha">Nascimento:</label>
                            <input type="date" name="nascimento" id="nascimento" value="<?php echo $cliente[0]['cliente_data_nascimento']; ?>" placeholder="DD/MM/AAAA"/>
						</div>
						<div class="col-12 col-12-xsmall">
							<label for="radio-alpha">Login:</label>
                            <input type="text" name="login" id="login" value="<?php echo $cliente[0]['cliente_login']; ?>" placeholder="Login"/>
						</div>
						<div class="col-12 col-12-xsmall">
							<label for="radio-alpha">Senha:</label>
                            <input type="password" name="senha" id="senha" value="<?php echo $cliente[0]['cliente_senha']; ?>" placeholder="Senha"/>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="<?php echo $acao; ?>" class="primary" /></li>
								<li><a href="../clientes/perfil.php" class="button">Voltar</a></li>
                            </ul>
                        </div>
                    </form>
            </div>
        </section>
		<script src="../front/js/jquery.min.js"></script>
		<script src="../front/js/browser.min.js"></script>
		<script src="../front/js/breakpoints.min.js"></script>
		<script src="../front/js/util.js"></script>
		<script src="../front/js/main.js"></script>
	</body>
</html>