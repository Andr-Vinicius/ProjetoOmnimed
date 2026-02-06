<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class PagamentosMedicos extends Entity {

        protected $attributes = [

            'PGM_ID' => null,
            'PGM_DATA_PAGAMENTO' => null,
            'PGM_SALARIO' => null,
            'PGM_VALOR_COMISSAO' => null,
            'PGM_VALOR_TOTAL' => null,
            'PGM_DATA_PAGAMENTO_REALIZADO' => null,
            'PGM_CONSULTAS_MES' => null,
            'FK_MEDICOS_MED_ID' => null,
        ];

    }

?>