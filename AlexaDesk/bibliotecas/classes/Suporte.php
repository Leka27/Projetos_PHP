<?php

class Suporte{

    function validarDados($dados){
        $erros = "";

        if(isset($dados['nome']) && empty($dados['nome'])){
            $erros .= "Campo Nome é obrigatório.</br>";
        }

        if(isset($dados['loginCadastro']) && empty($dados['loginCadastro'])){
            $erros .= "Campo Login é obrigatório.</br>";
        }else{
            if(filter_var($dados['loginCadastro'],FILTER_VALIDATE_EMAIL)===false){
                $erros .= "Digite um email válido no campo Login.</br>";
            }
        }

        if(isset($dados['senhaCadastro']) && empty($dados['senhaCadastro'])){
            $erros .= "Campo Senha é obrigatório.</br>";
        }

        return $erros;
    }

}

