<?php
  include_once('menu.php');
  $tituloPagina = "Pagina inicial";
?>
			<section class="wrapper"  style='margin-left:10%;'>
				<div class="inner">
					<header class="special">
                        <h2>Bem vindo Cliente <?php echo $_SESSION['usuarioNome']; ?></h2>
                        <p>Por favor desfrute das funcionalidades do nosso sistema.</p>
					</header>
				</div>
			</section>
			<script src="../front/js/jquery.min.js"></script>
			<script src="../front/js/browser.min.js"></script>
			<script src="../front/js/breakpoints.min.js"></script>
			<script src="../front/js/util.js"></script>
			<script src="../front/js/main.js"></script>
	</body>
</html>