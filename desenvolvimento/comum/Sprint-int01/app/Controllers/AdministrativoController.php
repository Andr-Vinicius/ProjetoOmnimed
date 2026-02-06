<?php

    namespace App\Controllers;

    use App\Entities\Administrativo;
    use App\Models\AdministrativoModel;

    class AdministrativoController extends BaseController {

        public function logado(){
            return view('/administrativo/view_administrativoLogado.php');
        }

        
    }
?>