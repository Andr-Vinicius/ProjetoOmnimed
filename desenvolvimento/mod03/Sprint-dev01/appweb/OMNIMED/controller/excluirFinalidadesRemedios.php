<?php

    // Imports, recebe o modelo da classe e o DAO. Path relativo a si mesmo através do __DIR__
    require_once __DIR__ . "/../model/FinalidadesRemediosModel.php";
    require_once __DIR__ . "/../DAO/FinalidadesRemediosDAO.php";

    // Receber os valores
    // trim() utilizado para remover espaços no fim e no começo
    $id = intval( trim( $_GET[ 'id' ] ) );

    if( is_null( $id ) || mb_strlen( $id ) == 0 || !is_int( $id ) ) { // Verificar se não é vazio ou nulo
        echo "Algo deu errado. Recarregue a página e tente novamente";
    } else {

        try {
                
            $finalidades = new FinalidadesRemedios();
            $finalidades->id = $id;

            $daoFinalidade = new FinalidadesRemediosDAO();
            $daoFinalidade->excluir( $finalidades );

            header( "location:../view/mod03/finalidades/listarFinalidadesRemedios.php" );

        } catch (\PDOException $e) {
            echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto
        }

    }


?>