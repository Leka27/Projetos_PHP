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
        $retorno = $FuncoesGerais->loginUsuario($login,$senha);
        
        if($retorno['code']===true){
            session_start(); 
            $_SESSION['suporte_id'] = $retorno['retorno'][0]['suporte_id'];
            $_SESSION['suporte_nome'] = $retorno['retorno'][0]['suporte_nome'];
            $_SESSION['tipoLogin'] = $tipoLogin;
            $_SESSION['suporte_perfil_usuario'] = $retorno['retorno'][0]['suporte_perfil_usuario'];
        }
           
        echo json_encode($retorno);
        break;
    case 'buscarUsuarioSuporte':
        $idSuporte = $_POST['idSuporte'];
        
        $suporte = $FuncoesGerais->selecionarDados("suporte","*","","suporte_id='{$idSuporte}'");
        $suporte[0]['suporte_senha'] = base64_decode($suporte[0]['suporte_senha']);
        echo json_encode($suporte);

        break;
    case 'buscarUsuarios':
        $filtro="";
        if(isset($_POST['tipoFiltro']) && (isset($_POST['filtro']) && !empty($_POST['filtro']))){
            $campoFiltro = $_POST['tipoFiltro'];
            $filtro = "suporte_{$campoFiltro} like '%{$_POST['filtro']}%'";
        }
        
        $suporte['retorno'] = $FuncoesGerais->selecionarDados("suporte","*","",$filtro);

        if($suporte['retorno']==0){
            echo 0;
        }else {
            echo json_encode($suporte);
        }        

        break;
    case 'cadastrar':
        $retorno = array();
        //usar a api php password para criptografar a senha e gravar no banco
        $retornoValidacao = $Suporte->validarDados($_POST);

        if(empty($retornoValidacao)){
            $nome = $_POST['nome'];
            $senha = base64_encode($_POST['senhaCadastro']);
            $login = $_POST['loginCadastro'];
            $perfil = $_POST['perfilCadastro'];

            $suporte = $FuncoesGerais->selecionarDados("suporte","suporte_id",""," suporte_login='{$login}'");

            if($suporte==0){
                $campos = "suporte_nome,suporte_login,suporte_senha,suporte_data_cadastro,suporte_perfil_usuario";
                $valores = "'{$nome}','{$login}','{$senha}',now(),'{$perfil}'";
                $retornoInsercao = $FuncoesGerais->inserirDados("suporte",$campos,$valores);
    
                if($retornoInsercao===true){
                    $retorno['code'] = true;
                    $retorno['retorno']="Cadastro realizado com sucesso!";
                }else{
                    $retorno['code'] = false;
                    $retorno['retorno']="Erro ao cadastrar novo usuário!<br>".$retornoInsercao;
                }
            }else{
                $retorno['code'] = false;
                $retorno['retorno']="Já existe um usuário cadastrado com esse Login.";
            }           
        }else{
            $retorno['code'] = false;
            $retorno['retorno']=$retornoValidacao;
        }        
        
        echo json_encode($retorno);
        
        break;
    case 'alterar':
        $retorno = array();
        //usar a api php password para criptografar a senha e gravar no banco
        $retornoValidacao = $Suporte->validarDados($_POST);

        if(empty($retornoValidacao)){
            $id = $_POST['suporte_id'];
            $nome = $_POST['nome'];
            $senha = base64_encode($_POST['senhaCadastro']);
            $login = $_POST['loginCadastro'];

            $campos = "suporte_nome='{$nome}',suporte_login='{$login}',suporte_senha='{$senha}'";
            $where = "suporte_id='{$id}'";
            $retornoAlteracao = $FuncoesGerais->alterarDados("suporte",$campos,$where);

            if($retornoAlteracao===true){
                $retorno['code'] = true;
                $retorno['retorno']="Cadastro atualizado com sucesso!";
            }else{
                $retorno['code'] = false;
                $retorno['retorno']="Erro ao atualizar cadastro suporte! <br>".$retornoAlteracao;
            }
        }else{
            $retorno['code'] = false;
            $retorno['retorno']=$retornoValidacao;
        }        
        
        echo json_encode($retorno);
        break;
    case 'deletar':
        # code...
        break;
    default:
        header("Location: pagina404.php");
        break;
}









?>