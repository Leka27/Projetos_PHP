$(document).ready(function() {
    $('#btn_enviar_senha').on('click', function(event) {
        var formdata = new FormData($("#form-esqueci-senha")[0]);
        var link = "cliente/acoes.php";
        var dialog = $("#dialog-confirm");
        if ($("#dialog-confirm").length == 0) {
            dialog = $('<div id="dialog-confirm" style="display:hidden"></div>').appendTo('body');
        }
        formdata.append('loginEsqueci', $('#loginEsqueci').val());
        $('#dialogEsqueciSenha').modal('hide');

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
                            $("#form-esqueci-senha")[0].reset();
                            $(this).dialog("close");
                        }
                    }
                })
            );
        });
    });

    $('#btn_cadastrar_cliente').on('click', function(event) {
        var formdata = new FormData($("#form-cadastrar_cliente")[0]);
        var link = "cliente/acoes.php";
        var dialog = $("#dialog-confirm");
        if ($("#dialog-confirm").length == 0) {
            dialog = $('<div id="dialog-confirm" style="width:400px;display:hidden"></div>').appendTo('body');
        }
        formdata.append('nome', $('#nome').val());
        formdata.append('cpf', $('#cpf').val());
        formdata.append('telefone', $('#telefone').val());
        formdata.append('senhaCadastro', $('#senhaCadastro').val());
        formdata.append('confirmarSenha', $('#confirmarSenha').val());
        formdata.append('loginCadastro', $('#loginCadastro').val());
        formdata.append('data_nascimento', $('#data_nascimento').val());
        $('#dialogCadastrarCliente').modal('hide');
        $.ajax({
            type: 'POST',
            url: link,
            data: formdata,
            processData: false,
            contentType: false
        }).done(function(data) {
            var retorno = JSON.parse(data);
            if (!retorno.code) {
                retorno.retorno = "<b>Erros:</b></br>" + retorno.retorno;
            }
            dialog.html('<p style="width:400px;">' + retorno.retorno + '</p>');
            dialog.load(
                $("#dialog-confirm").dialog({
                    close: function(event, ui) {
                        dialog.remove();
                    },
                    modal: true,
                    buttons: {
                        "Ok": function() {
                            $(this).dialog("close");
                            $("#form-cadastrar_cliente")[0].reset();
                        }
                    }
                })
            );
        });
    });

    $('#btn_form_editar_cliente').on('click', function(event) {
        var idCliente = $(this).attr('idCliente');
        var link = "acoes.php";
        var acao = 'buscarCliente';
        $.ajax({
            type: 'POST',
            url: link,
            data: { idCliente: idCliente, acao: acao },
            dataType: "json"
        }).done(function(data) {
            $("#cliente_id").val(data[0].cliente_id);
            $("#nome").val(data[0].cliente_nome);
            $("#cpf").val(data[0].cliente_cpf);
            $("#telefone").val(data[0].cliente_telefone);
            $("#data_nascimento").val(data[0].cliente_data_nascimento);
            $("#loginAlterar").val(data[0].cliente_login);
            $("#senhaAlterar").val(data[0].cliente_senha);
        });
    });

    $('#btn_editar_cliente').on('click', function(event) {
        var formdata = new FormData($("#form-esqueci-senha")[0]);
        var link = "acoes.php";
        var dialog = $("#dialog-confirm");
        if ($("#dialog-confirm").length == 0) {
            dialog = $('<div id="dialog-confirm" style="width:400px;display:hidden"></div>').appendTo('body');
        }
        formdata.append('nome', $('#nome').val());
        formdata.append('cliente_id', $('#cliente_id').val());
        formdata.append('cpf', $('#cpf').val());
        formdata.append('telefone', $('#telefone').val());
        formdata.append('senhaCadastro', $('#senhaAlterar').val());
        formdata.append('loginCadastro', $('#loginAlterar').val());
        formdata.append('data_nascimento', $('#data_nascimento').val());
        formdata.append('acao', $('#acao').val());
        formdata.append('cpf', $('#cpf').val());
        $('#dialogAlterarCliente').modal('hide');
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
                            window.location.href = window.location.href;
                        }
                    }
                })
            );
        });
    });







});