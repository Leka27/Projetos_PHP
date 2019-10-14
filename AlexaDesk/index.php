<?php
  include("bibliotecas/classes/FuncoesGerais.php");
  $FuncoesGerais = new FuncoesGerais();
  $FuncoesGerais->logOut();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Página inicial</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="front/css/main.css" />
	</head>
	<body class="is-preload">
		<header id="header">
			<a class="logo" ></a>
			<nav>
				<a href="#menu"></a>
			</nav>
		</header>
		<!-- Nav -->
		<nav id="menu">
			<ul class="links">
				<li><a href="login.php?t=cliente">Portal cliente</a></li>
				<li><a href="#">Sobre</a></li>s
			</ul>
		</nav>
		<div id="heading" >
			<h1>Sistema AlexaDesk</h1>
		</div>
		<section id="main" style="margin-left:10%" class="wrapper">
			<div class="inner">
				<div class="content">
					<header>
						<h2>Sistema AlexaDesk</h2>
					</header>
					<p>Meu sistema de atendimento basico de suporte.</p>
					<p>Credito do template utilizado: Templated.</p>
				</div>
			</div>
		</section>

			<footer id="footer">
				<div class="inner">
					<div class="content">
						<section>
							<p>Sistema criado como forma de avaliacao de conhecimentos.</p>
						</section>
						<section>
							<h4>Acessos</h4>
							<ul class="alt">
								<li><a href="login.php?t=cliente">Acesso portal cliente.</a></li>
								<li><a href="login.php">Acesso portal suporte.</a></li>
							</ul>
						</section>
						<section>
							<h4>Links</h4>
							<ul class="plain">
								<li><a href="https://github.com/Leka27/Projetos_PHP/tree/master/AlexaDesk"><i class="icon fa-github">&nbsp;</i>Github</a></li>
							</ul>
						</section>
					</div>
					<div class="copyright">&copy;Alexa</a>.
            </div>
        </div>
    </footer>

		    <!-- Scripts -->
			<script src="front/js/jquery.min.js"></script>
			<script src="front/js/browser.min.js"></script>
			<script src="front/js/breakpoints.min.js"></script>
			<script src="front/js/util.js"></script>
			<script src="front/js/main.js"></script>
	</body>
</html>