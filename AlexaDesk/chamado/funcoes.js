$(document).ready(function() {
    carregarChamados();

    $('#btn_cadastrar_chamado').on('click', function(event) {
        var formdata = new FormData($("#form-cadastrar_chamado")[0]);
        var link = "acoes.php";
        var dialog = $("#dialog-confirm");
        if ($("#dialog-confirm").length == 0) {
            dialog = $('<div id="dialog-confirm" style="width:400px;display:hidden"></div>').appendTo('body');
        }
        formdata.append('motivo', $('#motivoCadastro').val());
        formdata.append('descricao', $('#descricaoCadastro').val());
        formdata.append('assunto', $('#assuntoCadastro').val());
        formdata.append('idCliente', $('#clienteCadastro').val());
        $('#dialogCadastrarChamado').modal('hide');
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
                            $("#form-cadastrar_chamado")[0].reset();
                            window.location.href = window.location.href;
                        }
                    }
                })
            );
        });
    });

    $('#btn_form_adicionar_interacao').on('click', function(event) {
        var idChamado = $(this).attr('idChamado');
        var link = "acoes.php";
        var acao = 'buscarUsuarioSuporte';
        $("#idChamado").val(idChamado);
    });

    $('#btn_cadastrar_interacao_chamado').on('click', function(event) {
        var formdata = new FormData($("#form-adicionar-interacao")[0]);
        var link = "acoes.php";
        var dialog = $("#dialog-confirm");
        if ($("#dialog-confirm").length == 0) {
            dialog = $('<div id="dialog-confirm" style="width:400px;display:hidden"></div>').appendTo('body');
        }
        formdata.append('descricaoInteracao', $('#descricaoInteracao').val());
        $('#dialogAdicionarInteracaoChamado').modal('hide');
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
                            $("#form-adicionar-interacao")[0].reset();
                            window.location.href = window.location.href;
                        }
                    }
                })
            );
        });
    });

    function carregarChamados(filtro = '', tipoFiltro = '') {
        var link = "acoes.php";
        $.ajax({
            type: 'POST',
            url: link,
            data: { acao: "buscarChamados", filtro: filtro, tipoFiltro: tipoFiltro },
            dataType: "json"
        }).success(function(data) {
            var html = "";
            if (data.retorno == 0) {
                html = "<tr><td colspan='7' style='text-align:center'>Nenhum chamado encontrado</td></tr>";
            } else {
                $.each(data.retorno, function(i, item) {
                    html = html + "<tr>" +
                        "<td>" + data.retorno[i].chamado_id + "</td>" +
                        "<td>" + data.retorno[i].chamado_assunto + "</td>" +
                        "<td>" + data.retorno[i].motivo_descricao + "</td>" +
                        "<td>" + data.retorno[i].cliente_nome + "</td>" +
                        "<td>" + data.retorno[i].motivo_prioridade + "</td>" +
                        "<td>" + data.retorno[i].chamado_flag_status + "</td>" +
                        "<td><a href='perfil.php?id=" + data.retorno[i].chamado_id + "' class='primary'>Chamado</a></td>" +
                        "</tr>";
                });
            }
            $("#tabelaChamados tbody").html(html);
        });
    }

    $('#btn_finalizar_chamado').on('click', function(event) {
        var link = "acoes.php";
        var acao = "finalizarChamado";
        var dialog = $("#dialog-confirm");
        var idChamado = $(this).attr("idChamado");
        if ($("#dialog-confirm").length == 0) {
            dialog = $('<div id="dialog-confirm" style="width:400px;display:hidden"></div>').appendTo('body');
        }
        $.ajax({
            type: 'POST',
            url: link,
            data: { idChamado: idChamado, acao: acao },
            dataType: "json"
        }).done(function(data) {
            if (!data.code) {
                data.retorno = "<b>Erros:</b></br>" + data.retorno;
            }
            dialog.html('<p style="width:400px;">' + data.retorno + '</p>');
            dialog.load(
                $("#dialog-confirm").dialog({
                    close: function(event, ui) {
                        dialog.remove();
                    },
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

    $('#btn_form_cadastrar_chamado').on('click', function(event) {
        var link = "acoes.php";
        var acao = 'retornarMotivos';
        $.ajax({
            type: 'POST',
            url: link,
            data: { acao: acao },
            dataType: "json"
        }).done(function(data) {
            var html = "";
            $.each(data, function(i, item) {
                html = html + "<option value='" + data[i].motivo_id + "'>" + data[i].motivo_descricao + "</option>";
            });
            $("#motivoCadastro").html(html);
        });
        if ($("#tipoLogin").val() != "cliente") {
            var acao = 'retornarClientes';
            $.ajax({
                type: 'POST',
                url: link,
                data: { acao: acao },
                dataType: "json"
            }).done(function(data) {
                var html = "";
                $.each(data.retorno, function(i, item) {
                    html = html + "<option value='" + data.retorno[i].cliente_id + "'>" + data.retorno[i].cliente_nome + "</option>";
                });
                $("#clienteCadastro").html(html);
            });
        } else {
            $('#campoClienteCadastro').html("");
        }
    });

    $('#btn_filtrar_chamados').on('click', function(event) {
        var filtro = $('#filtroChamados').val();
        var tipoFiltro = $('#tipoFiltro').val();
        carregarChamados(filtro, tipoFiltro);
        var filtro = $('#filtroChamados').val("");
    });

    $('#btn_editar_usuario_suporte').on('click', function(event) {
        var formdata = new FormData($("#form-editar_usuario_suporte")[0]);
        var link = "acoes.php";
        var dialog = $("#dialog-confirm");
        if ($("#dialog-confirm").length == 0) {
            dialog = $('<div id="dialog-confirm" style="width:400px;display:hidden"></div>').appendTo('body');
        }
        formdata.append('nome', $('#nomeAlterar').val());
        formdata.append('suporte_id', $('#suporte_id').val());
        formdata.append('senhaCadastro', $('#senhaAlterar').val());
        formdata.append('loginCadastro', $('#loginAlterar').val());
        formdata.append('acao', $('#acao').val());
        $('#dialogAlterarUsuarioSuporte').modal('hide');
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