<?php

    require_once __DIR__ . "/../../model/Clinica.php";
    require_once __DIR__ . "/../../model/Administrativo.php";


    //CLINICA
    $cli_id = $_REQUEST[ 'clinica_id' ];
    $cli_razao = $_REQUEST[ 'clinica_razao' ];
    $cli_data_fundacao = $_REQUEST[ 'clinica_data_fundacao' ];
    $cli_cnpj = $_REQUEST[ 'clinica_cnpj' ];
    $cli_contato1 = $_REQUEST[ 'clinica_contato1' ];
    $cli_contato2 = $_REQUEST[ 'clinica_contato2' ];


    //USUARIO_COMUM
    $cli_logradouro = $_REQUEST[ 'clinica_logradouro' ];
    $cli_numero = $_REQUEST[ 'clinica_numero' ];
    $cli_bairro = $_REQUEST[ 'clinica_bairro' ];
    $cli_cidade = $_REQUEST[ 'clinica_cidade' ];
    $cli_estado = $_REQUEST[ 'clinica_estado' ];

    

try{

    $clinica = new Clinicas();
    $clinica->cli_id = $cli_id;
    $clinica->cli_razao = $cli_razao;
    $clinica->cli_data_fundacao = $cli_data_fundacao;
    $clinica->cli_cnpj = $cli_cnpj;
    $clinica->cli_contato1 = $cli_contato1;
    $clinica->cli_contato2 = $cli_contato2;

    $obter =  new ClinicaDAO();
    $cli_fk_adm = $obter->obterFKPorId($clinica);
    $clinica->cli_fk_adm = $cli_fk_adm;

    $obterFKfuncionario =  new AdministrativoDAO();
    $cli_fk_fun = $obter->obterFKPorId($clinica);

    $obterFKusuario =  new FuncionariosDAO();
    $cli_fk_usc = $obter->obterFKPorId($cli_fk_fun);


    $usuario->usuario_id = $cli_fk_usc['fk_usuario_comum_id'];
    $usuario->usc_logradouro = $cli_logradouro;
    $usuario->usc_numero = $cli_numero;
    $usuario->usc_bairro = $cli_bairro;
    $usuario->usc_cidade = $cli_cidade;
    $usuario->usc_estado = $cli_estado;


    $editarClinica = new ClinicaDAO();
    $editarClinica->editarClinica($clinica);


    header("location:../../view/mod01/listagemClinicas.php");

}catch(\Throwable $th) {
    echo 'Algo deu errado';
}


?>