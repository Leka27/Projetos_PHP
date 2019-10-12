
<?php
$connect = mysqli_connect("192.168.100.71","root","root","teste_crud");
$query = mysqli_query($connect,"SELECT * FROM usuario")

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>CRUD AJAX</title>
  </head>
  <body>
    <h1>Ola pessoas!</h1>
    <div class="container" style="width:700px;">
        <div class="table-responsive">
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
            <table class="table table-bordered">
                <tr>
                    <th width="70%">Nome</th>
                    <th width="30%">Botao</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>".$row['usuario_nome']."</td>";
                    echo "<td><button type'button' class='btn btn-default' name='view' id='".$row['usuario_id']."'>View</button></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>    
  </body>
</html>


<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="model-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">Botao</button>
                <h4>Detalhes</h4>
                <div class="modal-body" id="detalheUsuario"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </div>   
</div>

<div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<div id="add_data_Modalx" class="modal fade">
    <div class="modal-dialog">
        <div class="model-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">Botao</button>
                <h4>Add</h4>
                <div class="modal-body" id="detalheUsuario">
                    <form method="post" id="insert_form">
                        <label for="nome">Nome</label>
                        <input type="nome" name="nome" id="nome" class="form-control" />
                        <input type="submit" name="insert" value="Insert" class="btn btn-default"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </div>   
</div>

<script>
    $(document).ready(function(){
        $(document).on('click','.view_datax', function(){
            var idUsuario = $(this).attr("id");
            $.ajax({
                url:"server.php",
                method:"POST",
                data:{idUsuario:idUsuario},
                success:function(data){
                    $('#detalheUsuario').html(data);
                    $('#dataModal').modal('show');
                }
            });

        });

    });

</script>