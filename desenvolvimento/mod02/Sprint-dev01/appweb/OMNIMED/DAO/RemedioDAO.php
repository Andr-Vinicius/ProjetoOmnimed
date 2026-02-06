<?php

require_once __DIR__.'/../config/Conexao.php';

class RemedioDAO{
    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct(){
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "remedios";
    }

    public function cadastrar($dados){
        $this->sql = "insert into $this->tabela 
        (rmd_nome, rmd_tipo, rmd_dosagem, rmd_via_dosagem, rmd_indicacao, rmd_contra_indicacao) values 
        (:nome, :tipo, :dosagem, :via_dosagem, :indicacao, :contra_indicacao);";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':nome',$dados->rmd_nome);
        $this->resultado->bindParam(':tipo', $dados->rmd_tipo);
        $this->resultado->bindParam(':dosagem', $dados->rmd_dosagem);
        $this->resultado->bindParam(':via_dosagem', $dados->rmd_via_dosagem);
        $this->resultado->bindParam(':indicacao', $dados->rmd_indicacao);
        $this->resultado->bindParam(':contra_indicacao', $dados->rmd_contra_indicacao);

        $this->resultado->execute();

    }

    public function listarRemedios(){
        $this->sql = "Select * from $this->tabela;";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function obterPorId($idRemedio){
        $this->sql = "Select * from $this->tabela where rmd_id = $idRemedio;";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetch();
    }

}

?>