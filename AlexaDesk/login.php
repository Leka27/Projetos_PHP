<?php
    include("bibliotecas/classes/FuncoesGerais.php");
    $FuncoesGerais = new FuncoesGerais();

    if(isset($_REQUEST['t']) && ($_REQUEST['t']=="cliente")){
        $tipoLogin = $_REQUEST['t'];
    }else{
        $tipoLogin = "suporte";
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="front/css/main.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="front/js/jquery.min.js"></script>
        <script src="front/js/browser.min.js"></script>
        <script src="front/js/breakpoints.min.js"></script>
        <script src="front/js/funcoesGerais.js"></script>
        <script src="cliente/funcoes.js"></script>
        <script src="front/js/util.js"></script>
        <script src="front/js/main.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </head>
    <body class="is-preload">
        <section class="wrapper" style="margin-left:15% !important;">
            <div class="inner">
                <header class="special" style="text-align:left !important;">
                    <h2>Sistema AlexaDesk</h2>
                </header>
                <div class="highlights">
                    <form class="row gtr-uniform" id="form-login" method="post">
                        <input type="hidden" name="tipoLogin" id="tipoLogin" value="<?php echo $tipoLogin?>"/>
                        <input type="hidden" name="acao" id="acao" value="login"/>
                        <div class="col-12 col-12-xsmall">
                            <input type="text" name="login" id="login" placeholder="Login" required />
                        </div>
                        <div class="col-12 col-12-xsmall">
                            <input type="password" name="senha" id="senha" placeholder="Senha" required />
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="button" id="btn_logar" value="Login" class="primary" /></li>
                                <li><input type="reset" value="Limpar"/></li>
                            </ul>
                        </div>
                        <div class="col-12" id="botoesCliente">
                            <ul class="actions">
                                <li><a href="#" data-toggle="modal" data-target="#dialogCadastrarCliente" class="button small">Cadastre-se</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#dialogEsqueciSenha" class="button small">Esqueci senha</a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
            if($tipoLogin=="cliente"){
                $acaoLink="cliente/acoes.php";
                //Procurar depois uma forma melhor de fazer isso
                $acao = "esqueciSenha";
                include('cliente/form.php');
                $acao = "cadastrar";
                include('cliente/form.php');
            }
        ?>
    </body>
</html>


