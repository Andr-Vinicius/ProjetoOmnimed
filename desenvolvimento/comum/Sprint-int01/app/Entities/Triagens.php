<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Triagens extends Entity {

        protected $attributes = [

            'TRG_ID' => null,
            'TRG_SINTOMAS' => null,
            'TRG_TABELA_DOR' => null,
            'TRG_PRESSAO_SISTOLICA' =>null,
            'TRG_TEMPERATURA' => null,
            'TRG_PRESSAO_DIASTOLICA' => null,
            'TRG_DOENCAS_CRONICAS' => null,
            'TRG_QUAIS_DOENCAS_CRONICAS' => "",
            'TRG_TRATAMENTO_MEDICO' => null,
            'TRG_QUAIS_TRAT_MED' => "",
            'TRG_UTILIZA_MEDICACAO' =>null,
            'TRG_QUAL_MEDICACAO' =>"",
            'TRG_TEM_ALERGIA_MEDICA' => null,
            'TRG_QUAIS_ALERGIAS' =>"",
            'FK_AGENDAMENTOS_AGD_ID' => null,

        ];

    }

?>