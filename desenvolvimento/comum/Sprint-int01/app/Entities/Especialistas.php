<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Especialistas extends Entity {

        protected $attributes = [

            'FK_MEDICOS_MED_ID' => null,
            'FK_MEDICOS_FK_FUNCIONARIOS_FUN_ID' => null,
            'FK_MEDICOS_FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID' => null,
            'FK_ESPECIALIDADES_MEDICAS_ESM_ID' => null,
            'ESP_ID' => null,

        ];

    }

?>