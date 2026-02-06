<?php

require_once __DIR__ . '/../config/Conexao.php';

class ValoresDependentesDAO
{

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct()
    {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "valores_dependentes";
    }

    public function cadastrar($dados)
    {

        $this->sql = "INSERT INTO $this->tabela (VPD_VALOR, VPD_IDADE_MINIMA, VPD_IDADE_MAXIMA, FK_PLANOS_PLN_ID) VALUES (:valor,:idade_min,:idade_max,:plano)";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':valor', $dados->valor );
        $this->resultado->bindParam(':idade_min', $dados->idade_minima );
        $this->resultado->bindParam(':idade_max', $dados->idade_maxima );
        $this->resultado->bindParam(':plano', $dados->plano->id );
        $this->resultado->execute();
    }

    public function listarDados()
    {

        // $this->sql = "SELECT * FROM $this->tabela";

        // $this->resultado = $this->conexao->prepare($this->sql);

        // $this->resultado->execute();

        // return $this->resultado->fetchAll();
    }

    // Retorna todos, o Id vem da classe com a qual está relacionada
    public function listarDadosPorId( $dados )
    {

        $this->sql = "SELECT * FROM $this->tabela WHERE FK_PLANOS_PLN_ID = :id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindValue(':id', $dados->id);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
        
    }

    // Excluir normal, através do botão na página de edição
    public function excluir($dados)
    {

        $this->sql = "DELETE FROM $this->tabela WHERE VPD_ID=:id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $dados->id);

        $this->resultado->execute();

    }

    // Excluir quando um plano for excluído
    public function excluirPorRelacao($dados)
    {

        $this->sql = "DELETE FROM $this->tabela WHERE FK_PLANOS_PLN_ID=:id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $dados->id);

        $this->resultado->execute();

    }

    public function editar($dados)
    {
        $this->sql = "UPDATE $this->tabela SET VPD_IDADE_MAXIMA = :idade_max, VPD_IDADE_MINIMA = :idade_min, VPD_VALOR = :valor WHERE VPD_ID = :id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $dados->id);
        $this->resultado->bindParam(':valor', $dados->valor);
        $this->resultado->bindParam(':idade_max', $dados->idade_maxima);
        $this->resultado->bindParam(':idade_min', $dados->idade_minima);
        $this->resultado->execute();
    }

    public function obterPorId($dados)
    {
        // $this->sql = "SELECT * FROM $this->tabela WHERE PLN_ID = :id";

        // $this->resultado = $this->conexao->prepare($this->sql);
        // $this->resultado->bindValue(':id', $dados->id);
        // $this->resultado->execute();

        // return $this->resultado->fetch();
    }
}