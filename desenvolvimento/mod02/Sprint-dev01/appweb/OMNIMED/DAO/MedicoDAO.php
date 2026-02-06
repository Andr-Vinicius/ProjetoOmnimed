<?php

  require_once __DIR__.'/../config/conexao.php';

  class MedicoDAO{

  private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

  public function __construct(){
    $conn = new Conexao();
    $this->conexao = $conn->getConexao();
    $this->tabela = "medicos";
  }

  public function obterPorId($idMedico){
    $this->sql = "Select * from $this->tabela where med_id = $idMedico;";

    $this->resultado = $this->conexao->prepare($this->sql);
    $this->resultado->execute();

    return $this->resultado->fetch();
  }
}