$(document).ready(function() {
    //Funcao tela de login
    $('#btn_logar').on('click', function(event) {
        var formdata = new FormData($("#form-login")[0]);
        var tipoLogin = $('#tipoLogin').val();
        var link = tipoLogin + "/acoes.php";
        var dialog = $("#dialog-confirm");
        if ($("#dialog-confirm").length == 0) {
            dialog = $('<div id="dialog-confirm" style="display:hidden"></div>').appendTo('body');
        }
        $.ajax({
            type: 'POST',
            url: link,
            data: formdata,
            processData: false,
            contentType: false
        }).done(function(data) {
            var retorno = JSON.parse(data);
            if (!retorno.code) {
                dialog.html('<p>' + retorno.retorno + '</p>');
            } else {
                dialog.html('<p>Login realizado com sucesso</p>');
            }
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
                            location.href = retorno.redirecionar;
                        }
                    }
                })
            );
        });
    });

    // if ($('#tipoLogin').val() == 'cliente') {
    //     $('.actions').append('<hr><ul class="actions"><li><button type="button" data-toggle="modal" data-target="#dialogCadastrarCliente" class="btn btn-warning">Cadastre-se</button></li><li><button type="button" data-toggle="modal" data-target="#dialogEsqueciSenha" class="btn btn-warning">Esqueci senha</button></li></ul>');
    // }

    // if ($('#tipoLogin').val() == 'cliente') {
    //     $('.actions').append('<hr><ul class="actions"><li><a href="#" data-toggle="modal" data-target="#dialogCadastrarCliente" class="button small">Cadastre-se</a></li><li><a href="#" data-toggle="modal" data-target="#dialogEsqueciSenha" class="button small">Esqueci senha</a></li></ul>');
    // }
    if ($('#tipoLogin').val() != 'cliente') {
        $('#botoesCliente').html("");
    }

});