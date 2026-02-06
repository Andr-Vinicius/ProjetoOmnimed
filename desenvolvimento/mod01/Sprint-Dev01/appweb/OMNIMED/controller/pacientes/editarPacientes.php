<?php

    require_once __DIR__ . '/../../model/Paciente.php';
    require_once __DIR__ . '/../../model/Responsavel.php';



    $pac_id = $_REQUEST['id'];
    $pac_email = $_REQUEST['id'];
    $res_quais_doencas_cronicas = $_REQUEST['id'];
    $res_doencas_cronicas = $_REQUEST['id'];
    $res_trat_medico = $_REQUEST['id'];
    $res_qual_medicacao = $_REQUEST['id'];
    $res_tel_celular1 = $_REQUEST['id'];
    $res_tel_celular2 = $_REQUEST['id'];
    $res_tem_filhos = $_REQUEST['id'];
    $res_utiliza_medicacao = $_REQUEST['id'];
    $res_quais_trat_med = $_REQUEST['id'];
    $res_quais_alergias = $_REQUEST['id'];
    $res_qtd_filhos = $_REQUEST['id'];
    $res_tem_alergia_medica = $_REQUEST['id']; 

      //USUARIO_COMUM
      $res_logradouro = $_REQUEST[ 'responsavel_logradouro' ];
      $res_numero = $_REQUEST[ 'responsavel_numero' ];
      $res_bairro = $_REQUEST[ 'responsavel_bairro' ];
      $res_cidade = $_REQUEST[ 'responsavel_cidade' ];
      $res_estado = $_REQUEST[ 'responsavel_estado' ];

try{
    $paciente = new Pacientes();

    $paciente->pac_id = $pac_id;
    $paciente->pac_email = $pac_email;
    $paciente->$res_quais_doencas_cronicas = $res_quais_doencas_cronicas;
    $paciente->$res_doencas_cronicas = $res_doencas_cronicas;
    $paciente->$res_trat_medico = $res_trat_medico;
    $paciente->$res_qual_medicacao = $res_qual_medicacao;
    $paciente->$res_tel_celular1 = $res_tel_celular1;
    $paciente->$res_tel_celular2 = $res_tel_celular2;
    $paciente->$res_tem_filhos = $res_tem_filhos;
    $paciente->$res_utiliza_medicacao = $res_utiliza_medicacao;
    $paciente->$res_quais_trat_med = $res_quais_trat_med;
    $paciente->$res_quais_alergias = $res_quais_alergias;
    $paciente->$res_qtd_filhos = $res_qtd_filhos;
    $paciente->$res_tem_alergia_medica = $res_tem_alergia_medica;



    $usuario->usuario_id = $paciente_fk_usc['fk_usuario_comum_id'];
    $usuario->usc_logradouro = $res_logradouro;
    $usuario->usc_numero = $res_numero;
    $usuario->usc_bairro = $res_bairro;
    $usuario->usc_cidade = $res_cidade;
    $usuario->usc_estado = $res_estado;


    $editarClinica = new ResponsavelDAO();
    $editarClinica->editarResponsavel($responsavel);


    header("location:../../view/mod01/listagemClinicas.php");
}catch(\Throwable $th) {
    echo 'Algo deu errado';
}
   



?>
