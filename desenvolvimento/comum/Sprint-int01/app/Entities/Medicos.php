<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Medicos extends Entity{
        protected $attributes = [
            'MED_ID' => null,
            'FK_FUNCIONARIOS_FUN_ID' => null,
            'FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID' => null,
        ];
    }

?>