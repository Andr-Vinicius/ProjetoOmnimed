<?php

namespace App\Controllers;

use App\Entities\Beneficios;
use App\Models\BeneficiosModel;

class BeneficiosController extends BaseController {

    // Views
    // Chama a página de criação de nova beneficio
    public function novo() {
        return view('/beneficios/create.php');
    }

    // Chama a página de listagem de beneficios
    public function listagem() {
        return view('/beneficios/list.php');
    }

    // Chama a página de edição, passando como parâmetro (POST)
    // o id da beneficio que deve ser editada.
    public function editar( $id ) {
        return view('/beneficios/edit.php', ['id' => $id,]);
    }

    // Funções
    // Função de salvar no banco. Devido à função save() do Model,
    // esta função serve tanto para inserção quanto para update.
    // A definição interna de se é uma inserção ou update, é baseado 
    // em se existe um id ou não. Utiliza a função padrão do Codeigniter
    public function salvar() {

        $data = $this->request->getPost();
        
        $beneficio = new Beneficios();
        $beneficio->fill( $data );
        
        $beneficioModel = new BeneficiosModel();

        // Verifica se o update/inserção foi feita com sucesso
        if( $beneficioModel->save( $beneficio ) === false ) {
            // Exibe os erros
            foreach ( $beneficioModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
        } else {
            // Mensagem de que deu tudo certo
            echo 'OK';
        }

    }

    // Função de deletar no banco. Utiliza a função padrão do Codeigniter
    public function excluir( $id ) {

        try {

            // Cria o Model
            $beneficioModel = new BeneficiosModel();

            // Verifica se a exlusão foi feita com sucesso
            if( $beneficioModel->delete( $id ) === false ) {
                // Exibe os erros
                foreach ( $beneficioModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
            } else {
                // Recarrega a página
                return view('/beneficios/list.php');
            }

        } catch(\Exception $e) {
                
            if( $e->getCode() == 1451 ) {
                echo "AVISO: NÃO foi possível excluir o benefício. Há um ou mais planos atrelados à ele.";
            }

        }
        
    }

}
