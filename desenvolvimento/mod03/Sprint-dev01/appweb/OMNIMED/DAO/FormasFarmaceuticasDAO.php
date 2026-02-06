<?php

require_once __DIR__ . '/../config/Conexao.php';

class FormasFarmaceuticasDAO {

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct() {

        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "formas_farmaceuticas";
    }

    public function cadastrar( $dados ) {
        // Não será implementado, é fixo
    }

    public function listarDados() {

        $this->sql = "SELECT * FROM $this->tabela";

        $this->resultado = $this->conexao->prepare( $this->sql );

        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function excluir( $dados ) {
        // Não será implementado, é fixo
    }

    public function editar( $dados ) {
        // Não será implementado, é fixo
    }

    public function obterPorId( $dados ) {
        $this->sql = "SELECT * FROM $this->tabela WHERE FRM_ID = :id";

        $id = $dados->id;

        $this->resultado = $this->conexao->prepare( $this->sql );
        $this->resultado->bindValue( ':id', $dados->id );
        $this->resultado->execute();

        return $this->resultado->fetch();
    }
    
}
