<?php

require_once __DIR__.'/../config/Conexao.php';

class PrescricaoDAO{
    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct(){
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "prescricoes";
    }

    public function cadastrar($dados){
        $this->sql = "insert into $this->tabela 
        (prc_data_emissao, prc_observacoes, prc_duracao_tratamento, prc_assinatura_medico, fk_consultas_online_cns_id, fk_medicos_med_id, fk_pacientes_pac_id) values 
        (:dataEmissao, :observacoes, :duracaoTratamento, :assinaturaMedico, :idConsulta, :idMedico, :idPaciente);";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':dataEmissao',$dados->prc_data_emissao);
        $this->resultado->bindParam(':observacoes', $dados->prc_observacoes);
        $this->resultado->bindParam(':duracaoTratamento', $dados->prc_duracao_tratamento);
        $this->resultado->bindParam(':assinaturaMedico', $dados->prc_assinatura_medico);
        $this->resultado->bindParam(':idConsulta', $dados->prc_consultas_online_cns_id);
        $this->resultado->bindParam(':idMedico', $dados->prc_medicos_med_id);
        $this->resultado->bindParam(':idPaciente', $dados->prc_pacientes_pac_id);

        $this->resultado->execute();

    }

    public function obterPorId($idPrescricao){
        $this->sql = "Select * from $this->tabela where prc_id = $idPrescricao;";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetch();
    }

    public function listarPrescricaoDaConsulta($idConsulta){
        $this->sql = "Select * from $this->tabela where $idConsulta = fk_consultas_online_cns_id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetch();
    }

}

?>