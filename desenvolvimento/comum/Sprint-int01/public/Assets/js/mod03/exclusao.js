$( document ).on( 'click', '.deletar', function() {
    return confirm( "Deseja excluir essa entrada? Essa ação não pode ser revertida" );
} );

$( document ).on( 'click', '.deletar-especial', function() {
    if(confirm( "Deseja excluir essa entrada? Essa ação não pode ser revertida" )) {
        
        var $pai = $( event.target ).parent();
        var $linha = $pai.parent().parent();
        var $url = $pai.attr('data-url');
        
        $.ajax({
            url: $url,
            type: "POST"

        }).done(function(resposta) {
            if(resposta === 'OK') {
                $linha.remove();
            } else {
                alert(resposta);
            }
        }).fail(function(jqXHR, textStatus ) {
            alert("Request failed: " + textStatus);

        }).always(function() {
            console.log("completou");
        });
    }
} );