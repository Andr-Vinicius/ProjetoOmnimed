<?php

    require_once __DIR__ . '/../config/conexaoMod01.php';

    class DependentesDAO{
        private $conexao;
        private $sql;
        private $tabela;
        private $resultado;


        public function __construct(){
            $conn = new ConexaoMod1();
            $this->conexao = $conn->getConexao();
            $this->tabela = "dependentes";
        }

        public function listarDependentes(){
            $this->sql = "SELECT usc.USC_NOME, usc.USC_DATA_NASCIMENTO, usc.USC_CPF, dep.DEP_NV_PARENTESCO FROM $this->tabela AS dep, usuario_comum AS usc;";

            $this->resultado = $this->conexao->prepare($this->sql);
            $this->resultado->execute();
    
            return $this->resultado->fetchAll();          
        }

    }

?>