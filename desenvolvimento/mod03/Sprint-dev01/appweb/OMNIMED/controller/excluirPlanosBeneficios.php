<?php

    // Imports, recebe o modelo da classe e o DAO. Path relativo a si mesmo através do __DIR__
    require_once __DIR__ . "/../model/PlanosBeneficiosModel.php";
    require_once __DIR__ . "/../DAO/PlanosBeneficiosDAO.php";

    // Receber os valores
    // trim() utilizado para remover espaços no fim e no começo
    $id = intval( trim( $_POST[ 'id' ] ) );
    $id_plano = intval(trim($_POST['id_plano']));
    
    if( is_null( $id ) || mb_strlen( $id ) == 0 || !is_int( $id ) ) { // Verificar se não é vazio ou nulo
        echo "Algo deu errado. Recarregue a página e tente novamente";
    } else {

        try {
                
            $planosBeneficios = new PlanosBeneficios();
            $planosBeneficios->id = $id;
            $planosBeneficios->plano = $id_plano;

            $daoPlanoBeneficio = new PlanosBeneficiosDAO();

            if (intval($daoPlanoBeneficio->contarListagem($planosBeneficios)) == 1) {
                echo "Não é possível realizar a exclusão.";
            } else {
                $daoPlanoBeneficio->excluir($planosBeneficios);
                echo 'OK';
            }

        } catch (\PDOException $e) {
            echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto
        }

    }

?>