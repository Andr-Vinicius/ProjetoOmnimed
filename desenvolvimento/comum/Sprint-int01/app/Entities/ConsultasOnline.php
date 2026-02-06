<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class ConsultasOnline extends Entity {

        // Define os atributos desta entidade. Nomes igual ao do banco
        protected $attributes = [

            'CNS_ID' => null,
            'CNS_DATA' => null,
            'CNS_ANOTACOES' => null,
            'CNS_SINTOMAS_IDENTIFICADOS' => null,
            'CNS_DIAGNOSTICO' => null,
            //'CNS_POSSUI_PRESCRICAO' => null,
            'FK_AGENDAMENTOS_AGD_ID' => null,

        ];

    }

?>