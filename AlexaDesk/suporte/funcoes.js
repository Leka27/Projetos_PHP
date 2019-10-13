$(document).ready(function() {
    // carregarUsuarios($('#filtroUsuarios').val(), $('#tipoFiltro').val());
    carregarUsuarios();

    $('#btn_cadastrar_usuario_suporte').on('click', function(event) {
        var formdata = new FormData($("#form-cadastrar_usuario_suporte")[0]);
        var link = "acoes.php";
        var dialog = $("#dialog-confirm");
        if ($("#dialog-confirm").length == 0) {
            dialog = $('<div id="dialog-confirm" style="width:400px;display:hidden"></div>').appendTo('body');
        }
        formdata.append('nome', $('#nomeCadastro').val());
        formdata.append('senhaCadastro', $('#senhaCadastro').val());
        formdata.append('loginCadastro', $('#loginCadastro').val());
        formdata.append('perfilCadastro', $('#perfilCadastro').val());
        $('#dialogCadastrarUsuarioSuporte').modal('hide');
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
                            $("#form-cadastrar_usuario_suporte")[0].reset();
                            window.location.href = window.location.href;
                        }
                    }
                })
            );
        });
    });

    function carregarUsuarios(filtro = '', tipoFiltro = '') {
        var link = "acoes.php";
        $.ajax({
            type: 'POST',
            url: link,
            data: { acao: "buscarUsuarios", filtro: filtro, tipoFiltro: tipoFiltro },
            dataType: "json"
        }).done(function(data) {
            var html = "";
            if (data == 0) {
                html = "<tr><td colspan='4'>Nenhum usuário encontrado</td></tr>";
            } else {
                $.each(data.retorno, function(i, item) {
                    html = html + "<tr>" +
                        "<td>" + data.retorno[i].suporte_id + "</td>" +
                        "<td>" + data.retorno[i].suporte_nome + "</td>" +
                        "<td>" + data.retorno[i].suporte_perfil_usuario + "</td>" +
                        // Nao deu certo ainda, tentar de outra forma
                        "<td><button type='button' data-toggle='modal' data-target='#dialogAlterarUsuarioSuporte' idsuporte=" + data.retorno[i].suporte_id +
                        " id='btn_form_editar_usuario_suporte' onclick='clickbotao()' class='btn btn-default'>Alterar</button></td>" +
                        "<td><a href='perfil.php?id=" + data.retorno[i].suporte_id + "' class='primary'>Perfil</a></td>" +
                        "</tr>";
                });
            }
            $("#tabelaUsuarios tbody").html(html);
        });
    }

    $('#btn_form_editar_usuario_suporte').on('click', function(event) {
        var idSuporte = $(this).attr('idSuporte');
        var link = "acoes.php";
        var acao = 'buscarUsuarioSuporte';
        $.ajax({
            type: 'POST',
            url: link,
            data: { idSuporte: idSuporte, acao: acao },
            dataType: "json"
        }).done(function(data) {
            $("#suporte_id").val(data[0].suporte_id);
            $("#nomeAlterar").val(data[0].suporte_nome);
            $("#loginAlterar").val(data[0].suporte_login);
            $("#senhaAlterar").val(data[0].suporte_senha);
        });
    });

    // Feito para utilizar com teste para tentar descobrir o problema com botao editar
    //nao traz dados para o formulario
    // $('#btn_form_editar_usuario_suporte').on('click', function(event) {
    //     alert('entrei');
    // });

    $('#btn_filtrar_usuarios').on('click', function(event) {
        var filtro = $('#filtroUsuarios').val();
        var tipoFiltro = $('#tipoFiltro').val();
        carregarUsuarios(filtro, tipoFiltro);
        var filtro = $('#filtroUsuarios').val("");
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