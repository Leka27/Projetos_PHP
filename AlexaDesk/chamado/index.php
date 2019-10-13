<?php
  include_once('suporte/menu.php');
  $tituloPagina = "Pagina inicial";
?>
	<section class="wrapper"  style='margin-left:10%;'>
		<div class="inner">
			<header class="special">
				<h2>Bem vindo Suporte <?php echo $_SESSION['suporte_nome']; ?></h2>
			</header>
		</div>
	</section>
			
<?php
  include_once('suporte/rodape.php');
?>