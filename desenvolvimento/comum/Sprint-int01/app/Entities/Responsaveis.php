<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Responsaveis extends Entity{
        protected $attributes = [
            'RES_TEL_CELULAR1' => null,
            'RES_ID' => null,
            'FK_PACIENTES_PAC_ID' => null,
        ];
    }

?>