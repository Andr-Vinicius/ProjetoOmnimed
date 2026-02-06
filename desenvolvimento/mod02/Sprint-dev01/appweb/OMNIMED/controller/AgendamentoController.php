<?php

require_once "../model/AgendamentosModel.php";
require_once "../DAO/AgendamentoDAO.php";

$acao = $_POST['acao'];

var_dump($acao);

if($acao == "cadastrarAgendamento"){
  $status = $_POST['status'];
  $encaminhamentos = $_POST['encaminhamentos'];
  $retorno = $_POST['retorno'];
  $dataconsulta = $_POST['dataconsulta'];
  $horario = null;
  $meetlink = null;
  $triagemrealizada = false;
  $pacienteid = $_POST['pacienteid'];
  $especialidadeid = $_POST['especialidadeid'];
  $medicoid = null;

  try {
    $agendamento = new Agendamento();
    $agendamento->agd_status = $status;
    $agendamento->agd_encaminhamentos = $encaminhamentos;
    $agendamento->agd_retorno = $retorno;
    $agendamento->agd_data = $dataconsulta;
    $agendamento->agd_horario = $horario;
    $agendamento->agd_meet_link = $meetlink;
    $agendamento->agd_triagem_realizada = $triagemrealizada;
    $agendamento->agd_pacientes_pac_id = $pacienteid;
    $agendamento->agd_tipos_especialidades_medicas_tem_id = $especialidadeid;
    $agendamento->agd_medicos_med_id = $medicoid;

    $dao = new AgendamentoDAO();
    $dao->cadastrar($agendamento);

    echo "OK";
  } catch (\Throwable $th) {
    echo 'Algo deu errado.'; // TODO Resolver problema de Unique depois
  }

} else if($acao == "confirmarAgendamento"){
  echo "teste";
  $id = $_POST['idAgendamento'];
  $status = $_POST['status'];
  $encaminhamentos = $_POST['encaminhamentos'];
  $retorno = $_POST['retorno'];
  $dataconsulta = $_POST['dataconsulta'];
  $horario = $_POST['horario'];
  $meetlink = $_POST['meetlink'];
  $triagemrealizada = false;
  $pacienteid = $_POST['pacienteid'];
  $especialidadeid = $_POST['especialidadeid'];
  $medicoid = $_POST['medicoid'];

  try {
    $agendamento = new Agendamento();
    $agendamento->agd_id = $id;
    $agendamento->agd_status = $status;
    $agendamento->agd_encaminhamentos = $encaminhamentos;
    $agendamento->agd_retorno = $retorno;
    $agendamento->agd_data = $dataconsulta;
    $agendamento->agd_horario = $horario;
    $agendamento->agd_meet_link = $meetlink;
    $agendamento->agd_triagem_realizada = $triagemrealizada;
    $agendamento->agd_pacientes_pac_id = $pacienteid;
    $agendamento->agd_tipos_especialidades_medicas_tem_id = $especialidadeid;
    $agendamento->agd_medicos_med_id = $medicoid;


    $dao = new AgendamentoDAO();
    $dao->atualizar($agendamento);

    echo "OK";
  } catch (\Throwable $th) {
    echo 'Algo deu errado.'; // TODO Resolver problema de Unique depois
  }
}
