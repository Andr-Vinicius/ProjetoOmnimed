<?php
    require_once __DIR__ . '/../DAO/RemediosDAO.php';
    require_once __DIR__ . '/../model/RemediosModel.php';

    require_once __DIR__ . "/../model/RemediosModel.php";
    require_once __DIR__ . "/../DAO/RemediosDAO.php";
    require_once __DIR__ . '/../model/FinalidadesRemediosModel.php';
    require_once __DIR__ . '/../model/UsoRemediosModel.php';
    require_once __DIR__ . '/../DAO/UsoRemediosDAO.php';

    $nome = $_POST['nome'];
    $dosagem = $_POST['dosagem'];
    $via_dosagem = $_POST['via_dosagem'];
    $forma_farmaceutica = $_POST['forma_farmaceutica'];
    $indicacao = $_POST['indicacao'];
    $contraindicacao = $_POST['contraindicacao'];
    $finalidadeId = isset( $_POST['finalidade']  ) ? $_POST['finalidade']  : null ; 

<<<<<<< .mine
    $controller = new RemediosDAO();
    $controller->cadastrar( $remedios );

||||||| .r452

=======
>>>>>>> .r507
    try {

        if( $finalidadeId != null ) {

            $remedios = new Remedios();
            $remedios->nome = $nome;
            $remedios->via_dosagem = $via_dosagem;
            $remedios->forma_farmaceutica = $forma_farmaceutica;
            $remedios->indicacao = $indicacao;
            $remedios->contraindicacao = $contraindicacao;
            $remedios->dosagem = $dosagem;

            $daoRemedio = new RemediosDAO();
            $remedios->id = $daoRemedio->cadastrar($remedios); // Recebe o último Id inserido

            $daoUsoRemedio = new UsoRemediosDAO();

            foreach( $finalidadeId as $finalidade ) {

                $finalidadeModel = new FinalidadesRemedios();
                $finalidadeModel->id = $finalidade;
                
                $usoRemedio = new UsoRemedios();
                $usoRemedio->finalidade = $finalidadeModel;
                $usoRemedio->remedio = $remedios;

                $daoUsoRemedio->cadastrar( $usoRemedio );

            }

        } else {
            echo "Ao menos um finalidade deve ser definido";
        }

        echo "OK";
        
    } catch (\PDOException $e) {

            echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto

    }

?>