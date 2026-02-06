<?php

    require_once __DIR__ . '/../config/conexaoMod01.php';

    class UsuarioComumDAO{
        private $conexao;
        private $sql;
        private $tabela;
        private $resultado;


        public function __construct(){
            $conn = new ConexaoMod1();
            $this->conexao = $conn->getConexao();
            $this->tabela = "usuario_comum";
        }



        	
        public function cadastrarUsuario($dados){
            $this->sql = "INSERT INTO $this->tabela ( USC_ORGAO_EMISSOR, USC_RG, USC_CPF, USC_DATA_NASCIMENTO,
                                                     USC_SENHA, USC_SEXO, USC_NOME, USC_ESTADO, USC_CIDADE, 
                                                     USC_BAIRRO, USC_NUMERO, USC_LOGRADOURO )
                                                    VALUES ( :usc_orgao_emissor, :usc_rg, :usc_cpf,
                                                    :usc_data_nascimento, :usc_senha, :usc_sexo, :usc_nome, 
                                                    :usc_estado, :usc_cidade, :usc_bairro, :usc_numero, 
                                                    :usc_logradouro)";
													

			$orgaoEmissor = $dados->__get("usc_orgao_emissor");
			$rg = $dados->__get("usc_rg");
			$cpf = $dados->__get("usc_cpf");
			$dataNascimento = $dados->__get("usc_data_nascimento");
			$senha = $dados->__get("usc_senha");
			$sexo = $dados->__get("usc_sexo");
			$nome = $dados->__get("usc_nome");
			$estado = $dados->__get("usc_estado");
			$cidade = $dados->__get("usc_cidade");
			$bairro = $dados->__get("usc_bairro");
			$numero = $dados->__get("usc_numero");
			$logradouro = $dados->__get("usc_logradouro");
													
            $this->resultado = $this->conexao->prepare($this->sql);
            $this->resultado->bindParam( ':usc_orgao_emissor', $orgaoEmissor );
            $this->resultado->bindParam( ':usc_rg', $rg);
            $this->resultado->bindParam( ':usc_cpf', $cpf);
            $this->resultado->bindParam( ':usc_data_nascimento', $dataNascimento);
            $this->resultado->bindParam( ':usc_senha', $senha );
            $this->resultado->bindParam( ':usc_sexo', $sexo );
            $this->resultado->bindParam( ':usc_nome', $nome );
            $this->resultado->bindParam( ':usc_estado', $estado);
            $this->resultado->bindParam( ':usc_cidade', $cidade);
            $this->resultado->bindParam( ':usc_bairro', $bairro);
            $this->resultado->bindParam( ':usc_numero', $numero );
            $this->resultado->bindParam( ':usc_logradouro', $logradouro );

            $this->resultado->execute();
			return $this->conexao->lastInsertId();

        }


        public function editarUsuario($dados){
            $this->sql = "UPDATE $this->tabela SET USC_ORGAO_EMISSOR = :usc_orgao_emissor, USC_RG = :usc_rg, USC_CPF = :usc_cpf, 
										USC_DATA_NASCIMENTO = :usc_data_nascimento, USC_SENHA = :usc_senha,
										USC_SEXO = :usc_sexo, USC_NOME = :usc_nome, USC_ESTADO = :usc_estado,
										USC_CIDADE = :usc_cidade, USC_BAIRRO = :usc_bairro, 
										USC_NUMERO = :usc_numero, USC_LOGRADOURO = :usc_logradouro
                                        WHERE $this->tabela.USC_ID = :fk_usuario_comum";


			$usc_id = $dados->__get("usuario_id");
            echo "ID DO USUARIO = ".$usc_id."<br>";
			$orgaoEmissor = $dados->__get("usc_orgao_emissor");
			$rg = $dados->__get("usc_rg");
			$cpf = $dados->__get("usc_cpf");
			$dataNascimento = $dados->__get("usc_data_nascimento");
			$senha = $dados->__get("usc_senha");
			$sexo = $dados->__get("usc_sexo");
			$nome = $dados->__get("usc_nome");
			$estado = $dados->__get("usc_estado");
			$cidade = $dados->__get("usc_cidade");
			$bairro = $dados->__get("usc_bairro");
			$numero = $dados->__get("usc_numero");
			$logradouro = $dados->__get("usc_logradouro");

            $this->resultado = $this->conexao->prepare( $this->sql );
            $this->resultado->bindParam( ':fk_usuario_comum', $usc_id );
            $this->resultado->bindParam( ':usc_orgao_emissor', $orgaoEmissor );
            $this->resultado->bindParam( ':usc_rg', $rg);
            $this->resultado->bindParam( ':usc_cpf', $cpf);
            $this->resultado->bindParam( ':usc_data_nascimento', $dataNascimento);
            $this->resultado->bindParam( ':usc_senha', $senha );
            $this->resultado->bindParam( ':usc_sexo', $sexo );
            $this->resultado->bindParam( ':usc_nome', $nome );
            $this->resultado->bindParam( ':usc_estado', $estado);
            $this->resultado->bindParam( ':usc_cidade', $cidade);
            $this->resultado->bindParam( ':usc_bairro', $bairro);
            $this->resultado->bindParam( ':usc_numero', $numero );
            $this->resultado->bindParam( ':usc_logradouro', $logradouro );
    
            $this->resultado->execute();


        }

        public function obterPorId($dados){
            $this->sql = "SELECT * FROM $this->tabela WHERE USC_ID = :usc_id";

            $this->resultado = $this->conexao->prepare( $this->sql );
            $this->resultado->bindValue( ':usc_id', $dados->__get( 'usc_id' ) );
            $this->resultado->execute();
    
            return $this->resultado->fetch();            
        }




    }


?>