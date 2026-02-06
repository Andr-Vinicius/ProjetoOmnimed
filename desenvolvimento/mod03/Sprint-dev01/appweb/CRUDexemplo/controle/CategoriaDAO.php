<?php

require_once "Conexao.php";

class CategoriaDAO
{

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct()
    {

        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "categoria";
    }

    public function cadastrar($dados)
    {

        $this->sql = "INSERT INTO $this->tabela ( ctg_nome, ctg_descricao ) VALUES ( :nome, :descricao )";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':nome', $dados->getNome());
        $this->resultado->bindParam(':descricao', $dados->getDescricao());

        $this->resultado->execute();
    }

    public function listarDados()
    {

        $this->sql = "SELECT * FROM $this->tabela";

        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function excluir($dados)
    {

        $this->sql = "DELETE FROM $this->tabela WHERE ctg_id=:id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $dados->getId());

        $this->resultado->execute();
    }

    public function editar($dados)
    {
        $this->sql = "update $this->tabela set ctg_nome = :nome, ctg_descricao = :descricao where ctg_id = :id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $dados->getId());
        $this->resultado->bindParam(':nome', $dados->getNome());
        $this->resultado->bindParam(':descricao', $dados->getDescricao());

        $this->resultado->execute();
    }

    public function obterPorId($dados)
    {
        $this->sql = "select * from $this->tabela where ctg_id = :id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $dados->getId());
        $this->resultado->execute();

        return $this->resultado->fetch();
    }
}
