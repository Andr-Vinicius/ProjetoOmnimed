<?php

require_once __DIR__.'/../config/Conexao.php';

class RemedioPrescricaoDAO{
    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct(){
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "remedios_prescricoes";
    }

    public function cadastrar($dados){
        $this->sql = "insert into $this->tabela 
        (prm_esquema_posologico, fk_remedios_rmd_id, fk_prescricoes_prc_id) values 
        (:esquema, :remedioId, :prescricaoId);";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':esquema',$dados->prm_esquema_posologico);
        $this->resultado->bindParam(':remedioId', $dados->fk_remedios_rmd_id);
        $this->resultado->bindParam(':prescricaoId', $dados->fk_prescricoes_prc_id);

        $this->resultado->execute();

    }

    public function listarRemedioPrescricao($idPrescricao){
        $this->sql = "Select * from $this->tabela where fk_prescricoes_prc_id = $idPrescricao;";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

}

?>