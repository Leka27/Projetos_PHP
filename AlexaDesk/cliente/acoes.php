<?php

include($_SERVER['DOCUMENT_ROOT']."/AlexaDesk/bibliotecas/classes/FuncoesGerais.php");
$FuncoesGerais = new FuncoesGerais();

include($_SERVER['DOCUMENT_ROOT']."/AlexaDesk/bibliotecas/classes/Cliente.php");
$Cliente = new Cliente();

switch ($_POST['acao']) {
    case 'login':
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $tipoLogin = $_POST['tipoLogin'];
        //arrumar o retorno para criar a sessao e o retorno do javascript
        $retorno = $FuncoesGerais->loginUsuario($login,$senha,$tipoLogin);
        
        if($retorno['code']===true){
            session_start(); 
            $_SESSION['cliente_id'] = $retorno['retorno'][0]['cliente_id'];
            $_SESSION['cliente_nome'] = $retorno['retorno'][0]['cliente_nome'];
            $_SESSION['tipoLogin'] = $tipoLogin;
        }
           
        echo json_encode($retorno);
        break;
    case 'buscarCliente':
        $idCliente = $_POST['idCliente'];
        
        $cliente = $FuncoesGerais->selecionarDados("cliente","*","","cliente_id='{$idCliente}'");
        $cliente[0]['cliente_senha'] = base64_decode($cliente[0]['cliente_senha']);
        echo json_encode($cliente);

        break;
    case 'buscarClientes':
        $filtro="";
        if(isset($_POST['tipoFiltro']) && (isset($_POST['filtro']) && !empty($_POST['filtro']))){
            $campoFiltro = $_POST['tipoFiltro'];
            $filtro = "cliente_{$campoFiltro} like '%{$_POST['filtro']}%'";
        }
        
        $cliente['retorno'] =  $FuncoesGerais->selecionarDados("cliente","*","","{$filtro}");

        if($cliente['retorno']==0){
            echo 0;
        }else {
            echo json_encode($cliente);
        }  
        break;
    case 'cadastrar':
        $retorno = array();
        //usar a api php password para criptografar a senha e gravar no banco
        $retornoValidacao = $Cliente->validarDados($_POST);

        if(empty($retornoValidacao)){
            $nome = $_POST['nome'];
            $cpf = str_replace(".","",$_POST['cpf']);
            $cpf = str_replace("-","",$cpf);
            $cpf = $FuncoesGerais->mascaraDados($cpf,'###.###.###-##');
            $senha = base64_encode($_POST['senhaCadastro']);
            $confirmarSenha = $_POST['confirmarSenha'];
            $login = $_POST['loginCadastro'];
            $data_nascimento = $_POST['data_nascimento'];
            $telefone = $_POST['telefone'];

            $cliente = $FuncoesGerais->selecionarDados("cliente","cliente_id",""," cliente_login='{$login}'");

            if($cliente==0){
                $campos = "cliente_nome,cliente_login,cliente_senha,cliente_cpf,cliente_telefone,cliente_data_nascimento,cliente_data_cadastro";
                $valores = "'{$nome}','{$login}','{$senha}','{$cpf}','{$telefone}','{$data_nascimento}',now()";
                $retornoInsercao = $FuncoesGerais->inserirDados("cliente",$campos,$valores);
    
                if($retornoInsercao===true){
                    $retorno['code'] = true;
                    $retorno['retorno']="Cadastro realizado com sucesso!";
                }else{
                    $retorno['code'] = false;
                    $retorno['retorno']="Erro ao cadastrar novo cliente!";
                }
            }else{
                $retorno['code'] = false;
                $retorno['retorno']="Já existe um cliente cadastrado com esse Login.";
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
        $retornoValidacao = $Cliente->validarDados($_POST);

        if(empty($retornoValidacao)){
            $id = $_POST['cliente_id'];
            $nome = $_POST['nome'];
            $cpf = str_replace(".","",$_POST['cpf']);
            $cpf = str_replace("-","",$cpf);
            $cpf = $FuncoesGerais->mascaraDados($cpf,'###.###.###-##');
            $senha = base64_encode($_POST['senhaCadastro']);
            $login = $_POST['loginCadastro'];
            $data_nascimento = $_POST['data_nascimento'];
            $telefone = $_POST['telefone'];

            $campos = "cliente_nome='{$nome}',cliente_login='{$login}',cliente_senha='{$senha}',cliente_cpf='{$cpf}',cliente_telefone='{$telefone}',cliente_data_nascimento='{$data_nascimento}'";
            $where = "cliente_id='{$id}'";
            $retornoAlteracao = $FuncoesGerais->alterarDados("cliente",$campos,$where);

            if($retornoAlteracao===true){
                $retorno['code'] = true;
                $retorno['retorno']="Cadastro atualizado com sucesso!";
            }else{
                $retorno['code'] = false;
                $retorno['retorno']="Erro ao atualizar cadastro cliente!";
            }
        }else{
            $retorno['code'] = false;
            $retorno['retorno']=$retornoValidacao;
        }        
        
        echo json_encode($retorno);
        break;
    case 'deletar':
        break;
    case 'esqueciSenha':
        $retorno = array();
        
        $loginCadastro = $_POST['loginEsqueci'];
        if(empty($loginCadastro)){
            $retorno['code']=false;
            $retorno['retorno']="Campo obrigatório!";
        }else{
            $cliente = $FuncoesGerais->selecionarDados("cliente","cliente_nome,cliente_id,cliente_login","","cliente_login='{$loginCadastro}'");
            if(is_array($cliente)){
                $novaSenha = $Cliente->gerarSenhaAleatoria(10,true,true,true);
                $retorno = $Cliente->montarEmail();
            }else{
                $retorno['code']=false;
                $retorno['retorno']="Não encontramos nenhum cliente com esse Login, por favor tente novamente.";
            }
        }
        
        echo json_encode($retorno);
        break;
    default:
       
        $retorno['code']=false;
        $retorno['retorno']="Método não encontrado.";
        echo json_encode($retorno);
        break;
}









?>