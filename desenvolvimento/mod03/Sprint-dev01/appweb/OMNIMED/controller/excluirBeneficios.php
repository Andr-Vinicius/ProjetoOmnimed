<?php

    // Imports, recebe o modelo da classe e o DAO. Path relativo a si mesmo através do __DIR__
    require_once __DIR__ . "/../model/BeneficiosModel.php";
    require_once __DIR__ . "/../DAO/BeneficiosDAO.php";

    // Receber os valores
    // trim() utilizado para remover espaços no fim e no começo
    $id = intval( trim( $_GET[ 'id' ] ) );

    if( is_null( $id ) || mb_strlen( $id ) == 0 || !is_int( $id ) ) { // Verificar se não é vazio ou nulo
        echo "Algo deu errado. Recarregue a página e tente novamente";
    } else {

        try {
                
            $beneficios = new Beneficios();
            $beneficios->id = $id;

            $daoBeneficio = new BeneficiosDAO();
            $daoBeneficio->excluir( $beneficios );

            header( "location:../view/mod03/beneficios/listarBeneficios.php" );

        } catch (\PDOException $e) {
            echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto
        }

    }

?>