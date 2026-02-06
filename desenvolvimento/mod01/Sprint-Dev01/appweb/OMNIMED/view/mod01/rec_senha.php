<?php

    require_once __DIR__ . "/../model/Login.php";
    require_once __DIR__ . "/../controller/LoginDAO.php";

    $user = $_POST['emPront'];

    $login = new Usuario();
    $login->__set('user', $user);

    $dao = new LoginDAO();
    
    switch($user){
        case str_starts_with($user, 'ME'):
        case str_starts_with($user, 'EN'):
        case str_starts_with($user, 'CO'):
        case str_starts_with($user, 'AD'):
            $dao->logarFuncionario($login);
            break;
        default:
            $dao->logarPaciente($login);
            break;
    }

?>