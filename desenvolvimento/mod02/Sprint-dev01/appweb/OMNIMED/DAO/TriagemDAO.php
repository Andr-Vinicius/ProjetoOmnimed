<?php

require_once __DIR__.'/../config/Conexao.php';

class TriagemDAO{

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct(){
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "triagens";
    }

    public function cadastrar($dados){
        $this->sql = "insert into $this->tabela (trg_sintomas, trg_tabela_dor, trg_pressao_sistolica, 
        trg_pressao_diastolica, trg_temperatura, fk_agendamentos_agd_id) values 
        (:sintomas, :tabelaDor, :pressaoSistolica, :pressaoDiastolica, :temperatura, :agendamentosAgdId)";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':sintomas',$dados->getTrgSintomas());
        $this->resultado->bindParam(':tabelaDor', $dados->getTrgTabelaDor());
        $this->resultado->bindParam(':pressaoSistolica', $dados->getTrgPressaoSistolica());
        $this->resultado->bindParam(':pressaoDiastolica', $dados->getTrgPressaoDiastolica());
        $this->resultado->bindParam(':temperatura', $dados->getTrgTemperatura());
        $this->resultado->bindParam(':agendamentosAgdId', $dados->getTrgAgendamentosAgdId());

        $this->resultado->execute();

    }

    public function listarTriagens(){
        $this->sql = "Select * from $this->tabela";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

}