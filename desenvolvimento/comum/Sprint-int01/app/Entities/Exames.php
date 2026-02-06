<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Exames extends Entity{
        protected $attributes = [
            'EXM_ID' => null,
            'EXM_NOME' => null,
            'EXM_ANEXO_GUIA' => null,
            'EXM_OBS_SECRETARIO' => null,
            'EXM_AGENDAMENTO' => 'Não precisa de agendamento.',
            'EXM_AUTORIZADO' => null,
            'EXM_ANEXO_RESULTADO' => null,
            'EXM_OBS_PACIENTE' => null,
            'FK_PACIENTES_PAC_ID' => null,
            'FK_MEDICOS_MED_ID' => null,
        ];
    }

?>