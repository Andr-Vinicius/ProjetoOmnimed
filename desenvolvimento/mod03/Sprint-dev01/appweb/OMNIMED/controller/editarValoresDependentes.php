<?php

    // Imports, recebe o modelo da classe e o DAO. Path relativo a si mesmo através do __DIR__
    require_once __DIR__ . "/../model/ValoresDependentesModel.php";
    require_once __DIR__ . "/../DAO/ValoresDependentesDAO.php";

    // Receber os valores
    // trim() utilizado para remover espaços no fim e no começo
    $id = intval( trim( $_POST[ 'id' ] ) );
    $idade_min_existente = intval( trim( $_POST[ 'idade_min_existente' ] ) );
    $idade_max_existente = intval( trim( $_POST[ 'idade_max_existente' ] ) );
    $preco_dependente_existente = floatval( trim( $_POST[ 'preco_dependente_existente' ] ) );
    
    if( is_null( $id ) || mb_strlen( $id ) == 0 || !is_int( $id ) ) { // Verificar se não é vazio ou nulo
        echo "Algo deu errado. Recarregue a página e tente novamente";
    } else {

        try {

            $valoresDependentes = new ValoresDependentes();
            $valoresDependentes->id = $id;
            $valoresDependentes->idade_minima = $idade_min_existente;
            $valoresDependentes->idade_maxima = $idade_max_existente;
            $valoresDependentes->valor = $preco_dependente_existente;

            $daoValores = new ValoresDependentesDAO();
            $daoValores->editar( $valoresDependentes );

            // NECESSÁRIO!! É a resposta para o validator.js de que tudo correu bem
            echo "OK";

        } catch ( \PDOException $e ) {

            echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto
                
        }

    }

?>