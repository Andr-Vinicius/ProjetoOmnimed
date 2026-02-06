<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Administrativo extends Entity{
        protected $attributes = [
            'ADM_ID' => null,
            'ADM_FUNCAO' => null,
            'ADM_DATA_DEMISSAO' => null,
            'ADM_DATA_ADMISSAO' => null,
            'ADM_CLINICA' => null,
            'ADM_SALARIO' => null,
            'ADM_CRM' => null,
            'ADM_TELEFONE_CELULAR' => null,
            'FK_FUNCIONARIOS_FUN_ID' => null,
            'FK_FUNCIONARIOS_FK_USUARIO_COMUM_USC_ID' => null,
        ];
    }

?>