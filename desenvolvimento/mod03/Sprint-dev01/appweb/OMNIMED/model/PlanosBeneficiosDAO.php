<?php

require_once __DIR__ . '/../config/Conexao.php';

class PlanosBeneficiosDAO
{

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct()
    {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "planos_beneficios";
    }

    public function cadastrar($dados)
    {

        $this->sql = "INSERT INTO $this->tabela (FK_BENEFICIOS_BNF_ID, FK_PLANOS_PLN_ID, PBN_VALOR_BENEFICIO) VALUES (:beneficio,:plano,:valor_beneficio)";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':beneficio', $dados->beneficio->id );
        $this->resultado->bindParam(':plano', $dados->plano->id );
        $this->resultado->bindParam(':valor_beneficio', $dados->valor );
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

        $this->sql = "DELETE FROM $this->tabela WHERE PBN_ID=:id";

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
        $this->sql = "UPDATE $this->tabela SET FK_BENEFICIOS_BNF_ID = :beneficio, PBN_VALOR_BENEFICIO = :valor_beneficio WHERE PBN_ID = :id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $dados->id);
        $this->resultado->bindParam(':beneficio', $dados->beneficio->id);
        $this->resultado->bindParam(':valor_beneficio', $dados->valor );
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

    public function contarListagem($dados) {

        $this->sql = "SELECT COUNT(*) AS total_registros FROM $this->tabela WHERE FK_PLANOS_PLN_ID = :id";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindValue(':id', $dados->plano);
        $this->resultado->execute();

        return $this->resultado->fetch();
    }
}