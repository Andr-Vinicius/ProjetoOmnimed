<?php 

#require_once '../config/Conexao.php';
require_once __DIR__ .'/../config/Conexao.php';

class ConsultaDAO{

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct(){
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "consultas_online";
    }

    public function cadastrar($dados){
        
        $this->sql = "insert into $this->tabela (CNS_DATA,CNS_ANOTACOES, CNS_SINTOMAS_IDENTIFICADOS, CNS_DIAGNOSTICO, FK_AGENDAMENTOS_AGD_ID, FK_MEDICOS_MED_ID, FK_PACIENTES_PAC_ID) values (:data,:anotacao, :sintomas, :diagnostico, :fkagendamento,:fkmedicosmedid, :fkpacientepacid)";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':data',$dados->data);
        $this->resultado->bindParam(':anotacao', $dados->anotacoes);
        $this->resultado->bindParam(':sintomas',$dados->sintomas);
        $this->resultado->bindParam(':diagnostico', $dados->diagnostico);
        $this->resultado->bindParam(':fkagendamento',$dados->fkAgendamento);
        $this->resultado->bindParam(':fkmedicosmedid',$dados->fkmedicosmedid);
        $this->resultado->bindParam(':fkpacientepacid',$dados->fkpacientepacid);
        
        $this->resultado->execute();

    }

    public function listarConsultasUltimos30Dias($idUsuario){
        
        $this->sql = "select * FROM $this->tabela WHERE (extract(day FROM CNS_DATA) BETWEEN (extract(day from now()) - 30) and extract(day from now())) and FK_PACIENTES_PAC_ID = $idUsuario;";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
}

?>