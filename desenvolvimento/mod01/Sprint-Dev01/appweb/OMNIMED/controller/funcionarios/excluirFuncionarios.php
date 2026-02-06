<?php


    require_once __DIR__ . "/../../model/Funcionario.php";
    require_once __DIR__ . "/FuncionarioDAO.php";

    $fun_id = $_REQUEST['id'];

try{



    $funcionarios = new Funcionario();
    $funcionarios->fun_id = $fun_id;


    $obter =  new FuncionarioDAO();
    $fk_usc = $obter->obterFKPorId($funcionarios);

    $funcionarios->fk_usuario_comum = $fk_usc['fk_usuario_comum_usc_id'];

    $controller = new FuncionarioDAO();
    $controller->excluirFuncionario($funcionarios);


    header("location:../../view/mod01/listagemFuncionarios.php");


}catch (\Throwable $th) {
    echo "ERRO: "."<br>".$th;
}




?>