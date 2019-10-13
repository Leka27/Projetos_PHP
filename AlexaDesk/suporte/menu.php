<?php
  include("../bibliotecas/classes/FuncoesGerais.php");
  $FuncoesGerais = new FuncoesGerais();
  $FuncoesGerais->verificaSessao("suporte");

  include($_SERVER['DOCUMENT_ROOT']."/AlexaDesk/bibliotecas/classes/Suporte.php");
  $Suporte = new Suporte();

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $tituloPagina ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../front/css/main.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="funcoes.js"></script>
	</head>
	<body class="is-preload">
		<header id="header">
			<a class="logo" href="#"></a>
			<nav>
				<a href="#menu">Menu</a>
			</nav>
		</header>
		<nav id="menu">
			<ul class="links">
				<li><a href="../suporte/index.php">Página inicial</a></li>
				<li><a href="../chamado/index.php">Chamados</a></li>
				<li><a href="../cliente/listaClientes.php">Clientes</a></li>
				<li><a href="../suporte/listaUsuarios.php">Usuários</a></li>
				<li><a href="../suporte/pagina404.php">FAQ</a></li>
				<li><a href="../suporte/pagina404.php">Relatórios</a></li>
				<li><a href="../suporte/perfil.php">Perfil</a></li>
				<li><a href="../index.php">Log Out</a></li>
			</ul>
		</nav>
		<?php
			if(isset($_GET['m'])){
				?>
					<section class="wrapper"  style='margin-left:10%;'>
						<div class="inner">
							<header class="special">
								<?php echo base64_decode($_GET['m']); ?>
							</header>
						</div>
					</section>
				<?php
			}
		?>
