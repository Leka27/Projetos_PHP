$(document).ready(function() {
    carregarClientes();
    $('#btn_enviar_senha').on('click', function(event) {
        var formdata = new FormData($("#form-esqueci-senha")[0]);
        var link = $('#form-esqueci-senha').attr('acaoLink');
        // var link = 'cliente/acoes.php';
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
        var link = $('#form-cadastrar_cliente').attr('acaoLink');
        var dialog = $("#dialog-confirm");
        if ($("#dialog-confirm").length == 0) {
            dialog = $('<div id="dialog-confirm" style="width:400px;display:hidden"></div>').appendTo('body');
        }
        formdata.append('nome', $('#nomeCadastro').val());
        formdata.append('cpf', $('#cpfCadastro').val());
        formdata.append('telefone', $('#telefoneCadastro').val());
        formdata.append('senhaCadastro', $('#senhaCadastro').val());
        formdata.append('confirmarSenha', $('#confirmarSenha').val());
        formdata.append('loginCadastro', $('#loginCadastro').val());
        formdata.append('data_nascimento', $('#data_nascimentoCadastro').val());
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
                            window.location.href = window.location.href;
                        }
                    }
                })
            );
        });
    });

    $('#btn_filtrar_clientes').on('click', function(event) {
        var filtro = $('#filtroClientes').val();
        var tipoFiltro = $('#tipoFiltro').val();
        carregarClientes(filtro, tipoFiltro);
        var filtro = $('#filtroClientes').val("");
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
            $("#nomeAlterar").val(data[0].cliente_nome);
            $("#cpfAlterar").val(data[0].cliente_cpf);
            $("#telefoneAlterar").val(data[0].cliente_telefone);
            $("#data_nascimentoAlterar").val(data[0].cliente_data_nascimento);
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
        formdata.append('nome', $('#nomeAlterar').val());
        formdata.append('cliente_id', $('#cliente_id').val());
        formdata.append('cpf', $('#cpfAlterar').val());
        formdata.append('telefone', $('#telefoneAlterar').val());
        formdata.append('senhaCadastro', $('#senhaAlterar').val());
        formdata.append('loginCadastro', $('#loginAlterar').val());
        formdata.append('data_nascimento', $('#data_nascimentoAlterar').val());
        formdata.append('acao', $('#acao').val());
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

    function carregarClientes(filtro = '', tipoFiltro = '') {
        var link = "acoes.php";
        $.ajax({
            type: 'POST',
            url: link,
            data: { acao: "buscarClientes", filtro: filtro, tipoFiltro: tipoFiltro },
            dataType: "json"
        }).success(function(data) {
            var html = "";
            if (data == 0) {
                html = "<tr><td colspan='4' style='text-align:center'>Nenhum cliente encontrado</td></tr>";
            } else {
                $.each(data.retorno, function(i, item) {
                    html = html + "<tr>" +
                        "<td>" + data.retorno[i].cliente_id + "</td>" +
                        "<td>" + data.retorno[i].cliente_nome + "</td>" +
                        "<td>" + data.retorno[i].cliente_cpf + "</td>" +
                        "<td>" + data.retorno[i].cliente_login + "</td>" +
                        // Nao deu certo ainda, tentar de outra forma
                        "<td><button type='button' data-toggle='modal' data-target='#dialogAlterarCliente' idCliente=" + data.retorno[i].cliente_id +
                        " id='btn_form_editar_cliente' class='btn btn-default'>Alterar</button></td>" +
                        "<td><a href='perfil.php?id=" + data.retorno[i].cliente_id + "' class='primary'>Perfil</a></td>" +
                        "</tr>";
                });
            }
            $("#tabelaClientes tbody").html(html);
        });
    }

});