<?php

class Chamado{

    function validarDados($dados){
        $erros = "";

        if(isset($dados['motivo']) && $dados['motivo']<0){
            $erros .= "Campo Motivo é obrigatório.</br>";
        }

        if(isset($dados['assunto']) && empty($dados['assunto'])){
            $erros .= "Campo Assunto é obrigatório.</br>";
        }

        if(isset($dados['descricao']) && empty($dados['descricao'])){
            $erros .= "Campo Descrição é obrigatório.</br>";
        }

        return $erros;
    }
}

