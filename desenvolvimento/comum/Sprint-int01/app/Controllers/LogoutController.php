<?php

namespace App\Controllers;

class LogoutController extends BaseController {

    // Views
    // Chama a página de criação de nova finalidade
    public function logout() {
        return view('/logout.php');
    }

}