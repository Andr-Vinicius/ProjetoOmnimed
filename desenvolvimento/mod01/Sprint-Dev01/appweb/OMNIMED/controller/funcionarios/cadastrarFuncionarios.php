<?php
    require_once __DIR__ . "/../../model/Funcionario.php";
    require_once __DIR__ . "/../../model/Administrativo.php";
    require_once __DIR__ . "/../../model/ExemploUsuarioModel.php";
    require_once __DIR__ . "/../../DAO/FuncionarioDAO.php";
	require_once __DIR__ . "/../../DAO/AdministrativoDAO.php";
	require_once __DIR__ . "/../../DAO/UsuarioComumDAO.php";

	function encontrouNums($string){
		if( preg_match('/\d+/', $string) > 0 ){
			return true;
		 }
	}

	function formatoData($string){
		if(preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]/", $string)){
			return true;
		}
	}

		function formatoCPF($string){
		if(preg_match("/^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}/", $string)){
			return true;
		}
	}
		function formatoRG($string){
		if(preg_match("/^[0-9]{2}.?[0-9]{3}.?[0-9]{3}-?[0-9]{1}/", $string)){
			return true;
		}
	}


	function senhaValida($senha) {
		if(preg_match('/[a-z]/', $senha) && preg_match('/[A-Z]/', $senha) 
		&& preg_match('/[0-9]/', $senha)){
			return true;
		}
	}

	function validarData($data) {
		$array = explode("-", $data);
		$dia = $array[2];
		$mes = $array[1];
		$ano = $array[0];

		if($dia < 1 || $dia > 31){
			echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta";
			die();
		}

		if($mes < 1 || $mes > 12){
			echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta";
			die();
		}

		if($ano < 1910 || $ano > 2022){
			echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta";
			die();
		}
	}



    $fun_nome = $_POST['nome_funcionario'];
    $fun_nascimento = $_POST['nascimento_funcionario'];
    $fun_sexo = $_POST['genre'];
    $fun_cpf = $_POST['cpf_funcionario'];
    $fun_rg = $_POST['rg_funcionario'];
    $fun_orgaoemissor = $_POST['orgaoemissor_funcionario'];
    $fun_senha = $_POST['senha_funcionario'];
    $fun_logradouro = $_POST['logradouro_funcionario'];
    $fun_numero = $_POST['numero_funcionario'];
    $fun_bairro = $_POST['bairro_funcionario'];
    $fun_cidade = $_POST['cidade_funcionario'];
    $fun_estado = $_POST['estado_funcionario'];
    $fun_celular = $_POST['tel_celular'];
    $fun_funcao = $_POST['funcao_funcionario'];
    $fun_crm = $_POST['crm_funcionario'];
    $fun_admissao = $_POST['admissao_funcionario'];
    $fun_demissao = $_POST['demissao_funcionario'];
    $fun_salario = $_POST['salario_funcionario'];
    $fun_clinica = "Ominimed";


	// VALIDAÇÃO DOS CAMPOS


	// Nome
	if(encontrouNums($fun_nome) == true || 
	(strlen($fun_nome) <= 4 || strlen($fun_nome) >= 180) ||
	(empty($fun_nome) == true)){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_nome;
		die();
	}

	// Data de Nascimento
	validarData($fun_nascimento);
	if(encontrouNums($fun_nascimento) == false || empty($fun_nascimento)
	|| formatoData($fun_nascimento) == false){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_nascimento;
		die();
	}

	// CPF
	if(encontrouNums($fun_cpf) == false || (empty($fun_cpf) == true)
	|| formatoCPF($fun_cpf) == false){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_cpf;
		die();
	}

	// RG
	if(encontrouNums($fun_rg) == false || (empty($fun_rg) == true)
	|| formatoRG($fun_rg) == false){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_rg;
		die();
	}

	// Orgão emissor
	if(encontrouNums($fun_orgaoemissor) == true || (empty($fun_orgaoemissor) == true)
	|| strlen($fun_orgaoemissor) != 3){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_orgaoemissor;
		die();
	}

	// Senha
	if((empty($fun_senha) == true) || 
	encontrouNums($fun_senha) == false ||
	(strlen($fun_senha) < 8 || strlen($fun_senha) > 200) ||
	senhaValida($fun_senha) == false){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_senha;
		die();
	}

	// Logradouro
	if((empty($fun_logradouro) == true) || 
	(strlen($fun_logradouro) < 3 || strlen($fun_logradouro) > 200)){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_logradouro;
		die();
	}

	// Número
	if((empty($fun_numero) == true) || 
	encontrouNums($fun_numero) == false ||
	(strlen($fun_numero) > 10)){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_numero;
		die();
	}

	// Bairro
	if((empty($fun_bairro) == true) || 
	(strlen($fun_bairro) < 3 || strlen($fun_bairro) > 100)){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_bairro;
		die();
	}
	
	// Cidade
	if((empty($fun_cidade) == true) || 
	encontrouNums($fun_cidade) == true ||
	(strlen($fun_cidade) < 5 || strlen($fun_cidade) > 100)){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_cidade;
		die();
	}

	// Celular
	if((empty($fun_celular) == true) || 
	encontrouNums($fun_celular) == false ||
	(strlen($fun_celular) < 10 || strlen($fun_celular) > 15)){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_celular;
		die();
	}

	// CRM
	if((empty($fun_crm) == true) || 
	(strlen($fun_crm) < 4 || strlen($fun_crm) > 20)){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_crm;
		die();
	}

	// Salário
	if((empty($fun_salario) == true) || 
	(strlen($fun_salario) < 3)){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_salario;
		die();
	}

	// Data de admissão
	if(encontrouNums($fun_admissao) == false || (empty($fun_admissao) == true)
	|| formatoData($fun_admissao) == false){
		echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_admissao;
		die();
	}

	// Data de demissão
	if(!empty($fun_demissao)){
		if(encontrouNums($fun_demissao) == false 
		|| formatoData($fun_demissao) == false){
			echo "Informações Incorretas – OPS! Algumas informações foram informadas de forma incorreta: ".$fun_demissao;
			die();
		}
	}




	// Geração do prontuário
	try{

		$prontuario = "";
		$sigla = "";
		
			switch($fun_funcao){
				case 1:
					$sigla = 'ME';
					break;
				case 2:
					$sigla = 'EN';
					break;
				case 3:
					$sigla = 'CO';
					break;
				case 4:
					$sigla = 'AD';
					break;
			}



		$verificar = new FuncionarioDAO();

		//Verificação
		do{
			$prontuario = $sigla . random_int(111111, 999999);
		}while($verificar->verificarProntuario($prontuario) != null);


		$usuario = new Usuario();
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

		$cadastroUsuario = new UsuarioComumDAO();
		$id_usuario = $cadastroUsuario->cadastrarUsuario($usuario);




		$funcionarios = new Funcionario();
		$funcionarios->fun_prontuario = $prontuario;
		$funcionarios->fk_usuario_comum = $id_usuario;
		
		$cadastroFuncionario = new FuncionarioDAO();
		$id_fun = $cadastroFuncionario->cadastrarFuncionario($funcionarios);


		$administrativo = new Administrativo();
		$administrativo->adm_telefone_celular = $fun_celular;
		$administrativo->adm_funcao = $fun_funcao;
		$administrativo->adm_crm = $fun_crm;
		$administrativo->adm_data_admissao = $fun_admissao;
		$administrativo->adm_data_demissao = $fun_demissao;
		$administrativo->adm_salario = $fun_salario;
		$administrativo->adm_clinica = $fun_clinica;
		$administrativo->adm_fk_funcionario_id = $id_fun;

		$cadastroAdministrativo = new AdministrativoDAO();
		$cadastroAdministrativo->cadastrarAdministrativo($administrativo);


		//header("location:../../view/mod01/listagemFuncionarios.php");
	
		echo 'OK';
} catch (\Throwable $th) {
    echo 'Algo deu errado';
}


?>