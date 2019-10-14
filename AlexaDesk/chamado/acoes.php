<?php

include($_SERVER['DOCUMENT_ROOT']."/AlexaDesk/bibliotecas/classes/FuncoesGerais.php");
$FuncoesGerais = new FuncoesGerais();

include($_SERVER['DOCUMENT_ROOT']."/AlexaDesk/bibliotecas/classes/Chamado.php");
$Chamado = new Chamado();

switch ($_POST['acao']) {
    case 'buscarChamado':
        $idChamado = $_POST['idChamado'];
        
        $chamado = $FuncoesGerais->selecionarDados("chamado","*","","chamado_id='{$idChamado}'");
        
        echo json_encode($chamado);

        break;
    case 'buscarChamados':
        $filtro="";

        if(isset($_SESSION['cliente_id'])){
            $filtro .= " chamado_cliente_id=".$_SESSION['cliente_id'];
        }

        if(isset($_POST['tipoFiltro']) && (isset($_POST['filtro']) && $_POST['filtro']!="")){
            
            $campoFiltro = $_POST['tipoFiltro'];
            if(!empty($filtro)){
                $filtro.=" AND ";
            }
            $filtro .= " {$campoFiltro} like '%{$_POST['filtro']}%'";
        }
        
        $chamado['retorno'] = $FuncoesGerais->selecionarDados("chamado","chamado_assunto,motivo_descricao,chamado_flag_status,chamado_id,cliente_nome,motivo_prioridade"," left join cliente on cliente_id=chamado_cliente_id left join motivo on motivo_id=chamado_motivo_id",$filtro);
        $retorno = $FuncoesGerais->selecionarDados("motivo","*"," ","");

        if(($chamado['retorno']==0) || count($chamado['retorno'])==0){
            echo 0;
        }else {
            echo json_encode($chamado);
        }

        break;

    case 'retornarMotivos':
        $motivos = $FuncoesGerais->selecionarDados("motivo","*","","");
        echo json_encode($motivos);
        break;
    case 'retornarClientes':
        $clientes['retorno'] = $FuncoesGerais->selecionarDados("cliente","*","","","ORDER BY cliente_nome");
        echo json_encode($clientes);
        break;
    case 'adicionarInteracao':   
        $idChamado = $_POST['idChamado'];
        $descricaoInteracao = $_POST['descricaoInteracao'];
        
        if(empty($descricaoInteracao)){
            $retorno['code'] = false;
            $retorno['retorno']="Digite algo para registrar!";
        }else{
            $descricaoInteracao = $FuncoesGerais->tratarString($descricaoInteracao);
            
            $interacao_cliente_id = 0;
            if(isset($_SESSION['cliente_id'])){
                $interacao_cliente_id = $_SESSION['cliente_id'];
            }
            $interacao_suporte_id = 0;
            if(isset($_SESSION['suporte_id'])){
                $interacao_suporte_id = $_SESSION['suporte_id'];
                $dadosChamado = $FuncoesGerais->selecionarDados("chamado","*","","chamado_id='{$idChamado}'");

                if($dadosChamado[0]['chamado_suporte_id']<=0){
                    $campos = "chamado_suporte_id='{$interacao_suporte_id}',chamado_data_inicio_atendimento=now(),chamado_flag_status='A'";
                    $where = "chamado_id='{$idChamado}'";
                    $retornoAlteracao = $FuncoesGerais->alterarDados("chamado",$campos,$where);
                }
            }

            $campos = "interacao_descricao,interacao_data_cadastro,interacao_cliente_id,interacao_suporte_id,interacao_chamado_id";
            $valores = "'{$descricaoInteracao}',now(),'{$interacao_cliente_id}','{$interacao_suporte_id}','{$idChamado}'";
            $retornoInsercao = $FuncoesGerais->inserirDados("interacao",$campos,$valores);

            if($retornoInsercao===true){
                $retorno['code'] = true;
                $retorno['retorno']="Nova interacao registrada com sucesso!";
            }else{
                $retorno['code'] = false;
                $retorno['retorno']="Erro ao registrar nova interacao!<br>".$retornoInsercao;
            }
        }

        echo json_encode($retorno);
    
        break;
    case 'cadastrar':
        $retorno = array();
        $retornoValidacao = $Chamado->validarDados($_POST);

        if(empty($retornoValidacao)){
            $chamado_cliente_id = 0;
            if(isset($_SESSION['suporte_id'])){
                $chamado_cliente_id = $_POST['idCliente'];
            }

            if(isset($_SESSION['cliente_id'])){
                $chamado_cliente_id = $_SESSION['cliente_id'];
            }
            $descricao = $FuncoesGerais->tratarString($_POST['descricao']);
            $assunto =  $FuncoesGerais->tratarString($_POST['assunto']);
            $motivo_id = $_POST['motivo'];

            $campos = "chamado_descricao,chamado_motivo_id,chamado_assunto,chamado_prioridade,chamado_data_cadastro,chamado_cliente_id";
            $valores = "'{$descricao}','{$motivo_id}','{$assunto}','{$motivo['prioridade']}',now(),'{$chamado_cliente_id}'";
            $retornoInsercao = $FuncoesGerais->inserirDados("chamado",$campos,$valores);

            if($retornoInsercao===true){
                $retorno['code'] = true;
                $retorno['retorno']="Chamado registrado com sucesso!";
            }else{
                $retorno['code'] = false;
                $retorno['retorno']="Erro ao registrar novo chamado!<br>".$retornoInsercao;
            }                     
        }else{
            $retorno['code'] = false;
            $retorno['retorno']=$retornoValidacao;
        }        
        
        echo json_encode($retorno);
        
        break;
    case 'finalizarChamado':
        $idChamado = $_POST['idChamado'];
        $campos = "chamado_flag_status='F',chamado_data_finalizado=now()";
        $where = "chamado_id='{$idChamado}'";
        $retornoAlteracao = $FuncoesGerais->alterarDados("chamado",$campos,$where);
        if($retornoAlteracao===true){
            $retorno['code'] = true;
            $retorno['retorno']="Chamado finalizado com sucesso!";
        }else{
            $retorno['code'] = false;
            $retorno['retorno']="Erro ao finalizar chamado!<br>".$retornoAlteracao;
        }
        echo json_encode($retorno);

        break;
    default:
        break;
}









?>