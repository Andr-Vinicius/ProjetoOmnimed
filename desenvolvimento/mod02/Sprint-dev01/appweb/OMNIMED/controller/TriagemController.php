<?php

  require_once __DIR__."/../model/TriagemModel.php";
  require_once __DIR__."/../DAO/TriagemDAO.php";
    
  $sintomas = trim($_POST['sintomas']);
  $tabela_dor = trim($_POST['tabela_dor']);
  $pressao_sistolica = trim($_POST['pressao_sistolica']);
  $pressao_diastolica = trim($_POST['pressao_diastolica']);
  $temperatura = trim($_POST['temperatura']);
  $agendamentos_agd_id = trim($_POST['agendamentos_agd_id']);

  if($sintomas == "") {
    
    echo "O campo \"Sintomas\" é obrigatório.";
    
  } elseif ($tabela_dor == null) {
      
    echo "O campo \"Tabela de Dor\" é obrigatório.";

  } elseif ($pressao_sistolica != null && $pressao_diastolica == null) {
      
    echo "O campo \"Pressão Diastólica\" é obrigatório quando o campo \"Pressão Sistólica\" é preenchido.";

  } elseif ($pressao_diastolica != null && $pressao_sistolica == null) {
    
    echo "O campo \"Pressão Sistólica\" é obrigatório quando o campo \"Pressão Diastólica\" é preenchido.";
  
  } else {
    
    $triagem = new Triagem();
    $triagem->setTrgSintomas($sintomas);
    $triagem->setTrgTabelaDor($tabela_dor);
    $triagem->setTrgPressaoSistolica($pressao_sistolica);
    $triagem->setTrgPressaoDiastolica($pressao_diastolica);
    $triagem->setTrgTemperatura($temperatura);
    $triagem->setTrgAgendamentosAgdId($agendamentos_agd_id);

    $dao = new TriagemDAO();
    $dao->cadastrar($triagem);
    
    header("location:edit_agendamentos.php");
  }
  
?>