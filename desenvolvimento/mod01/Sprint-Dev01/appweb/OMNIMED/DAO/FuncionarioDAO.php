<?php

    require_once __DIR__ . '/../config/conexaoMod01.php';

    class FuncionarioDAO{
        private $conexao;
        private $sql;
        private $tabela;
        private $resultado;


        public function __construct(){
            $conn = new ConexaoMod1();
            $this->conexao = $conn->getConexao();
            $this->tabela = "funcionarios";
        }

        // Caso de Uso 
        public function listarFuncionarios(){
            $this->sql = "SELECT * FROM $this->tabela, usuario_comum, administrativo 
            WHERE($this->tabela.FK_USUARIO_COMUM_USC_ID = usuario_comum.USC_ID) 
            AND ($this->tabela.FUN_ID = administrativo.FK_FUNCIONARIOS_FUN_ID)";

            $this->resultado = $this->conexao->prepare($this->sql);
            $this->resultado->execute();
    
            return $this->resultado->fetchAll();            
        }

        public function listarFuncionario($dados){
            $this->sql = "SELECT * FROM $this->tabela, usuario_comum, administrativo 
            WHERE($this->tabela.FK_USUARIO_COMUM_USC_ID = usuario_comum.USC_ID) 
            AND ($this->tabela.FUN_ID = administrativo.FK_FUNCIONARIOS_FUN_ID)
            AND ($this->tabela.FUN_ID = :fun_id)";

            $id = $dados->__get('fun_id');

            $this->resultado = $this->conexao->prepare($this->sql);
            $this->resultado->bindParam( ':fun_id', $id );
            $this->resultado->execute();
    
            return $this->resultado->fetchAll();            
        }

        // Caso de Uso 
        	
        public function cadastrarFuncionario($dados){
            $this->sql = "INSERT INTO $this->tabela ( FUN_PRONTUARIO,  FK_USUARIO_COMUM_USC_ID)
                                                    VALUES ( :fun_prontuario, :fk_usuario_comum )";
            
            
			$prontuario = $dados->__get("fun_prontuario");
			$fk_usuarioComum = $dados->__get("fk_usuario_comum");
			
            $this->resultado = $this->conexao->prepare($this->sql);
            $this->resultado->bindParam( ':fun_prontuario', $prontuario );
			$this->resultado->bindParam( ':fk_usuario_comum', $fk_usuarioComum );
            
            $this->resultado->execute();
			return $this->conexao->lastInsertId();

        }

        // Caso de Uso 
        public function editarFuncionario($dados){
            $this->sql = "UPDATE $this->tabela SET FUN_PRONTUARIO = :fun_prontuario WHERE FUN_ID = :fun_id";

            $id = $dados->__get( 'fun_id' );
            $prontuario = $dados->__get( 'fun_prontuario' );


            $this->resultado = $this->conexao->prepare( $this->sql );
			$this->resultado->bindParam(':fun_id', $id );
            $this->resultado->bindParam(':fun_prontuario', $prontuario );


    
            $this->resultado->execute();
        }

        // Caso de Uso 
        public function excluirFuncionario($dados){
           /* $this->sql = "DELETE $this->tabela, administrativo, usuario_comum
                        FROM usuario_comum INNER JOIN funcionarios INNER JOIN administrativo 
                        WHERE FUN_ID = :fun_id
                        AND USC_ID =: FK_USUARIO_COMUM_USC_ID    
                        AND FUN_ID =: FK_FUNCIONARIOS_FUN_ID;";*/
            $this->sql = "DELETE FROM $this->tabela, usuario_comum
                        USING $this->tabela
                        INNER JOIN usuario_comum 
                        WHERE ($this->tabela.FUN_ID = :fun_id) 
                        AND (usuario_comum.USC_ID = :fk_usuario_id)";

            $fun_id = $dados->__get('fun_id');
            $fun_usuario_id = $dados->__get('fk_usuario_comum');


            $this->resultado = $this->conexao->prepare( $this->sql );
            $this->resultado->bindParam(':fun_id', $fun_id );
            $this->resultado->bindParam(':fk_usuario_id', $fun_usuario_id);

    
            $this->resultado->execute();
        }


        public function obterPorId($dados){
            $this->sql = "SELECT * FROM $this->tabela WHERE FUN_ID = :fun_id";

            $this->resultado = $this->conexao->prepare( $this->sql );
            $this->resultado->bindValue( ':fun_id', $dados->__get( 'fun_id' ) );
            $this->resultado->execute();
    
            return $this->resultado->fetch();            
        }

        public function obterFKPorId($dados){
            $this->sql = "SELECT $this->tabela.fk_usuario_comum_usc_id FROM $this->tabela WHERE FUN_ID = :fun_id";

            $this->resultado = $this->conexao->prepare( $this->sql );
            $this->resultado->bindValue( ':fun_id', $dados->__get( 'fun_id' ) );
            $this->resultado->execute();
    
            return $this->resultado->fetch();    
  
        }

        public function verificarProntuario($prontuario){
            $select = $this->conexao->prepare("SELECT * FROM funcionarios WHERE fun_prontuario='$prontuario'");
            $select->setFetchMode(PDO::FETCH_ASSOC);
            $select->execute();
            $igual = $select->fetch();
            return $igual;
        }

    }


?>