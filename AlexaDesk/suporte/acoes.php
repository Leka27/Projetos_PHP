<?php

include($_SERVER['DOCUMENT_ROOT']."/AlexaDesk/bibliotecas/classes/FuncoesGerais.php");
$FuncoesGerais = new FuncoesGerais();

include($_SERVER['DOCUMENT_ROOT']."/AlexaDesk/bibliotecas/classes/Suporte.php");
$Suporte = new Suporte();

switch ($_POST['acao']) {
    case 'login':
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $tipoLogin = $_POST['tipoLogin'];
        //arrumar o retorno para criar a sessao e o retorno do javascript
        $retorno = $FuncoesGerais->loginUsuario($login,$senha,$tipoLogin);
        
        if($retorno['code']===true){
            session_start(); 
            $_SESSION['suporte_id'] = $retorno['retorno'][0]['suporte_id'];
            $_SESSION['suporte_nome'] = $retorno['retorno'][0]['suporte_nome'];
            $_SESSION['suporte_perfil_usuario'] = $retorno['retorno'][0]['suporte_perfil_usuario'];
            $_SESSION['tipoLogin'] = $tipoLogin;
        }
           
        echo json_encode($retorno);
        break;
    case 'buscarUsuario':
        $id_suporte = $_POST['id'];
        $suporte = $FuncoesGerais->selecionarDados("suporte","*","","suporte_id='{$id}'");
        echo json_encode($suporte[0]);

        break;
    case 'buscarUsuariosSuporte':
        $filtro = $_POST['filtro'];
        $suporte = $FuncoesGerais->selecionarDados("suporte","*","","{$filtro}");
        echo json_encode($suporte[0]);

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