<?php 

  require_once __DIR__.'/../DAO/AgendamentoDAO.php';

  //$idAgendamento = $_REQUEST['trg_agendamentos_agd_id'];

  $dao = new AgendamentoDAO();
  $dao->editarCampoTriagemRealizadaAgendamento(5);

  header("location:../view/mod02/view_agendamentos.php");
?>