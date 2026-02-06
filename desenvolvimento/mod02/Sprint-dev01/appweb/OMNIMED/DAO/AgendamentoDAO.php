<?php

require_once __DIR__.'/../config/Conexao.php';

class AgendamentoDAO{

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;

    public function __construct(){
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "agendamentos";
    }

    public function cadastrar($dados){
        $this->sql = "insert into $this->tabela (
            agd_status, 
            agd_encaminhamentos, 
            agd_retorno, 
            agd_data, 
            agd_horario, 
            agd_meet_link, 
            agd_triagem_realizada,
            fk_pacientes_pac_id, 
            fk_tipos_especialidades_medicas_tem_id, 
            fk_medicos_med_id ) 
        values (
            :status, 
            :encaminhamentos, 
            :retorno, 
            :agdData, 
            :agdHorario, 
            :linkMeet , 
            :triagemRealizada, 
            :pacientesPacId, 
            :tiposEspecialidadesMedicasTemId, 
            :medicosMedId)";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':status', $dados->agd_status); //exemplo get-set automatico usando function
        $this->resultado->bindParam(':encaminhamentos', $dados->agd_encaminhamentos);
        $this->resultado->bindParam(':retorno', $dados->agd_retorno);
        $this->resultado->bindParam(':agdData', $dados->agd_data);
        $this->resultado->bindParam(':agdHorario', $dados->agd_horario);
        $this->resultado->bindParam(':linkMeet', $dados->agd_meet_link);
        $this->resultado->bindParam(':triagemRealizada', $dados->agd_triagem_realizada);
        $this->resultado->bindParam(':pacientesPacId', $dados->agd_pacientes_pac_id);
        $this->resultado->bindParam(':tiposEspecialidadesMedicasTemId', $dados->agd_tipos_especialidades_medicas_tem_id);
        $this->resultado->bindParam(':medicosMedId', $dados->agd_medicos_med_id);
        
        $this->resultado->execute();

    }

    public function atualizar($dados){
        $this->sql = "UPDATE $this->tabela
            SET
                agd_status = :status, 
                agd_encaminhamentos = :encaminhamentos, 
                agd_retorno = :retorno, 
                agd_data = :agdData, 
                agd_horario = :agdHorario, 
                agd_meet_link = :linkMeet, 
                agd_triagem_realizada = :triagemRealizada,
                fk_pacientes_pac_id = :pacientesPacId, 
                fk_tipos_especialidades_medicas_tem_id = :tiposEspecialidadesMedicasTemId, 
                fk_medicos_med_id = :medicosMedId 
            WHERE AGD_ID = ".$dados->agd_id.";";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':status', $dados->agd_status); //exemplo get-set automatico usando function
        $this->resultado->bindParam(':encaminhamentos', $dados->agd_encaminhamentos);
        $this->resultado->bindParam(':retorno', $dados->agd_retorno);
        $this->resultado->bindParam(':agdData', $dados->agd_data);
        $this->resultado->bindParam(':agdHorario', $dados->agd_horario);
        $this->resultado->bindParam(':linkMeet', $dados->agd_meet_link);
        $this->resultado->bindParam(':triagemRealizada', $dados->agd_triagem_realizada);
        $this->resultado->bindParam(':pacientesPacId', $dados->agd_pacientes_pac_id);
        $this->resultado->bindParam(':tiposEspecialidadesMedicasTemId', $dados->agd_tipos_especialidades_medicas_tem_id);
        $this->resultado->bindParam(':medicosMedId', $dados->agd_medicos_med_id);
        
        $this->resultado->execute();

    }

    public function listarAgendamentos(){
        $this->sql = "SELECT * FROM $this->tabela";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function listarAgendamentosSolicitados(){
        $this->sql = 
                    "SELECT AGD.AGD_ID, AGD.AGD_STATUS, PAC.PAC_NOME_COMPLETO 
                    FROM
                        AGENDAMENTOS AS AGD
                    JOIN
                        PACIENTES AS PAC ON (AGD.FK_PACIENTES_PAC_ID = PAC.PAC_ID)
                    WHERE
                        AGD.AGD_STATUS = 1";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function listarAgendamentosConfirmados(){
        $this->sql = 
                    "SELECT AGD.AGD_ID, AGD.AGD_STATUS, PAC.PAC_NOME_COMPLETO 
                    FROM
                        AGENDAMENTOS AS AGD
                    JOIN
                        PACIENTES AS PAC ON (AGD.FK_PACIENTES_PAC_ID = PAC.PAC_ID)
                    WHERE
                        AGD.AGD_STATUS = 2";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function listarAgendamentosCancelados(){
        $this->sql = 
                    "SELECT AGD.AGD_ID, AGD.AGD_STATUS, PAC.PAC_NOME_COMPLETO 
                    FROM
                        AGENDAMENTOS AS AGD
                    JOIN
                        PACIENTES AS PAC ON (AGD.FK_PACIENTES_PAC_ID = PAC.PAC_ID)
                    WHERE
                        AGD.AGD_STATUS = 3";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function listarAtendimentosDiaMedico($data, $nome) {
        $medico = 1;
        $sql = "SELECT AGD.AGD_ID, AGD.AGD_STATUS, AGD.AGD_ENCAMINHAMENTOS, AGD.AGD_DATA, AGD.AGD_HORARIO, AGD.AGD_MEET_LINK, AGD.AGD_TRIAGEM_REALIZADA, AGD.AGD_RETORNO,
                    PAC.PAC_EMAIL, USC.USC_NOME AS PAC_NOME, RES.RES_TEL_CELULAR1, RES.RES_TEL_CELULAR2, MEDUSC.USC_NOME AS MED_NOME
                    FROM AGENDAMENTOS AS AGD
                    JOIN pacientes AS PAC ON (AGD.FK_PACIENTES_PAC_ID = PAC.PAC_ID)
                    JOIN usuario_comum AS USC ON (PAC.FK_USUARIO_COMUM_USC_ID = USC.USC_ID)
                    JOIN responsaveis AS RES ON (PAC.PAC_ID = RES.RES_ID)
                    JOIN medicos AS MED ON (MED.MED_ID = AGD.FK_MEDICOS_MED_ID)
                    JOIN usuario_comum AS MEDUSC ON (MEDUSC.USC_ID = MED.MED_ID)
                    WHERE AGD.AGD_STATUS IN (2)
                    AND AGD.FK_MEDICOS_MED_ID = " . $medico . "";

        if ($data == null || empty($data)) {
            $sql = $sql . " AND DATE_FORMAT(AGD.AGD_DATA, '%Y-%m-%d') = CURDATE()";
        } else if ($data != null || !empty($data)) {
            $sql = $sql . " AND AGD.AGD_DATA = '$data'";
        }
        if ($nome != null || !empty($nome)) {
            $sql = $sql . " AND USC.USC_NOME LIKE '%" . $nome . "%'";
        }
        $sql = $sql . " ORDER BY AGD.AGD_HORARIO";

        $this->sql = $sql;

        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function listarAtendimentosDiaSecretario($data, $nome, $nome_med) {

        $sql = "SELECT AGD.AGD_ID, AGD.AGD_STATUS, AGD.AGD_ENCAMINHAMENTOS, AGD.AGD_DATA, AGD.AGD_HORARIO, AGD.AGD_MEET_LINK, AGD.AGD_TRIAGEM_REALIZADA, AGD.AGD_RETORNO,
                    PAC.PAC_EMAIL, USC.USC_NOME AS PAC_NOME, RES.RES_TEL_CELULAR1, RES.RES_TEL_CELULAR2, MEDUSC.USC_NOME AS MED_NOME
                    FROM AGENDAMENTOS AS AGD
                    JOIN pacientes AS PAC ON (AGD.FK_PACIENTES_PAC_ID = PAC.PAC_ID)
                    JOIN usuario_comum AS USC ON (PAC.FK_USUARIO_COMUM_USC_ID = USC.USC_ID)
                    JOIN responsaveis AS RES ON (PAC.PAC_ID = RES.RES_ID)
                    JOIN medicos AS MED ON (MED.MED_ID = AGD.FK_MEDICOS_MED_ID)
                    JOIN funcionarios  FUNC ON (FUNC.FUN_ID = MED.FK_FUNCIONARIOS_FUN_ID)
                    JOIN usuario_comum  AS MEDUSC ON (FUNC.FK_USUARIO_COMUM_USC_ID  = MEDUSC.USC_ID) 
                    WHERE AGD.AGD_STATUS IN (2)";

        if ($data == null || empty($data)) {
            $sql = $sql . " AND DATE_FORMAT(AGD.AGD_DATA, '%Y-%m-%d') = CURDATE()";
        } else if ($data != null || !empty($data)) {
            $sql = $sql . " AND AGD.AGD_DATA = '$data'";
        }
        if ($nome != null || !empty($nome)) {
            $sql = $sql . " AND USC.USC_NOME LIKE '%" . $nome . "%'";
        }
        if ($nome_med != null || !empty($nome_med)) {
            $sql = $sql . " AND MED_NOME LIKE '%" . $nome_med . "%'";
        }
        $sql = $sql . " ORDER BY AGD.AGD_HORARIO, MED_NOME";

        $this->sql = $sql;

        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function listarAgendamentoPorID($idAgendamento){
        $this->sql = "SELECT * FROM $this->tabela WHERE AGD_ID = ".$idAgendamento;

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetch();
    }

    public function listarAgendamentosDoUsuario($idUsuario){
        $this->sql = "select * from $this->tabela where fk_pacientes_pac_id = $idUsuario;";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();

        return $this->resultado->fetchAll();
    }

    public function editarCampoTriagemRealizadaAgendamento($idAgendamento){
        $this->sql = "update $this->tabela set agd_triagem_realizada = true 
        where agd_id = $idAgendamento;";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
    }

}