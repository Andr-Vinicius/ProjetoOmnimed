<?php

require_once __DIR__ . '/../../DAO/LoginDAO.php';

$emPront = $_POST['emPront'];

if($emPront == "" || trim($emPront) == ""){
    echo 'Credencial não foi inserida corretamente';
    die();
}

try {
    $dao = new LoginDAO();
    $resultado;

    switch($emPront){
        case str_starts_with($emPront, 'AD'):
        case str_starts_with($emPront, 'ME'):
        case str_starts_with($emPront, 'EN'):
        case str_starts_with($emPront, 'CO'):
            $resultado = $dao->verificarConta('FUN_PRONTUARIO', $emPront, 'funcionarios');
            break;
        default:
            $resultado = $dao->verificarConta('PAC_EMAIL', $emPront, 'pacientes');
            break;
    }

    if(count($resultado) == 0){
        throw new Exception('Usuário não encontrado');
    }

    // Colocar alguma tag para depois conseguir identificar se ele é paciente ou funcionário
    $de = $_POST['emPront'];
    $assunto = 'Recuperação de Senha';
    $mensagem = 'Por favor, necessito recuperar a minha conta';
    $headers = 'From: ' . $de;

    mail('omnimed@gmail.com', $assunto, $mensagem, $headers);
} catch (\Throwable $th) {
    echo $th->getMessage();
}

?>