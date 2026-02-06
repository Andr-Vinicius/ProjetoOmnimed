// Exclusao de dependente
$(document).on( 'click', '.deletar-dep', function() {
    if( confirm("Deseja realmente remover esse dependente? Essa ação não pode ser revertida.") ){
        
        var $pai = $( event.target ).parent();
        var $linha = $pai.parent().parent();
        var $url = $pai.attr('data-url');
        
        $.ajax({
            url: $url,
            type: "POST"

        }).done(function(resposta) {
            if(resposta === 'OK') {
                $linha.remove();
                console.log(resposta);
            } else {
                alert(resposta);
            }
        }).fail(function(jqXHR, textStatus ) {
            alert("Request failed: " + textStatus);
        }).always(function() {
            console.log("completou");
        });
    }
});