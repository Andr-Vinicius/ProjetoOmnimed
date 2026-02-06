<?php
    require_once __DIR__ . "/../../model/Paciente.php";
    require_once __DIR__ . "/../../model/ExemploUsuarioModel.php";
    require_once __DIR__ . "/../../DAO/PacientesDAO.php";
	require_once __DIR__ . "/../../DAO/UsuarioComumDAO.php";

    $pac_nome = $_POST['nome_paciente'];
    $pac_nascimento = $_POST['nascimento_paciente'];
    $pac_sexo = $_POST['genre'];
    $pac_cpf = $_POST['cpf_paciente'];
    $pac_rg = $_POST['rg_paciente'];
    $pac_orgaoemissor = $_POST['orgaoemissor_paciente'];   
    $pac_email = $_POST['email_paciente'];
    $pac_senha = $_POST['senha_paciente'];
    $pac_logradouro = $_POST['logradouro_paciente'];
    $pac_numero = $_POST['numero_paciente'];
    $pac_bairro = $_POST['bairro_paciente'];
    $pac_cidade = $_POST['cidade_paciente'];
    $pac_estado = $_POST['estado_paciente'];
    $pac_celular1 = $_POST['tel_celular1'];
    $pac_celular2 = $_POST['tel_celular2'];

    $pac_temAlergia = $_POST['alergia'];
    $pac_alergias = $_POST['quais_alergias'];

    $pac_temFilhos = $_POST['filhos'];
    $pac_qtFilhos = $_POST['filhos_qtd'];
    
    $pac_medicacoes = $_POST['quais_medicacoes'];
    $pac_usaMedicacao = $_POST['medicacao'];

    $pac_realizaTratMedico = $_POST['tratamento'];
    $pac_tratMedico = $_POST['quais_tratamentos'];

    $pac_possuidoencasCronicas = $_POST['doencas'];
    $pac_doencasCronicas = $_POST['doencas_qtd'];



	try{


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

        $paciente = new Paciente();
        $paciente->pac_email = $pac_email;
        $paciente->fk_usuario_comum = $id_usuario;

        
        $cadastroPaciente = new PacienteDAO();
        $id_paciente = $cadastroPaciente->cadastrarPaciente($paciente);


        $responsaveis = new Responsavel();
        $responsaveis->res_tem_alergia = $pac_temAlergia;
        $responsaveis->res_qt_filhos = $pac_qtFilho;
        $responsaveis->res_quais_alergias = $pac_alergias;
        $responsaveis->res_celular1 = $pac_celular1;
        $responsaveis->res_celular2 = $pac_celular2;
        $responsaveis->res_qual_medicacao = $pac_medicacoes;
        $responsaveis->res_realiza_trat_med = $pac_realizaTratMedico;
        $responsaveis->res_quais_trat_med = $pac_tratMedico;
        $responsaveis->res_tem_filhos = $pac_temFilhos;
        $responsaveis->res_usa_medicacao = $pac_usaMedicacao;
        $responsaveis->res_tem_doecas_cronicas = $pac_possuidoencasCronicas;
        $responsaveis->res_quais_doencas = $pac_doencasCronicas;
        $responsaveis->res_fk_paciente = $id_paciente;
        

        $cadastroResponsaveis = new ResponsavelDAO();
        $cadastroResponsaveis->cadastrarResponsavel($responsaveis);

	
		echo 'OK';
} catch (\Throwable $th) {
    echo 'Algo deu errado';
}


?>