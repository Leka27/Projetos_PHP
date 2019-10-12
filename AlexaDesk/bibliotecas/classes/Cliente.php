<?php

class Cliente{

    //funcao para validar dados antes de inserir no banco
    function validarDados($dados){
        $erros = "";

        if(isset($dados['nome']) && empty($dados['nome'])){
            $erros .= "Campo Nome é obrigatório.</br>";
        }

        if(isset($dados['cpf']) && empty($dados['cpf'])){
            $erros .= "Campo CPF é obrigatório.</br>";
        }else{
            if($this->validaCPF($dados['cpf'])===false){
                $erros .= "Digite um CPF válido.</br>";
            }
        }

        if(isset($dados['loginCadastro']) && empty($dados['loginCadastro'])){
            $erros .= "Campo Login é obrigatório.</br>";
        }else{
            if(filter_var($dados['loginCadastro'],FILTER_VALIDATE_EMAIL)===false){
                $erros .= "Digite um email válido no campo Login.</br>";
            }
        }

        if(isset($dados['data_nascimento']) && empty($dados['data_nascimento'])){
            $erros .= "Campo Nascimento é obrigatório.</br>";
        }

        if(isset($dados['senhaCadastro']) && empty($dados['senhaCadastro'])){
            $erros .= "Campo Senha é obrigatório.</br>";
        }else{
            if(isset($dados['confirmarSenha']) && empty($dados['confirmarSenha'])){
                $erros .= "Campo Confirmar senha é obrigatório.</br>";
            }else if(isset($dados['confirmarSenha']) && ($dados['confirmarSenha']!=$dados['senhaCadastro'])){
                $erros .= "Campo senha e confirmar senha devem ser iguais.</br>";
            }
        }
        return $erros;
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

    function validaCPF($cpf = null) {
        // Verifica se um número foi informado
        if(empty($cpf)) {
            return false;
        }
    
        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        
        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            return false;
         // Calcula os digitos verificadores para verificar se o
         // CPF é válido
         } else {   
            
            for ($t = 9; $t < 11; $t++) {
                
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
    
            return true;
        }
    }

    //Funcao para montar as variaveis de email do cliente, corpo, sender...
    function montarEmail(){
        $retorno = array();

        $retorno['code'] = true;
        $retorno['retorno'] = "Ainda será desenvlvida essa função!";

        return $retorno;

    }

}
