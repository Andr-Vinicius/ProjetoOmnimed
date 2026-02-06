<?php

    require_once __DIR__ . '/../config/conexaoMod01.php';

    class AdministrativoDAO{
        private $conexao;
        private $sql;
        private $tabela;
        private $resultado;


        public function __construct(){
            $conn = new ConexaoMod1();
            $this->conexao = $conn->getConexao();
            $this->tabela = "administrativo";
        }



        	
        public function cadastrarAdministrativo($dados){
            $this->sql = "INSERT INTO $this->tabela ( ADM_FUNCAO, ADM_DATA_ADMISSAO, ADM_DATA_DEMISSAO, 
                                                    ADM_CLINICA, ADM_SALARIO, ADM_CRM, ADM_TELEFONE_CELULAR, 
                                                    FK_FUNCIONARIOS_FUN_ID )
                                                    VALUES ( :adm_funcao, :adm_data_admissao, 
                                                    :adm_data_demissao, :adm_clinica, :adm_salario, 
                                                    :adm_crm, :adm_telefone_celular, :fk_funcionarios_fun_id )";
            
            
			$funcao = $dados->__get("adm_funcao");
			$dataAdmissao = $dados->__get("adm_data_admissao");
			$dataDemissao = $dados->__get("adm_data_demissao");
			$clinica = $dados->__get("adm_clinica");
			$salario = $dados->__get("adm_salario");
			$crm = $dados->__get("adm_crm");
			$telefoneCelular = $dados->__get("adm_telefone_celular");
			$fk_fun_id = $dados->__get("adm_fk_funcionario_id");

	
            $this->resultado = $this->conexao->prepare($this->sql);
            $this->resultado->bindParam( ':adm_funcao', $funcao );
            $this->resultado->bindParam( ':adm_data_admissao', $dataAdmissao );
            $this->resultado->bindParam( ':adm_data_demissao', $dataDemissao );
            $this->resultado->bindParam( ':adm_clinica', $clinica );
            $this->resultado->bindParam( ':adm_salario', $salario );
            $this->resultado->bindParam( ':adm_crm', $crm );
            $this->resultado->bindParam( ':adm_telefone_celular', $telefoneCelular );
            $this->resultado->bindParam( ':fk_funcionarios_fun_id', $fk_fun_id );
			

            $this->resultado->execute();
			
        }

        public function editarAdministrativo($dados){
            $this->sql = "UPDATE $this->tabela SET ADM_FUNCAO = :adm_funcao, ADM_DATA_ADMISSAO = :adm_data_admissao,
											ADM_DATA_DEMISSAO = :adm_data_demissao, ADM_CLINICA  = :adm_clinica, 
											ADM_SALARIO = :adm_salario, ADM_CRM = :adm_crm, 
											ADM_TELEFONE_CELULAR = :adm_telefone_celular
                                            WHERE $this->tabela.FK_FUNCIONARIOS_FUN_ID = :adm_id";

            $adm_id = $dados->__get('adm_fk_funcionario_id');
            $funcao = $dados->__get("adm_funcao");
            $dataAdmissao = $dados->__get("adm_data_admissao");
            $dataDemissao = $dados->__get("adm_data_demissao");
            $clinica = $dados->__get("adm_clinica");
            $salario = $dados->__get("adm_salario");
            $crm = $dados->__get("adm_crm");
            $telefoneCelular = $dados->__get("adm_telefone_celular");

            $this->resultado = $this->conexao->prepare( $this->sql );
            $this->resultado->bindParam( ':adm_id', $adm_id );
            $this->resultado->bindParam( ':adm_funcao', $funcao );
            $this->resultado->bindParam( ':adm_data_admissao', $dataAdmissao );
            $this->resultado->bindParam( ':adm_data_demissao', $dataDemissao );
            $this->resultado->bindParam( ':adm_clinica', $clinica );
            $this->resultado->bindParam( ':adm_salario', $salario );
            $this->resultado->bindParam( ':adm_crm', $crm );
            $this->resultado->bindParam( ':adm_telefone_celular', $telefoneCelular );
    
            $this->resultado->execute();
        }


    }


?>