<?php

namespace App\Controllers;

use App\Entities\Enfermeiros;
use App\Models\EnfermeirosModel;


class EnfermeirosController extends BaseController {

    //Views
    public function novo() {
        return view('/enfermeiros/create.php');
    }

    public function listagem() {
        return view('/enfermeiros/list.php');
    }

    public function logado(){
        return view('/enfermagem/view_enfermagemLogado.php');
    }

    /*public function editar( $id ) {
        return view('/finalidades/edit.php', ['id' => $id,]);
    }*/

    //Funções
    public function salvar() {

        $data = $this->request->getPost();

        $usuario = new Enfermeiros();
        $usuario->fill($data);
 
        $enfermeirosModel = new EnfermeirosModel();

        if($enfermeirosModel->save( $usuario ) === false ) {
            foreach ( $enfermeirosModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
        } else {
            echo 'OK';
        }


    }

    /*public function excluir( $id ) {

        $finalidadeModel = new FinalidadesModel();

        if( $finalidadeModel->delete( $id ) === false ) {
            foreach ( $finalidadeModel->errors() as $key => $error) {
                echo $error . "<br/>";
            }
        } else {
            return view('/finalidades/list.php');
        }
        
    }*/

}
