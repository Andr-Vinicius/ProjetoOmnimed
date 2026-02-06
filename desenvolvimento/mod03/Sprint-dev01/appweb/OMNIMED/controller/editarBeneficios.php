<?php

    // Imports, recebe o modelo da classe e o DAO. Path relativo a si mesmo através do __DIR__
    require_once __DIR__ . "/../model/BeneficiosModel.php";
    require_once __DIR__ . "/../DAO/BeneficiosDAO.php";

    // Receber os valores
    // trim() utilizado para remover espaços no fim e no começo
    $id = trim( $_REQUEST[ 'id' ] );
    $descricao = trim( $_REQUEST[ 'descricao' ] );

    if( is_null( $id ) || mb_strlen( $id ) == 0 ) { // Verificar se não é vazio ou nulo
        echo "Algo deu errado. Recarregue a página e tente novamente";
    } elseif( is_null( $descricao ) || mb_strlen( $descricao ) == 0 ) { // Verificar se não é vazio ou nulo
        echo 'O campo "Descrição" não pode estar vazio';
    } elseif( mb_strlen( $descricao ) > 100 ) { // Verificar a quantidade de caracteres máximos
        echo 'O campo "Descrição" deve conter menos de 100 caracteres';
    } else {

        try {

            $beneficio = new Beneficios();
            $beneficio->id = $id;
            $beneficio->descricao = $descricao;

            $daoBeneficio = new BeneficiosDAO();
            $daoBeneficio->editar( $beneficio );

            // NECESSÁRIO!! É a resposta para o validator.js de que tudo correu bem
            echo "OK";

        } catch ( \PDOException $e ) {

            if ( $e->errorInfo[1] == 1062 ) { // Código de erro da exceção de UNIQUE CONSTRAINT

                echo 'Não são permitidos valores duplicados na tabela.';

            } else {

                echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto
                
            }
        }

    }

?>