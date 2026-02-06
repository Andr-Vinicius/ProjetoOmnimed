<?php

require_once __DIR__ . '/../../DAO/LoginDAO.php';
require_once __DIR__ . '/../../model/Login.php';

$emPront = $_POST['emPront'];
$senha = $_POST['senha'];

if($emPront == "" || $senha == "" || trim($emPront) == "" || trim($senha) == ""){
    echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta";
    die();
}else{
    if( strlen($senha) < 8 || strlen($senha) > 200 ){
        echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta";
        die();
    }

    if(!preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,}$/', $senha)){
        echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta";
        die();
    }
} 

try {
    $usuario = new Usuario();
    $usuario->user = $emPront;
    $usuario->password = $senha;

    $dao = new LoginDAO();
    $resultado;

    switch($emPront){
        case str_starts_with($emPront, 'AD'):
        case str_starts_with($emPront, 'ME'):
        case str_starts_with($emPront, 'EN'):
        case str_starts_with($emPront, 'CO'):
            if( strlen($emPront) > 8 || strlen($emPront) < 8 ){
                echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta";
                die();
            }

            $resultado = $dao->logarFuncionario($usuario);
            break;
        default:
            if(strlen($emPront) > 200){
                echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta";
                die();
            }

            $resultado = $dao->logarPaciente($usuario);
            break;
    }

    if(count($resultado) > 0){
        if(in_array("1", $resultado[0])){
            echo 'ME';
        }else if(in_array("2", $resultado[0])){
            echo 'AD';
        }else if(in_array("3", $resultado[0])){
            echo 'EN';
        }else if(in_array("4", $resultado[0])){
            echo 'CO';
        }else{
            echo 'PAC';
        }
    }else{
        echo 'Não foi possível realizar o login';
    }

} catch (\Throwable $th) {
    echo $th->getMessage();
}

?>