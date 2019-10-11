<?php

class DB{
    private $conexao = "";

    //Ao instanciar a classe irá iniciar a conexao com banco
    function __construct()
    {
        $this->setConexao($this->database_connection());
    }
  
    public function getConexao() {
        return $this->conexao;
    }
    
    public function setConexao($conn) {
        $this->conexao= $conn;
    }

    //Função que realiza a conexao com banco de dados
    function database_connection(){
        $host="192.168.100.71";
        $dbname = "php_atendimento";
        $user = "root";
        $pw = "root";
        $conn = mysqli_connect($host,$user,$pw,$dbname);

        // Check connection
        if (mysqli_connect_errno()){
            echo "Conexão com banco de dados não realizada, por favor contacte o suporte e informe 
            a seguinte mensagem:" . mysqli_connect_error();
        }else{
            return $conn;
        }
    }


}

?>
