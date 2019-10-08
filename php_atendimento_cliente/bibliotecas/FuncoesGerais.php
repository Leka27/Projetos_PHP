<?php

class FUNCOESGERAIS{
    public $connect = "";

    //Ao instanciar a classe irá iniciar a conexao com banco
    function __construct()
    {
        $this->connect = $this->conexaoBanco();
    }

    //Função que realiza a conexao com banco de dados
    function conexaoBanco(){
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

    
    function verificaSessao(){
        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
            session_destroy();
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.php');
        }
    }


}
?>
