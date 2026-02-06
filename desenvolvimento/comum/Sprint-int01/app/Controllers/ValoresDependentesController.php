<?php

namespace App\Controllers;

use App\Entities\ValoresDependentes;
use App\Models\ValoresDependentesModel;

class ValoresDependentesController extends BaseController {

    public function editar() {

        $data = $this->request->getPost();

        $valoresDependentes = new ValoresDependentes();

        // Recebe o ID do plano associado via find() no banco, para evitar
        // receber via página, uma vez que este poderia ser manipulado
        $valoresDependentesModel = new ValoresDependentesModel();
        $valoresDependentes = $valoresDependentesModel->find( $data['VPD_ID'] );

        // Preenche então com os dois dados atualizados, recebidos da página
        $valoresDependentes->fill( $data );

        if($valoresDependentes->VPD_IDADE_MINIMA >= $valoresDependentes->VPD_IDADE_MAXIMA) {
                        
            echo 'A idade mínima não pode ser maior que a idade máxima.';

            return; // Quebra a execução mais cedo

        }

        if ( $valoresDependentesModel->update($valoresDependentes->VPD_ID, $valoresDependentes) === false ) {

            foreach ($valoresDependentesModel->errors() as $key => $error) {
                // Talvez mostrar erro, mas não pensei em como fazer isso para a edição
                echo $error . "<br/>";
            }

            return; // Quebra a execução mais cedo

        }

        echo 'OK';

    }

    public function excluir() {

        $data = $this->request->getPost();

        $valoresDependentesModel = new ValoresDependentesModel();

        if ($valoresDependentesModel->delete( $data['VPD_ID'] ) === false) {
            // Aqui, comentei os erros pela forma que o js script exibe o erro.
            // foreach ($valoresDependentesModel->errors() as $key => $error) {
            //     echo $error . "<br/>";
            // }
            echo "Não é possível realizar a exclusão.";
        } 
    }
}

?>