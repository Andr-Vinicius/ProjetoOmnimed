<?php

namespace App\Controllers;

class SobreProjetoController extends BaseController{

    //View do sobre o projeto
    public function listagem(){
        return View('/sobre_projeto/list.php');
    }
}

?>