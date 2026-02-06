<?php

require_once __DIR__ . '/../config/conexaoMod01.php';

class LoginDAO{
	private $conexao;
	private $sql;
	private $tabela;
	private $resultado;
	
	public function __construct(){
		$conn = new ConexaoMod1();
		$this->conexao = $conn->getConexao();
		$this->tabela = "usuario_comum";
	}
	
	// USE CASE 08 *
	public function logarFuncionario($dados){
		$retorno = $this->verificarConta('FUN_PRONTUARIO', $dados->__get('user'), 'funcionarios');
		
		if( count($retorno) == 0 ){
			throw new Exception('Prontuário ou Senha incorreto');
		}
		
		$this->sql = "SELECT adm.ADM_FUNCAO FROM administrativo AS adm, funcionarios, usuario_comum 
						WHERE adm.FK_FUNCIONARIOS_FUN_ID = (SELECT funcionarios.FUN_ID FROM funcionarios 
							WHERE FUN_PRONTUARIO = :pront) 
						AND funcionarios.FK_USUARIO_COMUM_USC_ID = (SELECT usuario_comum.USC_ID FROM usuario_comum 
							WHERE usc_senha = :pass);";
		
		$user = $dados->__get('user');
		$pass = $dados->__get('password');

		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':pront', $user);
		$this->resultado->bindParam(':pass', $pass);
		
		$this->resultado->execute();

		return $this->resultado->fetchAll();
	}

	public function logarPaciente($dados){
		$retorno = $this->verificarConta('PAC_EMAIL', $dados->__get('user'), 'pacientes');
		
		if( count($retorno) == 0 ){
			throw new Exception('Email ou Senha incorreto');
		}
		
		$this->sql = "SELECT pac.PAC_EMAIL FROM pacientes AS pac, usuario_comum
						WHERE pac.FK_USUARIO_COMUM_USC_ID = usuario_comum.USC_ID
						AND pac.PAC_EMAIL = :user
						AND usuario_comum.USC_SENHA = :pass;";
						
		$user = $dados->__get('user');
		$pass = $dados->__get('password');

		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':user', $user);
		$this->resultado->bindParam(':pass', $pass);
		
		$this->resultado->execute();

		return $this->resultado->fetchAll();
	}
	
	// USE CASE 08, 09 *
	public function verificarConta($campo, $user, $tabela){
		$this->sql = "SELECT $campo FROM $tabela WHERE $campo = :user;";
		
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':user', $user);
		//$this->resultado.bindParam(':user', $email);
		
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}
	
	// USE CASE 09 *
	public function alterarSenhaFuncionario($newPass, $user){
		$this->sql = "UPDATE $this->tabela SET USC_SENHA = :pass 
						WHERE USC_ID = (SELECT FK_USUARIO_COMUM_USC_ID FROM funcionarios 
							WHERE FUN_PRONTUARIO = :user);";
		
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':pass', $newPass);
		$this->resultado->bindParam(':user', $user);
		
		$this->resultado->execute();
		return $this->resultado->rowCount();
	}

	public function alterarSenhaPaciente($newPass, $user){
		$this->sql = "UPDATE $this->tabela SET USC_SENHA = :pass 
						WHERE USC_ID = (SELECT FK_USUARIO_COMUM_USC_ID FROM pacientes 
							WHERE PAC_EMAIL = :user);";
		
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':pass', $newPass);
		$this->resultado->bindParam(':user', $user);
		
		$this->resultado->execute();
		return $this->resultado->rowCount();
	}
}

?>