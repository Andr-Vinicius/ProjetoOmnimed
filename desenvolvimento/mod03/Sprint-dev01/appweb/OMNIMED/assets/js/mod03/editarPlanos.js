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

            $url = "../../../controller/excluirPlanosBeneficios.php";
            $data = "id=" + $divLinha.find( 'input[name="id_beneficio_existente"]' ).val() +
                "&id_plano=" + $(document).find('input[name="id"]').val();


        } else if ( $divLinha.attr( 'class' ) == "div-dependentes" ) {

            $url = "../../../controller/excluirValoresDependentes.php";
            $data = "id=" + $divLinha.find( 'input[name="id_dependente_existente"]' ).val();

        } else {

            $url = "../../../controller/excluirUsoRemedios.php";
            $data = "id=" + $divLinha.find( 'input[name="id_finalidade_existente"]' ).val();

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

        $url = "../../../controller/editarPlanosBeneficios.php";
        $data = "id=" + $divLinha.find( 'input[name="id_beneficio_existente"]' ).val() +
                "&beneficio_existente=" + $('select[name="beneficio_existente"] option').filter(':selected').val() +
                "&valor_beneficio_existente=" + $divLinha.find( 'input[name="valor_beneficio_existente"]' ).val();

    } else if( $divLinha.attr( 'class' ) == "div-dependentes" ) {

        $url = "../../../controller/editarValoresDependentes.php";
        $data = "id=" + $divLinha.find( 'input[name="id_dependente_existente"]' ).val() +
                "&idade_min_existente=" + $divLinha.find( 'input[name="idade_min_existente"]' ).val() +
                "&idade_max_existente=" + $divLinha.find( 'input[name="idade_max_existente"]' ).val() +
                "&preco_dependente_existente=" + $divLinha.find( 'input[name="preco_dependente_existente"]' ).val();

    } else {

        $url = "../../../controller/editarUsoRemedios.php";
        $data = "id=" + $divLinha.find( 'input[name="id_finalidade_existente"]' ).val() +
                "&finalidade_existente=" + $('select[name="finalidade_existente"] option').filter(':selected').val();

    }

    $.ajax({
        url: $url,
        type: "POST",
        data: $data,
        dataType: "html"

    }).done(function(resposta, textStatus) {

        console.log(resposta);

        $divBotoes.empty();
        $divBotoes.append( $botaoEditar );

        $divRow.find( 'input,select' ).prop( "disabled", true );

    }).fail(function(jqXHR, textStatus ) {
        console.log("Request failed: " + textStatus);

    }).always(function() {
        console.log("completou");
    });

} );