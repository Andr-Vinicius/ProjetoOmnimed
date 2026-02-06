<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Agendamentos extends Entity {

        protected $attributes = [

            'AGD_ID' => null,
            'AGD_STATUS' => null,
            'AGD_ENCAMINHAMENTOS' => null,
            'AGD_DATA' => null,
            'AGD_HORARIO' => null,
            'AGD_MEET_LINK' => null,
            'AGD_ENCAMINHAMENTO_PRESENCIAL' => null,
            'AGD_RETORNO' => null,
            'AGD_MOTIVO_ENCAMINHAMENTO' => null,
            'AGD_TRIAGEM_REALIZADA' => null,
            'FK_MEDICOS_MED_ID' => null,
            'FK_ESPECIALIDADES_MEDICAS_ESM_ID' => null,
            'FK_PACIENTES_PAC_ID' => null,  

        ];

    }

?>