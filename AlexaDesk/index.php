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
			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Entre para conhecer o SISTEMA AlexaDesk.</h2>
						<p>Escolha a forma que deseja fazer o login:</p>
					</header>
					<div class="highlights">
						<section>
							<div class="content">
                                <a href="login.php?t=cliente" class="icon fa-vcard-o">
                                    <span class="label">icone</span>
                                    <h3>Cliente</h3>
                                </a>
							</div>
						</section>
						<section>
							<div class="content">
                                <a href="login.php" class="icon fa-vcard-o">
                                    <span class="label">icone</span>
                                    <h3>Suporte</h3>
                                </a>
                            </div>
						</section>
					</div>
				</div>
			</section>

			<footer id="footer copyright">
                &copy;Alexa.
			</footer>

		    <!-- Scripts -->
			<script src="front/js/jquery.min.js"></script>
			<script src="front/js/browser.min.js"></script>
			<script src="front/js/breakpoints.min.js"></script>
			<script src="front/js/util.js"></script>
			<script src="front/js/main.js"></script>
	</body>
</html>