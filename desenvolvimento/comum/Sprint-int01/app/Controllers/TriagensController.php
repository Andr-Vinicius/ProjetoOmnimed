<?php

namespace App\Controllers;

use App\Entities\Triagens;
use App\Models\TriagensModel;

class TriagensController extends BaseController {

    // Views
    // Chama a página de criação de nova finalidade
    public function novo( $id ) {
        return view('/triagens/create.php', ['id' => $id]);
    }

    public function visualizar( $id ) {
        return view('/triagens/view_triagem_consulta.php', ['id' => $id]);
    }

    // Chama a página de listagem de finalidades
    public function listagem() {
        return view('/triagens/list.php');
    }

    // Funções
    // Função de salvar no banco. Devido à função save() do Model,
    // esta função serve tanto para inserção quanto para update.
    // A definição interna de se é uma inserção ou update, é baseado 
    // em se existe um id ou não. Utiliza a função padrão do Codeigniter
    public function salvar() {

        $data = $this->request->getPost();
        
        $triagem = new Triagens();
        $triagem->fill( $data );
        
        $triagemModel = new TriagensModel();

        // Verifica se o update/inserção foi feita com sucesso
        if( $triagemModel->save( $triagem ) === false ) {
            // Exibe os erros
            foreach ( $triagemModel->errors() as $key => $error) {
                echo $error . "<br/>";
                
            }
        } else {
            // Mensagem de que deu tudo certo
            //o OK ta comentado pq nao ta funcionando php-email-form
            //echo 'OK';
        }
        return view('/agendamentos/list.php');

    }

}