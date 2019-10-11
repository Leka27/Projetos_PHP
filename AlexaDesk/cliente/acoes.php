<?php
include("../bibliotecas/classes/FuncoesGerais.php");
$FuncoesGerais = new FuncoesGerais();

include("../bibliotecas/classes/Clientes.php");
$Clientes = new Clientes();

switch ($_POST['acao']) {
    case 'login':
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $tipoLogin = $_POST['tipoLogin'];
        //arrumar o retorno para criar a sessao e o retorno do javascript
        $retorno = $FuncoesGerais->loginUsuario($login,$senha,$tipoLogin);
        session_start(); 
        $_SESSION['cliente_Id'] = $retorno['retorno'][0]['cliente_id'];
        $_SESSION['cliente_nome'] = $retorno['retorno'][0]['cliente_nome'];
        $_SESSION['tipoLogin'] = $tipoLogin;


        echo json_encode($retorno);
        heade("Location: {$retorno['redirecionar']}");

        break;
    case 'buscarCliente':
        $id_cliente = $_POST['id'];
        $cliente = $FuncoesGerais->selecionarDados("cliente","*","","cliente_id='{$id}'");
        echo json_encode($cliente[0]);

        break;
    case 'buscarClientes':
        $filtro = $_POST['filtro'];
        $cliente = $FuncoesGerais->selecionarDados("cliente","*","","{$filtro}");
        echo json_encode($cliente[0]);

        break;
    case 'cadastrar':
        //usar a api php password para criptografar a senha e gravar no banco

        # code...
        break;
    case 'alterar':
        # code...
        break;
    case 'deletar':
        # code...
        break;

    case 'esqueciSenha':
        # code...
        break;
    default:
        echo "Ação não encontrada";
        header("Location: pagina404.html");
        break;
}









?>