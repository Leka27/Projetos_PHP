<?php
    include 'bibliotecas/db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD PHP OOP</title>
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
                    <tr>
                    <?php $db->getData(); ?>
                    </tr>
                </table>
            </div>
        </main>
    </body>
</html>