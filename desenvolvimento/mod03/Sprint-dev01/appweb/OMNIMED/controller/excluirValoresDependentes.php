<?php

    // Imports, recebe o modelo da classe e o DAO. Path relativo a si mesmo através do __DIR__
    require_once __DIR__ . "/../model/ValoresDependentesModel.php";
    require_once __DIR__ . "/../DAO/ValoresDependentesDAO.php";

    // Receber os valores
    // trim() utilizado para remover espaços no fim e no começo
    $id = intval( trim( $_POST[ 'id' ] ) );
    
    if( is_null( $id ) || mb_strlen( $id ) == 0 || !is_int( $id ) ) { // Verificar se não é vazio ou nulo
        echo "Algo deu errado. Recarregue a página e tente novamente";
    } else {

        try {
                
            $valoresDependentes = new ValoresDependentes();
            $valoresDependentes->id = $id;

            $daoValores = new ValoresDependentesDAO();
            $daoValores->excluir( $valoresDependentes );

            echo 'OK';

        } catch (\PDOException $e) {
            echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto
        }

    }

?>