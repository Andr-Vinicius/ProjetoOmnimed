<?php

  require_once __DIR__.'/../config/conexao.php';

  class PacienteDAO{

  private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

  public function __construct(){
    $conn = new Conexao();
    $this->conexao = $conn->getConexao();
    $this->tabela = "pacientes";
  }

  public function obterPorId($idPaciente){
    $this->sql = "Select * from $this->tabela where pac_id = $idPaciente;";

    $this->resultado = $this->conexao->prepare($this->sql);
    $this->resultado->execute();

    return $this->resultado->fetch();
  }
}