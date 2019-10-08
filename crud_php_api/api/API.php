<?php

class API{
    private $connect = "";

    //Ao instanciar a classe irá iniciar a conexao com banco
    function __construct()
    {
        $this->database_connection();
    }

    //Função que realiza a conexao com banco de dados
    function database_connection(){
        $host="192.168.100.71";
        $dbname = "cadastros";
        $user = "root";
        $pw = "root";

        $this->connect = new PDO("mysql:host=$host;dbname=$dbname",$user,$pw);
    }

    //Função que busca todos os objetos
    function fetch_all(){
        $query = "SELECT * FROM C003 ORDER BY C003_Id";
        $statement = $this->connect->prepare($query);

        //Se query executada corretamente
        if($statement->execute()){
            while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
        }
        return $data;
    }
}

?>