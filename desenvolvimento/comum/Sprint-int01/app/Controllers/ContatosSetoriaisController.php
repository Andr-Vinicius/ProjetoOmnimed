<?php

namespace App\Controllers;

use App\Entities\ContatosSetoriais;
use App\Models\ContatosSetoriaisModel;

class ContatosSetoriaisController extends BaseController{
    
    // Views
    // Chama a pagina de criacao
    public function novo(){
        return view('/contatos_setoriais/create.php');
    }

    // Listagem
    public function listagem(){
        return view('/contatos_setoriais/list.php');
    }

    // Chama a pagina de edicao, com o id do contato que foi clicado
    public function editar( $id ){
        return view('/contatos_setoriais/edit.php', ['id' => $id,]);
    }

    // Funções
    // Função de salvar no banco. Devido à função save() do Model,
    // esta função serve tanto para inserção quanto para update.
    // A definição interna de se é uma inserção ou update, é baseado 
    // em se existe um id ou não. Utiliza a função padrão do Codeigniter
    public function salvar() {

        $data = $this->request->getPost();
        
        $contatosSetoriais = new ContatosSetoriais();
        $contatosSetoriais->fill( $data );
        
        $contatosSetoriaisModel = new ContatosSetoriaisModel();

        // Verifica se o update/inserção foi feita com sucesso
        if( $contatosSetoriaisModel->save( $contatosSetoriais ) === false ) {
            // Exibe os erros
            foreach ( $contatosSetoriaisModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
        } else {
            // Mensagem de que deu tudo certo
            echo 'OK';
        }

    }

    // Funcao responsavel por excluir o contato setorial em questão
    public function excluir($id){
        $contatosSetoriaisModel = new ContatosSetoriaisModel();

        // Verificacao da exclusao
        if( $contatosSetoriaisModel->delete($id) === false ){
            // Captura todos os erros gerados
            foreach( $contatosSetoriaisModel->errors() as $key => $error ){
                echo $error . "<br/>";
            }
        }else{
            // Retorna para a listagem
            return view('/contatos_setoriais/list.php');
        }
    }

}

?>