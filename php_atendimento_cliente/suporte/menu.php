<?php
  session_start();   
  include("../bibliotecas/FuncoesGerais.php");
  $FuncoesGerais = new FUNCOESGERAIS();
  $FuncoesGerais->verificaSessao();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $tituloPagina ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../front/css/main.css" />
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
					<li><a href="chamados.php">Chamados</a></li>
					<li><a href="duvidas.php">Dúvidas</a></li>
					<li><a href="generic.html">Perfil</a></li>
					<li><a href="../index.php">Log Out</a></li>
				</ul>
			</nav>