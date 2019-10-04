<?php
    include "bibliotecas/db.php";

    if(isset($_GET['IdDeletar'])){
        $id = $_GET['IdDeletar'];
        if(!empty($id)){
            $id = (int) addslashes(htmlentities($id));
            $db->deletarLivro($id);
        }
    }else{
        echo "<script>alert('Erro inesperado ao deletar');</script>";
    }


?>