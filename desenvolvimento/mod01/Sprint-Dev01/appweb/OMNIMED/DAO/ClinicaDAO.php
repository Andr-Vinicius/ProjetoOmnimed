<?php


require_once __DIR__ . '/../config/conexaoMod01.php';

class ClinicaoDAO{
    private $conexao;
    private $sql;
    private $tabela;
    private $resultado;


    public function __construct(){
        $conn = new ConexaoMod1();
        $this->conexao = $conn->getConexao();
        $this->tabela = "clinicas_medicas";
    }



    

    public function editarClinica($dados){
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


    public function obterFKPorId($dados){
        $this->sql = "SELECT $this->tabela.fk_administrativo_adm_id FROM $this->tabela WHERE CLI_ID = :cli_id";
    
        $this->resultado = $this->conexao->prepare( $this->sql );
        $this->resultado->bindValue( ':cli_id', $dados->__get( 'cli_id' ) );
        $this->resultado->execute();
    
        return $this->resultado->fetch();    
    
    }

}



?>