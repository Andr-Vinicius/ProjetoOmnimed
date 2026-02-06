<<<<<<< .mine
||||||| .r415
<?php

require_once __DIR__ . "/../config/Conexao.php";

class RemediosDAO {

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct() {
        
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "remedios";
    }

    public function cadastrar($dados) {
        
        $this->sql = "INSERT INTO $this->tabela (RMD_NOME, RMD_VIA_DOSAGEM, RMD_TIPO, RMD_INDICACAO, RMD_CONTRAINDICACAO, RMD_DOSAGEM) VALUES (:nome, :via_dosagem, :tipo, :indicacao, :contraindicacao, :dosagem)";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':nome',$dados->nome);
        $this->resultado->bindParam(':via_dosagem',$dados->via_dosagem);
        $this->resultado->bindParam(':tipo',$dados->tipo);
        $this->resultado->bindParam(':indicacao',$dados->indicacao);
        $this->resultado->bindParam(':contraindicacao',$dados->contraindicacao);
        $this->resultado->bindParam(':dosagem',$dados->dosagem);

        $this->resultado->execute();
    }

    public function listarDados() {

        $this->sql = "SELECT * FROM $this->tabela";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function editarDados($dados) {

        $this->sql = "UPDATE $this->tabela SET RMD_NOME = :nome, RMD_VIA_DOSAGEM = :via_dosagem, RMD_TIPO = :tipo, RMD_INDICACAO = :indicacao, RMD_CONTRAINDICACAO = :contraindicacao, RMD_DOSAGEM = :dosagem WHERE RMD_ID = :id";
        
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':nome',$dados->nome);
        $this->resultado->bindParam(':via_dosagem',$dados->via_dosagem);
        $this->resultado->bindParam(':tipo',$dados->tipo);
        $this->resultado->bindParam(':indicacao',$dados->indicacao);
        $this->resultado->bindParam(':contraindicacao',$dados->contraindicacao);
        $this->resultado->bindParam(':dosagem',$dados->dosagem);
        $this->resultado->bindParam(':id',$dados->id);

        $this->resultado->execute();
    }

    public function excluirDados($dados) {

        $this->sql = "DELETE FROM $this->tabela WHERE RMD_ID = :id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id',$dados->id);

        $this->resultado->execute();
    }

    public function obterPorId($dados) {

        $this->sql = "SELECT * FROM $this->tabela WHERE RMD_ID = :id";

        $this->resultado = $this->conexao->prepare( $this->sql );
        $this->resultado->bindValue( ':id', $dados->id );
        $this->resultado->execute();

        return $this->resultado->fetch();
    }
}
?>=======
<?php

require_once __DIR__ . "/../config/Conexao.php";

class RemediosDAO {

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct() {
        
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "remedios";
    }

    public function cadastrar($dados) {
        
        $this->sql = "INSERT INTO $this->tabela (RMD_NOME, RMD_VIA_DOSAGEM, FK_FORMAS_FARMACEUTICAS_FRM_ID, RMD_INDICACAO, RMD_CONTRAINDICACAO, RMD_DOSAGEM) VALUES (:nome, :via_dosagem, :forma_farmaceutica, :indicacao, :contraindicacao, :dosagem)";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':nome',$dados->nome);
        $this->resultado->bindParam(':via_dosagem',$dados->via_dosagem);
        $this->resultado->bindParam(':forma_farmaceutica',$dados->forma_farmaceutica);
        $this->resultado->bindParam(':indicacao',$dados->indicacao);
        $this->resultado->bindParam(':contraindicacao',$dados->contraindicacao);
        $this->resultado->bindParam(':dosagem',$dados->dosagem);

        $this->resultado->execute();

        return $this->conexao->lastInsertId();
    }

    public function listarDados() {

        $this->sql = "SELECT 
            r.RMD_ID, 
            r.RMD_NOME, 
            r.RMD_VIA_DOSAGEM, 
            r.RMD_INDICACAO, 
            r.RMD_CONTRAINDICACAO, 
            r.RMD_DOSAGEM,
            ff.FRM_ID,
            ff.FRM_DESCRICAO
        FROM 
            $this->tabela r, 
            formas_farmaceuticas ff
        WHERE
            r.FK_FORMAS_FARMACEUTICAS_FRM_ID = ff.FRM_ID";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function editar($dados) {

        $this->sql = "UPDATE $this->tabela SET RMD_NOME = :nome, RMD_VIA_DOSAGEM = :via_dosagem, FK_FORMAS_FARMACEUTICAS_FRM_ID	 = :forma_farmaceutica, RMD_INDICACAO = :indicacao, RMD_CONTRAINDICACAO = :contraindicacao, RMD_DOSAGEM = :dosagem WHERE RMD_ID = :id";
        
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':nome',$dados->nome);
        $this->resultado->bindParam(':via_dosagem',$dados->via_dosagem);
        $this->resultado->bindParam(':forma_farmaceutica',$dados->forma_farmaceutica);
        $this->resultado->bindParam(':indicacao',$dados->indicacao);
        $this->resultado->bindParam(':contraindicacao',$dados->contraindicacao);
        $this->resultado->bindParam(':dosagem',$dados->dosagem);
        $this->resultado->bindParam(':id',$dados->id);

        $this->resultado->execute();
    }

    public function excluir($dados) {

        $this->sql = "DELETE FROM $this->tabela WHERE RMD_ID = :id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id',$dados->id);

        $this->resultado->execute();
    }

    public function obterPorId($dados) {

        $this->sql = "SELECT 
            r.RMD_ID, 
            r.RMD_NOME, 
            r.RMD_VIA_DOSAGEM, 
            r.RMD_INDICACAO, 
            r.RMD_CONTRAINDICACAO, 
            r.RMD_DOSAGEM,
            ff.FRM_ID,
            ff.FRM_DESCRICAO
        FROM 
            $this->tabela r, 
            formas_farmaceuticas ff
        WHERE
            r.FK_FORMAS_FARMACEUTICAS_FRM_ID = ff.FRM_ID AND
            r.RMD_ID = :id";

        $this->resultado = $this->conexao->prepare( $this->sql );
        $this->resultado->bindValue( ':id', $dados->id );
        $this->resultado->execute();

        return $this->resultado->fetch();
    }
}
?>>>>>>>> .r452
