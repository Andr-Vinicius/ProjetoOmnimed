<?php

  require_once __DIR__."/../model/PrescricaoModel.php";
  require_once __DIR__."/../DAO/PrescricaoDAO.php";

  $observacoes = $_POST['observacoes'];
  $duracao_tratamento = $_POST['duracao_tratamento'];
  $consultas_online_cns_id = $_POST['consultas_online_cns_id'];
  $medicos_med_id = $_POST['medicos_med_id'];
  $pacientes_pac_id = $_POST['pacientes_pac_id'];
  
  if($_FILES['assinatura_medico']){
    
    $pasta = "../assets/mod01/assinaturas_medicos/";
    // id do medico concatenado ao nome
    $idAssinatura = "drauzio01";
    $nomeArquivo = $_FILES['assinatura_medico']['name'];
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
    $tmpName = $_FILES['assinatura_medico']['tmp_name'];
    $nomenovo =$idAssinatura .".". $extensao;
    $dir = $pasta . $nomenovo;
    if($extensao == 'jpg' || $extensao == 'jpeg' || $extensao == 'png'){
      $upload = move_uploaded_file($tmpName, $dir);
    }
}

  if ($observacoes == null) {
      
    echo "O campo \"Observações\" é obrigatório.";

  } elseif ($duracao_tratamento == null) {
      
    echo "O campo \"Duração do Tratamento\" é obrigatório.";
  
  } else {

    $prescricao = new Prescricao();
    $prescricao->__set('prc_data_emissao', date("Y-m-d"));
    $prescricao->__set('prc_observacoes', $observacoes);
    $prescricao->__set('prc_duracao_tratamento', $duracao_tratamento);
    $prescricao->__set('prc_assinatura_medico', $nomenovo);
    $prescricao->__set('prc_consultas_online_cns_id', $consultas_online_cns_id);
    $prescricao->__set('prc_medicos_med_id', $medicos_med_id);
    $prescricao->__set('prc_pacientes_pac_id', $pacientes_pac_id);

    
    $dao = new PrescricaoDAO();
    $dao->cadastrar($prescricao);

    header("location:../index.php");
  
  }

?>