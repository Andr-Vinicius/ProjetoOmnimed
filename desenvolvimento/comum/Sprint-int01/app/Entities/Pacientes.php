<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Pacientes extends Entity {

        protected $attributes = [

            'PAC_ID' => null,
            'PAC_EMAIL' => null,
            'PAC_STATUS' => null,
            'FK_USUARIO_COMUM_USC_ID' => null,
            'FK_PLANOS_PLN_ID' => null,
        ];

    }

?>