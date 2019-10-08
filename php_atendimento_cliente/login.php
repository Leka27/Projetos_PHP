<?php

include("bibliotecas/FuncoesGerais.php");
$FuncoesGerais = new FUNCOESGERAIS();

if(isset($_REQUEST['t'])){
    $tipoLogin = $_REQUEST['t'];
}
echo <<<EOT
    <!DOCTYPE HTML>
        <html>
            <head>
                <title>Login</title>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
                <link rel="stylesheet" href="front/css/main.css" />
            </head>
            <body class="is-preload">
EOT;

if(!isset($_REQUEST['logar'])){
    echo <<<EOT
        <section class="wrapper">
            <div class="inner">
                <header class="special">
                    <h2>SISTEMA SUPORTE LEGAL</h2>
                </header>
                <div class="highlights">
                    <form style="margin-left:35%;" method="post" action="login.php">
                        <div class="row gtr-uniform">
                            <input type="hidden" name="logar" id="logar" value="true"/>
                            <input type="hidden" name="tipoLogin" id="tipoLogin" value="{$tipoLogin}"/>
                            <div class="col-12 col-12-xsmall">
                                <input type="text" name="login" id="login" value="" placeholder="Login"/>
                            </div>
                            <div class="col-12 col-12-xsmall">
                                <input type="password" name="senha" id="senha" value="" placeholder="Senha"/>
                            </div>
                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Login" class="primary" /></li>
                                    <li><input type="reset" value="Limpar"/></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>
        </body>
    </html>
EOT;
    // echo "teste";
    // $result = mysqli_query($FuncoesGerais->connect, "Select * from cliente");

    // if (mysqli_num_rows($result) > 0) {
    //     while($row = mysqli_fetch_assoc($result)) {
    //         echo "Name: " . $row["cliente_nome"]. "<br>";
    //     }
    // } else {
    //     echo "0 results";
    // }

}else{
    if($tipoLogin=="S"){
       echo "Suporte ";
    }else if($tipoLogin=="C"){
        echo "cliente";
    }else{
        echo "Não identificado o formato de login, contacte o suporte tecnico.";
    }
   
    

}
  
















?>