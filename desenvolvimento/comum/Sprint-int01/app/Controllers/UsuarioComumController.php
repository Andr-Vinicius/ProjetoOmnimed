<?php

namespace App\Controllers;

use App\Entities\UsuarioComum;
use App\Models\UsuarioComumModel;


class UsuarioComumController extends BaseController {

    //Views
    public function novo() {
        return view('/usuarios_comum/create.php');
    }

    public function listagem() {
        return view('/usuarios_comum/list.php');
    }

    /*public function editar( $id ) {
        return view('/finalidades/edit.php', ['id' => $id,]);
    }*/

    //Funções
    public function salvar() {

        $data = $this->request->getPost();

        $usuario = new UsuarioComum();
        $usuario->fill($data);
        $usuario->USC_HASH_REC = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));
 
        $usuarioComumModel = new UsuarioComumModel();

        if( $usuarioComumModel->save( $usuario ) === false ) {
            foreach ( $usuarioComumModel->errors() as $key => $error) {
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
