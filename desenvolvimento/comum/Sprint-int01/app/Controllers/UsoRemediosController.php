<?php

namespace App\Controllers;

use App\Entities\UsoRemedios;
use App\Models\UsoRemediosModel;

class UsoRemediosController extends BaseController {

    public function editar() {

        $data = $this->request->getPost();

        $usoRemedio = new UsoRemedios();

        // Recebe o ID do remédio associado via find() no banco, para evitar
        // receber via página, uma vez que este poderia ser manipulado
        $usoRemedioModel = new UsoRemediosModel();
        $usoRemedio = $usoRemedioModel->find( $data['URM_ID'] );

        // Preenche então com os dois dados atualizados, recebidos da página
        $usoRemedio->fill( $data );

        if ( $usoRemedioModel->update($usoRemedio->URM_ID, $usoRemedio) === false ) {

            foreach ($usoRemedioModel->errors() as $key => $error) {
                // Talvez mostrar erro, mas não pensei em como fazer isso para a edição
                echo $error . "<br/>";
            }

            return; // Quebra a execução mais cedo

        }

    }

    public function excluir() {

        $data = $this->request->getPost();

        $usoRemedioModel = new UsoRemediosModel();

        if ($usoRemedioModel->delete( $data['URM_ID'] ) === false) {
            // Aqui, comentei os erros pela forma que o js script exibe o erro.
            // foreach ($usoRemedioModel->errors() as $key => $error) {
            //     echo $error . "<br/>";
            // }
            echo "Não é possível realizar a exclusão.";
        } 
    }
}

?>