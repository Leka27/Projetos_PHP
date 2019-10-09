<?php

include("bibliotecas/FuncoesGerais.php");
$FuncoesGerais = new FUNCOESGERAIS();

if(isset($_REQUEST['t'])){
    $tipoLogin = $_REQUEST['t'];
}else if(isset($_POST['tipoLogin'])){
    $tipoLogin = $_POST['tipoLogin'];
}
echo <<<EOT
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="front/css/main.css" />
        <script src="front/js/jquery.min.js"></script>
        <script src="front/js/browser.min.js"></script>
        <script src="front/js/breakpoints.min.js"></script>
        <script src="front/js/util.js"></script>
        <script src="front/js/main.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body class="is-preload">
        <section class="wrapper" style="margin-left:15% !important;">
            <div class="inner">
                <header class="special" style="text-align:left !important;">
                    <h2>SISTEMA SUPORTE LEGAL</h2>
                </header>
                <div class="highlights">
                    <form class="row gtr-uniform" method="post" action="login.php">
                        <input type="hidden" name="logar" id="logar" value="true"/>
                        <input type="hidden" name="tipoLogin" id="tipoLogin" value="{$tipoLogin}"/>
                        <div class="col-12 col-12-xsmall">
                            <input type="text" name="login" id="login" placeholder="Login"/>
                        </div>
                        <div class="col-12 col-12-xsmall">
                            <input type="password" name="senha" id="senha" placeholder="Senha"/>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="Login" class="primary" /></li>
                                <li><input type="reset" value="Limpar"/></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>
EOT;

if(isset($_POST['logar'])){
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    if(empty($login) || empty($senha)){
        $mensagem = "Ambos campos são obrigatórios!";
        $js = "location.href='login.php?t={$tipoLogin}';";
    }else{
        if($tipoLogin=="S"){
            $retorno = $FuncoesGerais->selecionarDados("suporte","*","","suporte_login='{$login}' AND suporte_senha='{$senha}'");
            if(is_array($retorno)){
                session_start(); 
                $_SESSION['usuarioId'] = $retorno[0]['suporte_id'];
                $_SESSION['usuarioNome'] = $retorno[0]['suporte_nome'];
                $_SESSION['tipoLogin'] = $tipoLogin;
                $mensagem = "Login realizado com sucesso!";
                $js = "location.href='./suporte/index.php';";
            }else{
                $mensagem = "Email ou senha incorretos tente novamente!";
                $js = "location.href='login.php?t={$tipoLogin}';";
            }
        }else if($tipoLogin=="C"){
            $retorno = $FuncoesGerais->selecionarDados("cliente","*","","cliente_login='{$login}' AND cliente_senha='{$senha}'");
            if(is_array($retorno)){
                session_start(); 
                $_SESSION['usuarioId'] = $retorno[0]['cliente_id'];
                $_SESSION['usuarioNome'] = $retorno[0]['cliente_nome'];
                $_SESSION['tipoLogin'] = $tipoLogin;
                $mensagem = "Login realizado com sucesso!";
                $js = "location.href='./clientes/index.php';";
            }else{
                $mensagem = "Email ou senha incorretos tente novamente!";
                $js = "location.href='login.php?t={$tipoLogin}';";
            }
        }else{
            $mensagem = "Não identificado tipo de login, selecione a forma que deseja entrar no sistema!";
            $js = "location.href='index.php';";
        }
    }
    echo <<<EOT
        <div id="dialog-confirm" title="">
            <p>
                {$mensagem}
            </p>
        </div> 
        <script>
            $( function() {
                $( "#dialog-confirm" ).dialog({
                resizable: false,
                height: 200,
                width: 400,
                modal: true,
                buttons: {
                    "Ok": function() {
                        $( this ).dialog( "close" );
                        {$js}
                    }
                }
                });
            } );
        </script>
EOT;
}
















?>