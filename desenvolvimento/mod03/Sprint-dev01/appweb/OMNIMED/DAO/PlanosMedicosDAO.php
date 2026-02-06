<?php

require_once __DIR__ . '/../config/Conexao.php';

class PlanosMedicosDAO
{

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct()
    {

        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "planos";
    }

    public function cadastrar($dados)
    {

        $this->sql = "INSERT INTO $this->tabela (PLN_INSTITUICAO,PLN_NOME,PLN_PRECO) VALUES (:instituicao,:nome,:preco)";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':instituicao', $dados->instituicao );
        $this->resultado->bindParam(':nome', $dados->nome);
        $this->resultado->bindParam(':preco', $dados->preco);
        $this->resultado->execute();

        return $this->conexao->lastInsertId();
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

        $this->sql = "DELETE FROM $this->tabela WHERE PLN_ID=:id";

        $id = $dados->id;

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $dados->id);

        $this->resultado->execute();
    }

    public function editar($dados)
    {
        $this->sql = "UPDATE $this->tabela SET PLN_INSTITUICAO = :instituicao, PLN_NOME = :nome, PLN_PRECO = :preco WHERE PLN_ID = :id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $dados->id);
        $this->resultado->bindParam(':instituicao', $dados->instituicao);
        $this->resultado->bindParam(':nome', $dados->nome);
        $this->resultado->bindParam(':preco', $dados->preco);
        $this->resultado->execute();
    }

    public function obterPorId($dados)
    {
        $this->sql = "SELECT * FROM $this->tabela WHERE PLN_ID = :id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindValue(':id', $dados->id);
        $this->resultado->execute();

        return $this->resultado->fetch();
    }
}