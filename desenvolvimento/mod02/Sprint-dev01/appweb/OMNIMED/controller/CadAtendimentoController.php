<?php

    require_once __DIR__."/../model/ConsultaModel.php";
    require_once __DIR__."/../DAO/ConsultaDAO.php";

    $data = trim($_REQUEST['data']);
    $anotacoes = trim($_REQUEST['anotacoes']);
    $sintomas = trim($_REQUEST['sintomas']);
    $diagnostico = trim($_REQUEST['diagnostico']);
    $fkAgendamento = trim($_REQUEST['fkAgendamento']);
    $fkmedicosmedid = trim($_REQUEST['fkmedicosmedid']);
    $fkpacientepacid = trim($_REQUEST['fkpacientepacid']);

    if($data==""){
        echo "Por favor preencha a data do agendamento";
       }
    elseif($anotacoes==""){
        echo "Por favor preencha as anotação";
    }elseif ($sintomas=="") {
        echo "Por favor preencha os sintomas";
    }
    elseif ($diagnostico=="") {
        echo "Por favor preencha o diagnostico";
    }
    else{
        try {

            $consulta = new Consulta();
            $consulta->data = $data;
            $consulta->anotacoes=$anotacoes;
            $consulta->sintomas=$sintomas;
            $consulta->diagnostico=$diagnostico;
            $consulta->fkAgendamento=$fkAgendamento;
            $consulta->fkmedicosmedid=$fkmedicosmedid;
            $consulta->fkpacientepacid=$fkpacientepacid;

            
            $dao = new ConsultaDAO();
            $dao->cadastrar($consulta);
            
            // NECESSÁRIO!! É a resposta para o validator.js de que tudo correu bem
            echo "OK";
    } catch (\Throwable $th) {
        echo $th; // TODO Resolver problema de Unique depois
    }

    }
    

   # header ("location:../view/mod02/create_atendimentos.php");

?>