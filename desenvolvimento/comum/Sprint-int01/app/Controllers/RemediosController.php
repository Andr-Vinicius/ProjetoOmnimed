<?php

namespace App\Controllers;

use App\Entities\Remedios;
use App\Entities\UsoRemedios;
use App\Models\RemediosModel;
use App\Models\UsoRemediosModel;

class RemediosController extends BaseController {

    public function novo() {
        return view('/remedios/create.php');
    }

    public function listagem() {
        return view('/remedios/list.php');
    }

    //Encaminha para a listagem de remédios disponíveis
    public function listagemRemediosDisponiveis() {
        return view('/remedios/list_disponivel.php');
    }

    public function editar($id) {
        return view('/remedios/edit.php', ['id' => $id,]);
    }

    public function criar() {

        $data = $this->request->getPost();

        if( !isset( $data['finalidade'] ) ) {
            // Verifica se ao menos uma finalidade foi settada
            // Funciona também no caso de nenhuma finalidade ter sido cadastrada
            echo 'Um remédio deve ter ao menos uma finalidade.';
            return; // Quebra a execução mais cedo
        } 

        $remedio = new Remedios();
        $remedio->fill($data);

        $remedioModel = new RemediosModel();

        var_dump($remedioModel->getValidationRules());

        if ( $remedioModel->insert($remedio) === false ) {

            foreach ($remedioModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }

            return; // Quebra a execução mais cedo

        }   
        
        // Recebe o id do remédio recém inserido no banco, e passa para utilização
        // no usoRemedio
        $usoRemedio = new UsoRemedios();
        $usoRemedio->FK_REMEDIOS_RMD_ID = (string) $remedioModel->getInsertID();

        $usoRemedioModel = new UsoRemediosModel();
        
        try{

            // Itera o array de finalidades e as cadastra. Caso algum erro aconteça
            // deleta o remédio cadastrado, deletando junto as inserções em
            // uso_remedio
            foreach ( $remedio->finalidade as $finalidade ) {

                $usoRemedio->FK_FINALIDADE_REMEDIOS_FIN_ID = $finalidade;
    
                if( $usoRemedioModel->insert( $usoRemedio ) === false ) {

                    foreach ($remedioModel->errors() as $key => $error) {
                        echo $error . "<br/>";
                    }

                    // Deleta o remédio inserido
                    $remedioModel->delete( $usoRemedio->FK_REMEDIOS_RMD_ID );

                    echo "AVISO: O remédio NÃO foi cadastrado.";

                    return; // Quebra a execução mais cedo

                }

            }

        } catch(\Exception $e) {

            // Caso a chave estrangeira passada não exista em sua tabela
            if( $e->getCode() == 1452 ) {
                echo "Algo deu errado. Recarregue a página e tente novamente.";
                echo "AVISO: O remédio NÃO foi cadastrado.";
                // Deleta o remédio inserido
                $remedioModel->delete( $usoRemedio->FK_REMEDIOS_RMD_ID );
            }

            return; // Quebra a execução mais cedo

        }

        echo 'OK';

    }

    public function salvarEdicao() {

        $data = $this->request->getPost();

        $remedio = new Remedios();
        $remedio->fill($data);

        $remedioModel = new RemediosModel();

        if ( $remedioModel->update($remedio->RMD_ID, $remedio) === false ) {

            foreach ($remedioModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }

            return; // Quebra a execução mais cedo

        }

        // Caso haja uma nova finalidade adicionada na edição
        if( isset( $data['finalidade'] ) ) {

            // Recebe o id do remédio editado, e passa para utilização no usoRemedio
            $usoRemedio = new UsoRemedios();
            $usoRemedio->FK_REMEDIOS_RMD_ID = $remedio->RMD_ID;

            $usoRemedioModel = new UsoRemediosModel();
            
            try{

                // Itera o array de finalidades e as cadastra. Caso algum erro aconteça,
                // gera mensagem de erro
                foreach ( $remedio->finalidade as $finalidade ) {

                    $usoRemedio->FK_FINALIDADE_REMEDIOS_FIN_ID = $finalidade;
        
                    if( $usoRemedioModel->insert( $usoRemedio ) === false ) {

                        foreach ($remedioModel->errors() as $key => $error) {
                            echo $error . "<br/>";
                        }

                        echo "AVISO: Algumas finalidades podem não ter sido cadastradas.";

                        return; // Quebra a execução mais cedo

                    }

                }

            } catch(\Exception $e) {

                // Caso a chave estrangeira passada não exista em sua tabela
                if( $e->getCode() == 1452 ) {
                    echo "Algo deu errado. Recarregue a página e tente novamente.";
                    echo "AVISO: Algumas finalidades podem não ter sido cadastradas.";
                }

                return; // Quebra a execução mais cedo

            }
        
        }

        echo 'OK';

    }
 
    public function excluir($id) {

        $remedioModel = new RemediosModel();

        if ($remedioModel->delete( $id ) === false) {
            foreach ($remedioModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
        } else {
            return view('/remedios/list.php');
        }
    }

    public function salvarQuantidade( $id, $num ) {
        $remedio = new Remedios();
        $remedioModel = new RemediosModel();
        $remedio->RMD_ID=$id;
        $remedio->RMD_QUANTIDADE=$num;
        if($num==0){
            $remedio->RMD_DISPONIVEL=0;
        }else{
            $remedio->RMD_DISPONIVEL=1;
        }
        if ($remedioModel->update( $id,$remedio ) === false) {
            foreach ($remedioModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
        } 
    }
}
?>