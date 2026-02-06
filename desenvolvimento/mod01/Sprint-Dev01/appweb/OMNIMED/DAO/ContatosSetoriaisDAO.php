<?php 

require_once __DIR__ . '/../config/conexaoMod01.php';

class ContatosSetoriaisDAO{
    private $conexao;
    private $sql;
    private $tabela;
    private $resultado;

    public function __construct()
    {
        $conn = new ConexaoMod1();
        $this->conexao = $conn->getConexao();
        $this->tabela = 'contatos_setoriais';
    }

    public function listarContatos(){
        $this->sql = "SELECT cse_setor, cse_email, cse_telefone_fixo, cse_telefone_celular 
                        FROM $this->tabela;";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }
}

?>