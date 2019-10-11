// Adicionar ajax post para realizar login
$( function() {
    $( "#dialog-confirm" ).dialog({
    resizable: false,
    height: 200,
    width: 400,
    modal: true,
    buttons: {
        "Ok": function() {
            $( this ).dialog( "close" );
            {$js}
        }
    }
    });
});
// Adicionar link para esqueceu senha e para cadastrar
if('{$tipoLogin}'=='C'){
    $('.actions').append('<hr><ul class="actions"><li><a type="">Cadastre-se</a></li><li><a type="">Esqueci senha</a></li></ul>');
}

// Adicionar ajax para o cadastrar cliente



//Adicionar o ajax para alterar cliente




//Adicionar o ajax para deletar cliente






//Adicionar o ajax para buscar um cliente