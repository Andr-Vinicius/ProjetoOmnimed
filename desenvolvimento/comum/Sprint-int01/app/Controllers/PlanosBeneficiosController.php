<?php

namespace App\Controllers;

use App\Entities\PlanosBeneficios;
use App\Models\PlanosBeneficiosModel;

class PlanosBeneficiosController extends BaseController {

    public function editar() {

        $data = $this->request->getPost();

        $planosBeneficios = new PlanosBeneficios();

        // Recebe o ID do plano associado via find() no banco, para evitar
        // receber via página, uma vez que este poderia ser manipulado
        $planosBeneficiosModel = new PlanosBeneficiosModel();
        $planosBeneficios = $planosBeneficiosModel->find( $data['PBN_ID'] );

        // Preenche então com os dois dados atualizados, recebidos da página
        $planosBeneficios->fill( $data );

        if ( $planosBeneficiosModel->update($planosBeneficios->PBN_ID, $planosBeneficios) === false ) {

            foreach ($planosBeneficiosModel->errors() as $key => $error) {
                // Talvez mostrar erro, mas não pensei em como fazer isso para a edição
                echo $error . "<br/>";
            }

            return; // Quebra a execução mais cedo

        }

    }

    public function excluir() {

        $data = $this->request->getPost();

        $planosBeneficios = new PlanosBeneficios();

        // Recebe o ID do plano associado via find() no banco, para evitar
        // receber via página, uma vez que este poderia ser manipulado
        $planosBeneficiosModel = new PlanosBeneficiosModel();
        $planosBeneficios = $planosBeneficiosModel->find( $data['PBN_ID'] );

        // Preenche então com os dois dados atualizados, recebidos da página
        $planosBeneficios->fill( $data );

        // Não permitir a exclusão caso seja o último benefício cadastrado
        if ( intval( $planosBeneficiosModel->contarListagem( $planosBeneficios->FK_PLANOS_PLN_ID ) ) == 1 ) {
            echo "Não é possível realizar a exclusão.";
        } else  if ($planosBeneficiosModel->delete( $data['PBN_ID'] ) === false) {
            // Aqui, comentei os erros pela forma que o js script exibe o erro.
            // foreach ($planosBeneficiosModel->errors() as $key => $error) {
            //     echo $error . "<br/>";
            // }
            echo "Não é possível realizar a exclusão.";
        } 
    }
}

?>