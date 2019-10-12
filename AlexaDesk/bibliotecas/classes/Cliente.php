<?php

class Cliente{

    //funcao para validar dados antes de inserir no banco
    function validarDados(){

    }

    //funcao para gerar senha aleatoria para cliente
    function gerarSenhaAleatoria($tamanho, $maiusculas=false, $minusculas=false, $numeros=false, $simbolos=false){
        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
        $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
        $nu = "0123456789"; // $nu contem os números
        $si = "!@#$%¨&*()_+="; // $si contem os símbolos
        
        if ($maiusculas){
            // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($ma);
        }
    
        if ($minusculas){
            // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($mi);
        }
    
        if ($numeros){
            // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($nu);
        }
    
        if ($simbolos){
            // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($si);
        }

        // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
        return substr(str_shuffle($senha),0,$tamanho);
    }

    //Funcao para montar as variaveis de email do cliente, corpo, sender...
    function montarEmail(){
        $retorno = array();

        $retorno['code'] = true;
        $retorno['retorno'] = "Nova senha enviada com sucesso!";

        return $retorno;

    }

}
