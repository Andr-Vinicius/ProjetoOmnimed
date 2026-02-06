<?php

class Agendamento{

    private $agd_id;
    private $agd_status;
    private $agd_encaminhamentos;
    private $agd_retorno;
    private $agd_data;
    private $agd_horario;
    private $agd_meet_link;
    private $agd_triagem_realizada;
    private $agd_pacientes_pac_id;
    private $agd_tipos_especialidades_medicas_tem_id;
    private $agd_medicos_med_id;

    function &__get($name){
        return $this->$name;
    }

    function __set($name, $valor){
        $this->$name = $valor;
    }

}

?>