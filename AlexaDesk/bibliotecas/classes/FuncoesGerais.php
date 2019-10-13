<?php
session_start();

class FuncoesGerais{
    public $connect = "";

    //Ao instanciar a classe irá iniciar a conexao com banco
    function __construct()
    {
        include($_SERVER['DOCUMENT_ROOT']."/AlexaDesk/bibliotecas/configuracoes/ConfGeral.php");
        $ConfGeral = new ConfGeral();
        
        $dbname = $ConfGeral->getDbDatabase();
        $user = $ConfGeral->getDbUser();
        $pw = $ConfGeral->getDbPass();
        $host = $ConfGeral->getDbHost();
        $this->connect = $this->conexaoBanco($dbname,$user,$pw,$host);
    }

    //Função que realiza a conexao com banco de dados
    function conexaoBanco($dbname,$user,$pw,$host){
        $conn = mysqli_connect($host,$user,$pw,$dbname);

        // Check connection
        if (mysqli_connect_errno()){
            die("Conexão com banco de dados não realizada, por favor contacte o suporte técnico e informe a seguinte mensagem:" . mysqli_connect_error());
        }else{
            return $conn;
        }
    }

    
    function verificaSessao(){
        session_start();
        if(!isset($_SESSION['tipoLogin'])){
            session_destroy();
            unset($_SESSION);
            $this->connect->close();
            header('location: /AlexaDesk/index.php');
        }
    }

    function logOut(){
        session_start();
        session_destroy();
        unset($_SESSION);
        $this->connect->close();
    }

    function inserirDados($tabela,$campos,$valores){
        $sql = "INSERT INTO {$tabela} ({$campos}) VALUES ({$valores})";

        if ($this->connect->query($sql) === TRUE) {
            return true;
        } else {
            return "Erro ao inserir dados: " . $sql . "<br> Erro:" . $this->connect->error;
        }
    }

    function deletarDados($tabela,$where){
        if(!empty($where)){
            $where = " WHERE ".$where;
        }
        $sql = "DELETE FROM {$tabela} {$where}";

        if ($this->connect->query($sql) === TRUE) {
            return true;
        } else {
            return "Erro ao deletar dados: " . $sql . "<br> Erro:" . $this->connect->error;
        }
    }

    function alterarDados($tabela,$campos,$where){
        if(!empty($where)){
            $where = " WHERE ".$where;
        }
        $sql = "UPDATE {$tabela} SET {$campos} {$where}";

        if ($this->connect->query($sql) === TRUE) {
            return true;
        } else {
            return "Erro ao alterar dados: " . $sql . "<br> Erro:" . $this->connect->error;
        }
    }

    function selecionarDados($tabela,$campos,$joins,$where){
        if(!empty($where)){
            $where = " WHERE ".$where;
        }
        $sql = "SELECT {$campos} FROM {$tabela} {$joins} {$where}";

        $result = $this->connect->query($sql);
        $dados = array();
        if (!$this->connect->error) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $dados[]=$row;
                }
                return $dados;
            } else {
                return 0;
            }
        } else {
            return "Erro ao buscar dados: " . $sql . "<br> Erro:" . $this->connect->error;
        }
    }

    function corrigeData($data, $removerTime = false) {
        // para lidar com o callback do grid
        $valor = $data;
        if (is_array($valor)) {
            if (empty($valor['campoAtual'])) { return ''; } 
            $valor = $valor['campoAtual'];
        }
        $valor = explode(' ', $valor);
        $hora = (isset($valor[1])) ? ' ' . $valor[1] : '';
        $valor = explode('-', $valor[0]);
        if ($valor[0] == '0000') { return ''; }
        if (isset($valor[0]) && isset($valor[1]) && isset($valor[2])) {
            $data = mktime(0, 0, 0, $valor[1], $valor[2], $valor[0]);
            if ($removerTime) {
                return $valor[2] . '/' . $valor[1] . '/' . $valor[0];
            } else {
                return $valor[2] . '/' . $valor[1] . '/' . $valor[0] . $hora;
            }
        } else {
            return $data;
        }
    }
    
    /**
    * Formata uma data do formato brasileiro (dd/mm/yyyy) para o formato mysql (yyyy-mm-dd)
    * 
    * @param mixed $valor
    * @return string
    */
    function corrigeDataInverte($valor) {
        // para lidar com o callback do grid
        if (is_array($valor)) {
            if (empty($valor['campoAtual'])) { return ''; } 
            $valor = $valor['campoAtual'];
        }
        $valor = explode('/', $valor);
        $valor[2] = (int) $valor[2];
        $data = @mktime(0, 0, 0, $valor[1], $valor[0], $valor[2]);
        if(empty($data)){
            return '';
        }
        return date("Y-m-d", $data);
    }

    function loginUsuario($login,$senha,$tabela = "suporte"){
        $arrayRetorno = array();

        if(empty($login) || empty($senha)){
            $arrayRetorno['code'] = false;
            $arrayRetorno['retorno'] = "Email e senha campos são obrigatórios!";
            $arrayRetorno['redirecionar'] = "login.php?t={$tabela}";
            return $arrayRetorno;
        }
        $senha = base64_encode($senha);
        $retorno = $this->selecionarDados($tabela,"*","","{$tabela}_login='{$login}' AND {$tabela}_senha='{$senha}'");
        if(is_array($retorno)){
            $arrayRetorno['code'] = true;
            $arrayRetorno['retorno'] = $retorno;
            $arrayRetorno['redirecionar'] = "./{$tabela}/index.php";
        }else{
            $arrayRetorno['code'] = false;
            $arrayRetorno['retorno'] = "Email ou senha incorretos tente novamente!";
            $arrayRetorno['redirecionar'] = "login.php?t={$tabela}";
        }
        return $arrayRetorno;
    }

    function mascaraDados($val, $mask){
        $maskared = '';
        $k = 0;
    
        for($i = 0; $i<=strlen($mask)-1; $i++){
            if($mask[$i] == '#'){
                if(isset($val[$k]))
                $maskared .= $val[$k++];
            }else {
                if(isset($mask[$i]))
                $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

    function enviarEmail(){

    }


}
?>
