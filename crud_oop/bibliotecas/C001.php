<?php

class C001
{
    private $db;
    function __construct($db){
        $this->_db = $db;
    }

    function getData(){

        try{
            $query = "SELECT * FROM C001 ORDER BY C001_Id DESC";
            $sql = $this->_db->prepare($query);
            $sql->execute();

            if($sql->rowCount()){
                while($data = $sql->fetch(PDO::FETCH_OBJ)){
                    echo <<<EOT
                        <tr>
                            <td>{$data->C001_Id}<td>
                            <td>{$data->C001_Titulo}<td>
                            <td>{$data->C001_Autor}<td>
                            <td>{$data->C001_Status}<td>
                            <td><a href='editar.php?IdEdicao={$data->C001_Id}'>Alterar</a><td>
                            <td><a href='deletar.php?IdDelete={$data->C001_Id}'>Delete</a><td>
                        </tr>
EOT;
                }
            }

        }catch(PDOException $e){
            die($e->getMessage());
        }

    }


}


