<?php

    require_once __DIR__ . '/../config/conexaoMod01.php';

    class PacienteDAO{
        private $conexao;
        private $sql;
        private $tabela;
        private $resultado;


        public function __construct(){
            $conn = new ConexaoMod1();
            $this->conexao = $conn->getConexao();
            $this->tabela = "pacientes";
        }


        	
        public function cadastrarPaciente($dados){
            $this->sql = "INSERT INTO $this->tabela ( PAC_EMAIL,  FK_USUARIO_COMUM_USC_ID)
                                                    VALUES ( :pac_email, :fk_usuario_comum )";
            
            
			$email = $dados->__get("pac_email");
			$fk_usuarioComum = $dados->__get("fk_usuario_comum");
			
            $this->resultado = $this->conexao->prepare($this->sql);
            $this->resultado->bindParam( ':pac_email', $email );
			$this->resultado->bindParam( ':fk_usuario_comum', $fk_usuarioComum );
            
            $this->resultado->execute();
			return $this->conexao->lastInsertId();

        }





    }


?>