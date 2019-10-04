<?php include 'bibliotecas/db.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD PHP OOP</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>
        <main>
            <form method='POST'>
                <input type='hidden' name='acao' value='adicionar'>
                <input type='text' name='C001_Titulo' placeholder='Título'><br>
                <input type='text' name='C001_Autor' placeholder='Autor'><br>
                <button type='submit'>Adicionar</button>
            </form>
            <div class="container"> 
                <table border="1">
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr> 
                    <?php $db->getData();?>
                </table>    
            </div>
        </main>
    </body>
</html>