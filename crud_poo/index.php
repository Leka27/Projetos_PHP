<?php include 'bibliotecas/db.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD PHP OOP</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <main>
            <div class="container"> 
                <table border="1">
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Status</th>
                    </tr> 
                    <?php $db->getData();?>
                </table>    
            </div>
        </main>
    </body>
</html>