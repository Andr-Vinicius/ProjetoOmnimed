<?php

    // Imports, recebe o modelo da classe e o DAO. Path relativo a si mesmo através do __DIR__
    require_once __DIR__ . "/../model/UsoRemediosModel.php";
    require_once __DIR__ . "/../DAO/UsoRemediosDAO.php";
    require_once __DIR__ . "/../model/FinalidadesRemediosModel.php";

    // Receber os valores
    // trim() utilizado para remover espaços no fim e no começo
    $id = intval( trim( $_POST[ 'id' ] ) );
    $finalidade_existente = intval( trim( $_POST[ 'finalidade_existente' ] ) );
    
    if( is_null( $id ) || mb_strlen( $id ) == 0 || !is_int( $id ) ) { // Verificar se não é vazio ou nulo
        echo "Algo deu errado. Recarregue a página e tente novamente";
    } else {

        try {
            
            $finalidade = new FinalidadesRemedios();
            $finalidade->id = $finalidade_existente;

            $usoRemedios = new UsoRemedios();
            $usoRemedios->id = $id;
            $usoRemedios->finalidade = $finalidade;

            $daoUsoRemedios = new UsoRemediosDAO();
            $daoUsoRemedios->editar( $usoRemedios );

            // NECESSÁRIO!! É a resposta para o validator.js de que tudo correu bem
            echo "OK";

        } catch ( \PDOException $e ) {

            echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto
                
        }

    }

?>