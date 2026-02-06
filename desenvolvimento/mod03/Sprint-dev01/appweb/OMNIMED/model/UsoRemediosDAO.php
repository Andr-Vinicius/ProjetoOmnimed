<?php

require_once __DIR__ . '/../config/Conexao.php';

class UsoRemediosDAO
{

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct()
    {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "uso_remedio";
    }

    public function cadastrar($dados)
    {

        $this->sql = "INSERT INTO $this->tabela (FK_FINALIDADE_REMEDIOS_FIN_ID, FK_REMEDIOS_RMD_ID) VALUES (:finalidade,:remedio)";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':finalidade', $dados->finalidade->id );
        $this->resultado->bindParam(':remedio', $dados->remedio->id );
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

        $this->sql = "SELECT * FROM $this->tabela WHERE FK_REMEDIOS_RMD_ID = :id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindValue(':id', $dados->id);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
        
    }

    // Excluir normal, através do botão na página de edição
    public function excluir($dados)
    {

        $this->sql = "DELETE FROM $this->tabela WHERE URM_ID=:id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $dados->id);

        $this->resultado->execute();

    }

    // Excluir quando um plano for excluído
    public function excluirPorRelacao($dados)
    {

        $this->sql = "DELETE FROM $this->tabela WHERE FK_REMEDIOS_RMD_ID=:id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $dados->id);

        $this->resultado->execute();

    }

    public function editar($dados)
    {
        $this->sql = "UPDATE $this->tabela SET FK_FINALIDADE_REMEDIOS_FIN_ID = :finalidade WHERE URM_ID = :id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $dados->id);
        $this->resultado->bindParam(':finalidade', $dados->finalidade->id);
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