<?php

namespace App\Controllers;

use App\Entities\Medicos;
use App\Models\MedicosModel;


class MedicosController extends BaseController {

    //Views
    public function novo() {
        return view('/medicos/create.php');
    }

    public function listagem() {
        return view('/medicos/list.php');
    }

    public function logado(){
        return view('/medicos/view_medicosLogado.php');
    }

    /*public function editar( $id ) {
        return view('/finalidades/edit.php', ['id' => $id,]);
    }*/

    //Funções
    public function salvar() {

        $data = $this->request->getPost();

        $usuario = new Medicos();
        $usuario->fill($data);
 
        $medicosModel = new MedicosModel();

        if($medicosModel->save( $usuario ) === false ) {
            foreach ( $medicosModel->errors() as $key => $error) {
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
