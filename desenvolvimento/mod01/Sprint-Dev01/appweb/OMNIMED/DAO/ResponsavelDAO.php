<?php

    require_once __DIR__ . '/../config/conexaoMod01.php';

    class ResponsavelDAO{
        private $conexao;
        private $sql;
        private $tabela;
        private $resultado;


        public function __construct(){
            $conn = new ConexaoMod1();
            $this->conexao = $conn->getConexao();
            $this->tabela = "responsaveis";
        }


        	
        public function cadastrarResponsavel($dados){
            $this->sql = "INSERT INTO $this->tabela ( RES_TEM_ALERGIA_MEDICA, RES_QUAIS_ALERGIAS, RES_TEM_FILHOS, RES_QTD_FILHOS, 
                                                    RES_UTILIZA_MEDICACAO, RES_QUAL_MEDICACAO, RES_TRAT_MED, RES_QUAIS_TRAT_MED
                                                    RES_TEL_CELULAR1, RES_TEL_CELULAR2, RES_TEM_DOENCAS, RES_QUAIS_DOENCAS, FK_PACIENTES_PAC_ID)
                                                    VALUES ( :res_tem_alergia, :res_quais_alergias, :res_tem_filhos, :res_qtd_filhos, :res_usa_medicacao, :res_quais_medicacoes, 
                                                    :res_trad_med, :res_quais_trat, :res_celular1, :res_celular2, :res_tem_doencas, :res_quais_doencas, :fk_paciente_id )";
            
            
			$alergia = $dados->__get("res_tem_alergia");
			$quaisAlergias = $dados->__get("res_quais_alergias");
			$filhos = $dados->__get("res_tem_filhos");
			$qtdFilhos = $dados->__get("res_qt_filhos");
			$medicacao = $dados->__get("res_usa_medicacao");
			$quaisMedicoes = $dados->__get("res_qual_medicacao");
			$tratMed = $dados->__get("res_realiza_trat_med");
			$quaisTratMed = $dados->__get("res_quais_trat_med");
			$celular1 = $dados->__get("res_celular1");
			$celular2 = $dados->__get("res_celular2");
			$doencasCronicas = $dados->__get("res_tem_doencas_cronicas");
			$quaisDoencasCronicas = $dados->__get("res_quais_doencas");
			$fk_paciente = $dados->__get("res_fk_paciente");
			
            $this->resultado = $this->conexao->prepare($this->sql);
            $this->resultado->bindParam( ':res_tem_alergia', $alergia );
            $this->resultado->bindParam( ':res_quais_alergias', $quaisAlergias );
            $this->resultado->bindParam( ':res_tem_filhos', $filhos );
            $this->resultado->bindParam( ':res_qtd_filhos', $qtdFilhos );
            $this->resultado->bindParam( ':res_usa_medicacao', $medicacao );
            $this->resultado->bindParam( ':res_quais_medicacoes', $quaisMedicoes );
            $this->resultado->bindParam( ':res_trad_med', $tratMed );
            $this->resultado->bindParam( ':res_quais_trat', $quaisTratMed );
            $this->resultado->bindParam( ':res_celular1', $celular1 );
            $this->resultado->bindParam( ':res_celular2', $celular2 );
            $this->resultado->bindParam( ':res_tem_doencas', $doencasCronicas );
            $this->resultado->bindParam( ':res_quais_doencas', $quaisDoencasCronicas );
			$this->resultado->bindParam( ':fk_paciente_id', $fk_paciente );
            
            $this->resultado->execute();
			return $this->conexao->lastInsertId();

        }

        public function obterFKPorId($dados){
            $this->sql = "SELECT $this->tabela.fk_paciente_id FROM $this->tabela WHERE RES_ID = :res_id";
        
            $this->resultado = $this->conexao->prepare( $this->sql );
            $this->resultado->bindValue( ':res_id', $dados->__get( 'res_id' ) );
            $this->resultado->execute();
        
            return $this->resultado->fetch();    
        
        }



    }


?>