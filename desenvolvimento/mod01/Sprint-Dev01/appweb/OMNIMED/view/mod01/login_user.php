<?php

    require_once __DIR__ . "/../../model/Login.php";
    require_once __DIR__ . "/../../controller/LoginDAO.php";

    $user = $_POST['emPront'];
	$pass = $_POST['senha'];

    $login = new Usuario();
    $login->__set('user', $user);
    $login->__set('password', $pass);

    $dao = new LoginDAO();
    $resultado = null;

    switch($user){
        case str_starts_with($user, 'ME'):
        case str_starts_with($user, 'EN'):
        case str_starts_with($user, 'CO'):
        case str_starts_with($user, 'AD'):
            $resultado = $dao->logarFuncionario($login);
            break;
        default:
            $resultado = $dao->logarPaciente($login);
            break;
    }
    
    if($resultado == null){
        echo "Não encontrado";
    }else{
        print_r($resultado);
    }

?>