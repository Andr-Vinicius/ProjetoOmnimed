<?php

    // Imports, recebe o modelo da classe e o DAO. Path relativo a si mesmo através do __DIR__
    ini_set('default_charset', 'UTF-8');
    require_once __DIR__ . '/../model/FinalidadesRemediosModel.php';
    require_once __DIR__ . '/../DAO/FinalidadesRemediosDAO.php';

    // Receber os valores
    // trim() utilizado para remover espaços no fim e no começo
    $descricao = trim( $_POST[ 'descricao' ] );
    
    if( is_null( $descricao ) || mb_strlen( $descricao ) == 0 ) { // Verificar se não é vazio ou nulo
        echo 'O campo "Descrição" não pode estar vazio';
    } elseif( mb_strlen( $descricao ) > 100 ) { // Verificar a quantidade de caracteres máximos
        echo 'O campo "Descrição" deve conter menos de 100 caracteres';
    } else {
        
        try {
            $finalidades = new FinalidadesRemedios();
            $finalidades->descricao = $descricao;

            $daoFinalidade = new FinalidadesRemediosDAO();
            $daoFinalidade->cadastrar( $finalidades );

            // NECESSÁRIO!! É a resposta para o validator.js de que tudo correu bem
            echo 'OK';

        } catch ( \PDOException $e ) {

            if ( $e->errorInfo[1] == 1062 ) { // Código de erro da exceção de UNIQUE CONSTRAINT

                echo 'Não são permitidos valores duplicados na tabela.';

            } else {

                echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto
                
            }
        }
            
    }

?>