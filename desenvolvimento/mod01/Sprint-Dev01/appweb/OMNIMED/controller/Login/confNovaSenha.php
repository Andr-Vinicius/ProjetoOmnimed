<?php

require_once __DIR__ . '/../../DAO/LoginDAO.php';

$senha = $_POST['senha'];
$confNovaSenha = $_POST['conf_senha'];

try {
    if($senha == "" || trim($senha) == "" || $confNovaSenha == "" || trim($confNovaSenha) == ""){
        throw new Exception('Senha não inserida corretamente');
    }

    if($senha != $confNovaSenha || trim($senha) != trim($confNovaSenha)){
        throw new Exception('Senhas diferentes');
    }

    $dao = new LoginDAO();

    // Se for funcionário, utilizar a tag relacionada ao gerar o e-mail para a pessoa
    //$resultado = $dao->alterarSenhaFuncionario($senha, '');

    // Se for paciente, utilizar a tag relacionada ao gerar o e-mail para a pessoa
    //$resultado = $dao->alterarSenhaPaciente($senha, '');
   
    echo 'Senha Alterada';
} catch (\Throwable $th) {
    echo $th->getMessage();
}

?>