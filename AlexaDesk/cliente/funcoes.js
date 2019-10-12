$(document).ready(function() {
    $('#btn_enviar_senha').on('click', function(event) {
        var formdata = new FormData($("#form-esqueci-senha")[0]);
        var link = "cliente/acoes.php";
        var dialog = $("#dialog-confirm");
        if ($("#dialog-confirm").length == 0) {
            dialog = $('<div id="dialog-confirm" style="display:hidden"></div>').appendTo('body');
        }
        formdata.append('cpf', $('#cpf').val());
        $('#dialogCadastrarCliente').modal('hide');
        $.ajax({
            type: 'POST',
            url: link,
            data: formdata,
            processData: false,
            contentType: false
        }).done(function(data) {
            var retorno = JSON.parse(data);
            dialog.html('<p>' + retorno.retorno + '</p>');
            dialog.load(
                $("#dialog-confirm").dialog({
                    close: function(event, ui) {
                        dialog.remove();
                    },
                    width: 300,
                    resizable: false,
                    modal: true,
                    buttons: {
                        "Ok": function() {
                            $(this).dialog("close");
                        }
                    }
                })
            );
        });
    });









});