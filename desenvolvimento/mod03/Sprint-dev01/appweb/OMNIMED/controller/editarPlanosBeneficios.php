<?php

    // Imports, recebe o modelo da classe e o DAO. Path relativo a si mesmo através do __DIR__
    require_once __DIR__ . "/../model/PlanosBeneficiosModel.php";
    require_once __DIR__ . "/../DAO/PlanosBeneficiosDAO.php";
    require_once __DIR__ . "/../model/BeneficiosModel.php";

    // Receber os valores
    // trim() utilizado para remover espaços no fim e no começo
    $id = intval( trim( $_POST[ 'id' ] ) );
    $beneficio_existente = intval( trim( $_POST[ 'beneficio_existente' ] ) );
    $valor_beneficio_existente = intval( trim( $_POST[ 'valor_beneficio_existente' ] ) );
    
    if( is_null( $id ) || mb_strlen( $id ) == 0 || !is_int( $id ) ) { // Verificar se não é vazio ou nulo
        echo "Algo deu errado. Recarregue a página e tente novamente";
    } else {

        try {
            
            $beneficio = new Beneficios();
            $beneficio->id = $beneficio_existente;

            $planosBeneficios = new PlanosBeneficios();
            $planosBeneficios->id = $id;
            $planosBeneficios->beneficio = $beneficio;
            $planosBeneficios->valor = $valor_beneficio_existente;

            $daoPlanosBeneficios = new PlanosBeneficiosDAO();
            $daoPlanosBeneficios->editar( $planosBeneficios );

            // NECESSÁRIO!! É a resposta para o validator.js de que tudo correu bem
            echo "OK";

        } catch ( \PDOException $e ) {

            echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto
                
        }

    }

?>