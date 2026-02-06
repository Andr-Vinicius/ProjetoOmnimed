<?php

require_once __DIR__ . '/../config/Conexao.php';

class BeneficiosDAO {

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct() {

        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "beneficios";
    }

    public function cadastrar( $dados ) {

        $this->sql = "INSERT INTO $this->tabela ( BNF_DESCRICAO ) VALUES ( :descricao )";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam( ':descricao', $dados->descricao );

        $this->resultado->execute();
    }

    public function listarDados() {

        $this->sql = "SELECT * FROM $this->tabela";

        $this->resultado = $this->conexao->prepare( $this->sql );

        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function excluir( $dados ) {

        $this->sql = "DELETE FROM $this->tabela WHERE BNF_ID=:id";

        $id = $dados->id;

        $this->resultado = $this->conexao->prepare( $this->sql );
        $this->resultado->bindParam(':id', $dados->id );

        $this->resultado->execute();
    }

    public function editar( $dados ) {
        $this->sql = "UPDATE $this->tabela SET BNF_DESCRICAO = :descricao WHERE BNF_ID = :id";

        $id = $dados->id;
        $descricao = $dados->descricao;

        $this->resultado = $this->conexao->prepare( $this->sql );
        $this->resultado->bindParam(':id', $dados->id );
        $this->resultado->bindParam(':descricao', $dados->descricao );

        $this->resultado->execute();
    }

    public function obterPorId( $dados ) {
        $this->sql = "SELECT * FROM $this->tabela WHERE BNF_ID = :id";

        $id = $dados->id;

        $this->resultado = $this->conexao->prepare( $this->sql );
        $this->resultado->bindValue( ':id', $dados->id );
        $this->resultado->execute();

        return $this->resultado->fetch();
    }
    
}
