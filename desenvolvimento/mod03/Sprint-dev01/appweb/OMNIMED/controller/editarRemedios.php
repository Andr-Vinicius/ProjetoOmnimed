<?php
    require_once __DIR__ . "/../DAO/RemediosDAO.php";
    require_once __DIR__ . "/../model/RemediosModel.php";

<<<<<<< .mine
    $id = $_REQUEST['id'];
    $descricao = $_REQUEST['descricao'];
||||||| .r452
    $id = trim( $_REQUEST[ 'id' ] );
    $nome = $_REQUEST['nome'];
    $dosagem = $_REQUEST['dosagem'];
    $via_dosagem = $_REQUEST['via_dosagem'];
    $forma_farmaceutica = $_REQUEST['forma_farmaceutica'];
    $indicacao = $_REQUEST['indicacao'];
    $contraindicacao = $_REQUEST['contraindicacao'];
    $finalidadeId = $_REQUEST['finalidade'];
=======
    $id = trim( $_REQUEST[ 'id' ] );
    $nome = $_REQUEST['nome'];
    $dosagem = $_REQUEST['dosagem'];
    $via_dosagem = $_REQUEST['via_dosagem'];
    $forma_farmaceutica = $_REQUEST['forma_farmaceutica'];
    $indicacao = $_REQUEST['indicacao'];
    $contraindicacao = $_REQUEST['contraindicacao'];
    $finalidadeId = isset( $_POST['finalidade']  ) ? $_POST['finalidade']  : null ;
>>>>>>> .r507

<<<<<<< .mine
    $remedios = new Remedios();
    $remedios->id = $id;
    $remedios->descricao = $descricao;

||||||| .r452

=======
>>>>>>> .r507
    $controller = new RemediosDAO();
    $controller->editar($remedios);

    header("location:../view/mod03/reme$remedios/listarRemedios.php");

<<<<<<< .mine
||||||| .r452
        $daoRemedio = new RemediosDAO();
        $daoRemedio->editar($remedios);

        $finalidade = new FinalidadesRemedios();
        $finalidade->id = $finalidadeId;

        $usoRemedio = new UsoRemedios();
        $usoRemedio->finalidade = $finalidade;
        $usoRemedio->remedio = $remedios;

        $daoUsoRemedio = new UsoRemediosDAO();
        $daoUsoRemedio->editar( $usoRemedio );

        echo "OK";
        
    } catch (\PDOException $e) {
        
            echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto

    }

=======
        $daoRemedio = new RemediosDAO();
        $daoRemedio->editar($remedios);

        $daoUsoRemedio = new UsoRemediosDAO();

        if( $finalidadeId != null ) {

            foreach( $finalidadeId as $finalidade ) {
            
                $finalidadeModel = new FinalidadesRemedios();
                $finalidadeModel->id = $finalidade;
    
                $usoRemedio = new UsoRemedios();
                $usoRemedio->finalidade = $finalidadeModel;
                $usoRemedio->remedio = $remedios;
                
                $daoUsoRemedio->cadastrar( $usoRemedio );
                
            }

        }

        echo "OK";
        
    } catch (\PDOException $e) {
        
            echo 'Algo deu errado.'; // Adicionar mais tratamentos de erro conforme for sendo descoberto

    }

>>>>>>> .r507
?>