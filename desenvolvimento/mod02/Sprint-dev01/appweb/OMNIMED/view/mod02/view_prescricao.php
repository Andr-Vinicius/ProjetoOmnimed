<?php

  require_once __DIR__.'/../../DAO/PrescricaoDAO.php';
  require_once __DIR__.'/../../DAO/MedicoDAO.php';
  require_once __DIR__.'/../../DAO/PacienteDAO.php';
  require_once __DIR__.'/../../DAO/RemedioPrescricaoDAO.php';
  require_once __DIR__.'/../../DAO/RemedioDAO.php';
  require_once __DIR__.'/../../assets/vendor/tcpdf/tcpdf.php';

  // Configurações do TCPDF
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetHeaderData('logoOmnimed.jpg', 15, 'OMNIMED', 'Rua Maria da Glória 35, Centro');
  
  $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
  $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
  $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
  // Fim das configurações

  $idPrescricao = 79;
  $idMedico = 1;
  $idPaciente = 1;

  $daoPr = new PrescricaoDAO();
  $daoM = new MedicoDAO();
  $daoPa = new PacienteDAO();
  $daoR = new RemedioDAO();
  $daoRP = new RemedioPrescricaoDAO();
  $prescricao = $daoPr->obterPorId($idPrescricao);
  $medico = $daoM->obterPorId($idMedico);
  $paciente = $daoPa->obterPorId($idPaciente);
  $medicamentos = $daoRP->listarRemedioPrescricao($idPrescricao);

  $pdf->AddPage();
  $html = '<p>Médico:</p>';
  $html .= '<p>Dr.&nbsp;'.$medico['MED_NOME'].'</p>';
  $html .= '<p>Francisco Quintino, 43</p>';
  $html .= '<p>Jd. Onze</p>';
  $html .= '<p>(19) 91234-5678</p>';
  $html .= '<p>CRM: 11112222-8/BR</p>';
  $html .= '<p>Paciente:</p>';
  $html .= '<p>'.$paciente['PAC_NOME_COMPLETO'].'</p>';
  $html .= '<p>Santa Maria, 23</p>';
  $html .= '<p>Centro</p>';
  $html .= '<p>(19) 98765-4321</p>';
  $html .= '<p>Medicamentos</p>';
  foreach($medicamentos as $medicamento){
    $rmd = $daoR->obterPorId($medicamento['FK_REMEDIOS_RMD_ID']);
    $html .= '<p>'.$rmd['RMD_NOME'].'&nbsp;_______________14 comprimidos</p>';
  }
  $html .= '<p>'.$prescricao['PRC_DATA_EMISSAO'].'</p>';
  $html .= '<p>'.$prescricao['PRC_OBSERVACOES'].'</p>';
  $html .= '<p>'.$prescricao['PRC_DURACAO_TRATAMENTO'].'</p>';
  $pdf->Image('../../assets/mod_01/assinaturas_medicos/assinatura_exemplo.jpg', 76, 240, 60);
  $pdf->writeHTML($html);
  $pdf->Output('example_006.pdf');
?>