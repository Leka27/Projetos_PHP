<?php

class C001
{
    private $conn;
    function __construct($conn)
    {   
        $this->_db = $conn;
    }

    function getData(){

        try{
            $query = "SELECT * FROM C001 ORDER BY C001_Id DESC";
            $sql = $this->_db->prepare($query);
            $sql->execute();

            // if(isset($_GET['adicionar'])){

            // }

            if(isset($_POST['C001_Titulo'],$_POST['C001_Autor'])){
                $this->adicionarLivro($_POST['C001_Titulo'],$_POST['C001_Autor']);
            }
            
//             echo <<<EOT
//                 <form method='POST'>
//                     <input type='hidden' name='acao' value='adicionar'>
//                     <input type='text' name='C001_Titulo' placeholder='Título'>
//                     <input type='text' name='C001_Autor' placeholder='Autor'>
//                     <button type='submit'>Adicionar</button>
//                 </form>
// EOT;
            if($sql->rowCount()){
                while($data = $sql->fetch(PDO::FETCH_OBJ)){
                    echo <<<EOT
                        <tr>
                            <td>$data->C001_Id</td>
                            <td>$data->C001_Titulo</td>
                            <td>$data->C001_Autor</td>
                            <td>$data->C001_Flag_Status</td>
                            <td><a href="editar.php?IdEditar={$data->C001_Id}">Alterar</a></td>
                            <td><a href="delete.php?IdDeletar={$data->C001_Id}">Deletar</a></td>
                        </tr>
EOT;
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function adicionarLivro($titulo, $autor){
        try{
            if(!empty($titulo) && !empty($autor)){
                $query = "INSERT INTO C001 (C001_Titulo,C001_Autor,C001_Data_Insercao) values(?,?,CURRENT_TIMESTAMP())";
                $sql = $this->_db->prepare($query);
                $sql->bindParam(1,$titulo);
                $sql->bindParam(2,$autor);
                // $sql->bindParam(3,date("Y-m-d"));
                $sql->execute();
                if($sql){
                    echo "<script>alert('Adicionado com sucesso!')</script>";
                    header('location:index.php');
                    // header('location:index.php?deletado=true');
                }else{
                    echo "<script>alert('Ocorreu algum erro!')</script>";
                    // echo "'Ocorreu algum erro!";
                }
            }else{
                echo "<script>alert('Erro inesperado ao inserir');</script>";
            }     
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function deletarLivro($id){
        try{
            if(!empty($id)){
                $query = "SELECT C001_Id FROM C001 WHERE C001_Id = ?";
                $sql = $this->_db->prepare($query);
                $sql->bindParam(1,$id);
                $sql->execute();
                if($sql->rowCount()){
                    $sqlDelete = $this->_db->prepare("DELETE FROM C001 WHERE C001_Id=?");
                    $sql->bindParam(1,$id);
                    $sql->execute();
                    if($sqlDelete){
                        echo "<script>alert('Deletado com sucesso!')</script>";
                        header('location:index.php');
                    }else{
                        echo "<script>alert('Ocorreu algum erro!')</script>";
                    }
                }else{
                    echo "<script>alert('Ocorreu algum erro!')</script>";
                }
            }
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

}

?>