<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Prescricoes extends Entity {

        protected $attributes = [

            'PRC_ID' => null,
            'PRC_DURACAO_TRATAMENTO' => null,
            'PRC_OBSERVACOES' => null,
            'PRC_ASSINATURA_MEDICO' =>null,
            'PRC_DATA_EMISSAO' => null,
            'FK_CONSULTAS_ONLINE_CNS_ID' => null,
            'FK_MEDICOS_MED_ID' => null

        ];

    }

?>