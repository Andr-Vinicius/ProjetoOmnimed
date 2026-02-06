<?php

namespace App\Controllers;

use App\Entities\Finalidades;
use App\Models\FinalidadesModel;

class FinalidadesController extends BaseController {

    // Views
    // Chama a página de criação de nova finalidade
    public function novo() {
        return view('/finalidades/create.php');
    }

    // Chama a página de listagem de finalidades
    public function listagem() {
        return view('/finalidades/list.php');
    }

    // Chama a página de edição, passando como parâmetro (POST)
    // o id da finalidade que deve ser editada.
    public function editar( $id ) {
        return view('/finalidades/edit.php', ['id' => $id,]);
    }

    // Funções
    // Função de salvar no banco. Devido à função save() do Model,
    // esta função serve tanto para inserção quanto para update.
    // A definição interna de se é uma inserção ou update, é baseado 
    // em se existe um id ou não. Utiliza a função padrão do Codeigniter
    public function salvar() {

        $data = $this->request->getPost();
        
        $finalidade = new Finalidades();
        $finalidade->fill( $data );
        
        $finalidadeModel = new FinalidadesModel();

        var_dump($finalidadeModel->getValidationRules());

        // Verifica se o update/inserção foi feita com sucesso
        if( $finalidadeModel->save( $finalidade ) === false ) {
            // Exibe os erros
            foreach ( $finalidadeModel->errors() as $key => $error) {
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
            $finalidadeModel = new FinalidadesModel();

            // Verifica se a exlusão foi feita com sucesso
            if( $finalidadeModel->delete( $id ) === false ) {
                // Exibe os erros
                foreach ( $finalidadeModel->errors() as $key => $error) {
                    echo $error . "<br/>";
                }
            } else {
                echo 'OK';
            }

        } catch(\Exception $e) {
            // Caso a chave estrangeira passada não exista em sua tabela
            if( $e->getCode() == 1451 ) {
                echo "AVISO: NÃO foi possível excluir a finalidade. Há um ou mais remédios atrelado a ela.";
            }

            //return; // Quebra a execução mais cedo
        }
        
    }

}
