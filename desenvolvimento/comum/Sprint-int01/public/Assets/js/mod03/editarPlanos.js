// Edição de beneficios e valor de dependentes
var $botoesEdicao = (
    `<a class="confirmar" title="Confirmar"><span class='bi bi-check-circle-fill align-middle'></span></a>
    <a class="cancelar" title="Cancelar"><span class='bi bi-x-circle-fill align-middle' style='color: #f93939'></span></a>
    <a class="deletar" title="Excluir"><span class='bi bi-trash-fill align-middle' style='color: #f93939'></span></a>`
);

var $botaoEditar = (
    `<a class="editar" title="Editar"><span class='bi bi-pencil-square align-middle'></span></a>`
);

// Habilitar edição
$( document ).on( 'click', '.editar', function() {

    var $divBotoes = $( event.target ).parent().parent();
    var $divLinha = $divBotoes.parent();

    $divBotoes.empty();
    $divBotoes.append( $botoesEdicao );

    $divLinha.find( 'input,select' ).removeAttr( "disabled" );

} );

// Cancelar edição
$( document ).on( 'click', '.cancelar', function() {

    var $divBotoes = $( event.target ).parent().parent();
    var $divLinha = $divBotoes.parent();

    $divBotoes.empty();
    $divBotoes.append( $botaoEditar );

    $divLinha.find( 'input,select' ).prop( "disabled", true );

    // Retorna aos valores padrões
    $divLinha.find( '#valor_beneficio' ).val( $divLinha.find( '#valor_beneficio' ).attr( "value" ) );
    $divLinha.find( '#idade_min' ).val( $divLinha.find( '#idade_min' ).attr( "value" ) );
    $divLinha.find( '#idade_max' ).val( $divLinha.find( '#idade_max' ).attr( "value" ) );
    $divLinha.find( '#preco_dependente' ).val( $divLinha.find( '#preco_dependente' ).attr( "value" ) );
    $divLinha.find( 'select option' ).prop('selected', function () {
        return this.defaultSelected;
    });
    
} );

// Excluir na edição
$( document ).on( 'click', '.deletar', function() {

    if( confirm( "Deseja excluir essa entrada? Essa ação não pode ser revertida" ) ) {

        var $divRow = $( event.target ).parent().parent().parent();
        var $divLinha = $divRow.parent();
        
        var $url;
        var $data;

        if( $divLinha.attr( 'class' ) == "div-beneficios" ) {

            $url = "/planosBeneficios/excluir";
            $data = "PBN_ID=" + $divRow.find( 'input[name="id_beneficio_existente"]' ).val();


        } else if ( $divLinha.attr( 'class' ) == "div-dependentes" ) {

            $url = "/valoresDependentes/excluir";
            $data = "VPD_ID=" + $divRow.find( 'input[name="id_dependente_existente"]' ).val();

        } else {

            $url = "/usoRemedios/excluir";
            $data = "URM_ID=" + $divRow.find( 'input[name="id_finalidade_existente"]' ).val();

        }

        $.ajax({
            url: $url,
            type: "POST",
            data: $data,
            dataType: "html"

        }).done(function(resposta) {
            if(resposta == "Não é possível realizar a exclusão.") {
                alert(resposta);
            } else {
                $divRow.remove();
            }

        }).fail(function(jqXHR, textStatus ) {
            alert("Request failed: " + textStatus);

        }).always(function() {
            console.log("completou");
        });
        
    }

} );

// Confirmar edição
$( document ).on( 'click', '.confirmar', function() {

    var $divBotoes = $( event.target ).parent().parent();
    var $divRow = $divBotoes.parent();
    var $divLinha = $divRow.parent();
    
    var $url;
    var $data;

    if( $divLinha.attr( 'class' ) == "div-beneficios" ) {

        $url = "/planosBeneficios/editar";
        $data = "PBN_ID=" + $divRow.find( 'input[name="id_beneficio_existente"]' ).val() +
                "&FK_BENEFICIOS_BNF_ID=" + $divRow.find('select[name="beneficio_existente"] option').filter(':selected').val() +
                "&PBN_VALOR_BENEFICIO=" + $divRow.find( 'input[name="valor_beneficio_existente"]' ).val();

    } else if( $divLinha.attr( 'class' ) == "div-dependentes" ) {

        $url = "/valoresDependentes/editar";
        $data = "VPD_ID=" + $divRow.find( 'input[name="id_dependente_existente"]' ).val() +
                "&VPD_IDADE_MINIMA=" + $divRow.find( 'input[name="idade_min_existente"]' ).val() +
                "&VPD_IDADE_MAXIMA=" + $divRow.find( 'input[name="idade_max_existente"]' ).val() +
                "&VPD_VALOR=" + $divRow.find( 'input[name="preco_dependente_existente"]' ).val();

    } else {

        $url = "/usoRemedios/editar";
        $data = "URM_ID=" + $divRow.find( 'input[name="id_finalidade_existente"]' ).val() +
                "&FK_FINALIDADE_REMEDIOS_FIN_ID=" + $divRow.find('select[name="finalidade_existente"] option').filter(':selected').val();

    }

    $.ajax({
        url: $url,
        type: "POST",
        data: $data,
        dataType: "html"

    }).done(function(resposta, textStatus) {
        if(resposta === 'OK') {
            $divBotoes.empty();
            $divBotoes.append( $botaoEditar );
    
            $divRow.find( 'input,select' ).prop( "disabled", true );
        } else {
            alert(resposta);
        }

    }).fail(function(jqXHR, textStatus ) {
        console.log("Request failed: " + textStatus);

    }).always(function() {
        console.log("completou");
    });

} );