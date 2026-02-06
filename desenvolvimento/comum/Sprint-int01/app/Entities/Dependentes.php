<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Dependentes extends Entity{
        protected $attributes = [
            'DEP_ID' => null,
            'DEP_NV_PARENTESCO' => null,
            //'DEP_NOME' => null,
            //'DEP_DATA_NASCIMENTO' => null,
            'FK_PACIENTES_PAC_ID' => null,
            //'FK_PACIENTES_FK_USUARIO_COMUM_USC_ID' => null,
            'FK_RESPONSAVEIS_RES_ID' => null,
            //'FK_RESPONSAVEIS_FK_PACIENTES_PAC_ID' => null,
            //'FK_RESPONSAVEIS_FK_PACIENTES_FK_USUARIO_COMUM_USC_ID' => null,
        ];
    }

?>