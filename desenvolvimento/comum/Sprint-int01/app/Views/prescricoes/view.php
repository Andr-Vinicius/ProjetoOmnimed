<?php
  
  use App\Models\PrescricoesModel;
  use App\Models\MedicosModel;
  use App\Models\RemediosPrescricoesModel;

  require_once APPPATH.'/Libraries/tcpdf/tcpdf.php';
  
  $prescricaoModel = new PrescricoesModel();
  $prescricao = $prescricaoModel->obterDadosPrescricoes($id);

  $medicosModel = new MedicosModel();
  $medico= $medicosModel->obterMedico($prescricao[0]->FK_MEDICOS_MED_ID);
  
  $remediosPrescricoesModel = new RemediosPrescricoesModel();
  $remedios= $remediosPrescricoesModel->obterRemediosDaPrc($prescricao[0]->PRC_ID);

  // Configurações do TCPDF
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetHeaderData('/Assets/images/common/logo_icon.jpg', 15, 'OMNIMED', 'Rua Maria da Glória 35, Centro');
  
  $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
  $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
  $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
  // Fim das configurações

  $pdf->AddPage();
  
  $html = '<p>Médico:</p>';
  $html .= '<p>Dr(a).&nbsp;'.$medico[0]->USC_NOME.'</p>';
  $html .= '<p>Paciente: '.$prescricao[0]->USC_NOME.'</p>';
  $html .= '<p>'.$prescricao[0]->USC_LOGRADOURO . ' ' . $prescricao[0]->USC_NUMERO.'</p>';
  $html .= '<p>Bairro: '.$prescricao[0]->USC_BAIRRO.'</p>';
  $html .= '<p>Cidade: '.$prescricao[0]->USC_CIDADE.'</p>';
  
  /*
  foreach($medicamentos as $medicamento){
    $rmd = $daoR->obterPorId($medicamento->FK_REMEDIOS_RMD_ID);
    $html .= '<p>'.$rmd->RMD_NOME.'&nbsp;_______________14 comprimidos</p>';
  }
  */
  
  $html .= '<p>'.$prescricao[0]->PRC_DATA_EMISSAO.'</p>';
  $html .= '<p>'.$prescricao[0]->PRC_OBSERVACOES.'</p>';
  $html .= '<p>'.$prescricao[0]->PRC_DURACAO_TRATAMENTO.'</p>';
  forEach($remedios as $key => $remedio) {
    $html .= '<p>'.$remedio->RMD_NOME.':_____'.$remedio->RMP_ESQUEMA_POSOLOGICO.'</p>';
  };

  $assinatura = $prescricao[0]->PRC_ASSINATURA_MEDICO;
  $html .= "<img style=\"width: 300px; height: 300px;\" src=\"/Assets/images/mod02/assinaturas/".$assinatura.".jpg\" class=\"img-fluid\">";
  $pdf->writeHTML($html);
  
  $pdf->Output('example_006.pdf');
  exit();
