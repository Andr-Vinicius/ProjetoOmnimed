<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Funcionarios extends Entity {

        protected $attributes = [

            'FUN_ID' => null,
            'FUN_PRONTUARIO' => null,
            'FUN_CATEGORIA' => null,
            'FK_USUARIO_COMUM_USC_ID' => null,
        ];

    }

?>