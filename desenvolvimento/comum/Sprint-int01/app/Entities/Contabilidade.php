<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Contabilidade extends Entity{
        protected $attributes = [
            'CON_ID' => null,
            'FK_FUNCIONARIOS_FUN_ID' => null,
            'FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID' => null,
        ];
    }

?>