<?php

    require_once __DIR__ . "/../../model/Funcionario.php";
    require_once __DIR__ . "/../../model/Administrativo.php";
    require_once __DIR__ . "/../../model/ExemploUsuarioModel.php";
    require_once __DIR__ . "/FuncionarioDAO.php";
    require_once __DIR__ . "/../AdministrativoDAO.php";
    require_once __DIR__ . "/../UsuarioComumDAO.php";

    $fun_id = $_REQUEST[ 'id' ];
    $fun_nome = $_REQUEST['nome_funcionario'];
    $fun_nascimento = $_REQUEST['nascimento_funcionario'];
    $fun_sexo = $_REQUEST['genre'];
    $fun_cpf = $_REQUEST['cpf_funcionario'];
    $fun_rg = $_REQUEST['rg_funcionario'];
    $fun_orgaoemissor = $_REQUEST['orgaoemissor_funcionario'];
    $fun_senha = $_REQUEST['senha_funcionario'];
    $fun_logradouro = $_REQUEST['logradouro_funcionario'];
    $fun_numero = $_REQUEST['numero_funcionario'];
    $fun_bairro = $_REQUEST['bairro_funcionario'];
    $fun_cidade = $_REQUEST['cidade_funcionario'];
    $fun_estado = $_REQUEST['estado_funcionario'];
    $fun_celular = $_REQUEST['tel_celular'];
    $fun_funcao = $_REQUEST['funcao_funcionario'];
    $fun_crm = $_REQUEST['crm_funcionario'];
    $fun_admissao = $_REQUEST['admissao_funcionario'];
    $fun_demissao = $_REQUEST['demissao_funcionario'];
    $fun_salario = $_REQUEST['salario_funcionario'];
    $fun_clinica = "Ominimed";
	



    $prontuario = "";
    $sigla = "";

    switch($fun_funcao){
        case $fun_funcao = 1:
            $sigla = 'ME';
            break;
        case $fun_funcao = 2:
            $sigla = 'EN';
            break;
        case $fun_funcao = 3:
            $sigla = 'CO';
            break;
        case $fun_funcao = 4:
            $sigla = 'AD';
            break;
    }



    $verificar = new FuncionarioDAO();

    //Verificação
    do{
        $prontuario = $sigla . random_int(111111, 999999);
    }while($verificar->verificarProntuario($prontuario) != null);

    try{

        $funcionarios = new Funcionario();
        $funcionarios->fun_id = $fun_id;
        $funcionarios->fun_prontuario = $prontuario;

        $obter =  new FuncionarioDAO();
        $fk_usc = $obter->obterFKPorId($funcionarios);


        $usuario = new Usuario();
        $usuario->usuario_id = $fk_usc['fk_usuario_comum_usc_id'];
        $usuario->usc_nome = $fun_nome;
        $usuario->usc_data_nascimento = $fun_nascimento;
        $usuario->usc_sexo = $fun_sexo;
        $usuario->usc_cpf = $fun_cpf;
        $usuario->usc_rg = $fun_rg;
        $usuario->usc_orgao_emissor = $fun_orgaoemissor;
        $usuario->usc_senha = $fun_senha;
        $usuario->usc_logradouro = $fun_logradouro;
        $usuario->usc_numero = $fun_numero;
        $usuario->usc_bairro = $fun_bairro;
        $usuario->usc_cidade = $fun_cidade;
        $usuario->usc_estado = $fun_estado;

        $editarUsuario = new UsuarioComumDAO();
        $editarUsuario->editarUsuario($usuario);

        $editarFuncionario = new FuncionarioDAO();
        $editarFuncionario->editarFuncionario($funcionarios);



        $administrativo = new Administrativo();
        $administrativo->adm_fk_funcionario_id = $fun_id;
        $administrativo->adm_telefone_celular = $fun_celular;
        $administrativo->adm_funcao = $fun_funcao;
        $administrativo->adm_crm = $fun_crm;
        $administrativo->adm_data_admissao = $fun_admissao;
        $administrativo->adm_data_demissao = $fun_demissao;
        $administrativo->adm_salario = $fun_salario;
        $administrativo->adm_clinica = $fun_clinica;

        $editarAdministrativo = new AdministrativoDAO();
        $editarAdministrativo->editarAdministrativo($administrativo);




        header("location:../../view/mod01/listagemFuncionarios.php");

    }catch (\Throwable $th) {
		echo $th;
        echo 'Algo deu errado';
    }



?>