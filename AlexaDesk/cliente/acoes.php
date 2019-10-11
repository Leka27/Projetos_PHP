<?php
include("../bibliotecas/classes/FuncoesGerais.php");
$FuncoesGerais = new FuncoesGerais();
$FuncoesGerais->verificaSessao();

include("../bibliotecas/classes/Clientes.php");
$Clientes = new Clientes();
$Clientes->verificaSessao();

switch ($_POST['acao']) {
    case 'Alterar':
        
        

        break;
    case 'Cadastrar':
        # code...
        break;
    default:
        # code...
        break;
}









?>