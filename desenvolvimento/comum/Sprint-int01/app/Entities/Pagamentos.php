<?php

    namespace App\Entities;

    use CodeIgniter\Entity\Entity;

    class Pagamentos extends Entity {

        protected $attributes = [

            'PGD_ID' => null,
            'PGD_VENCIMENTO' => null,
            'PGD_DATA_PAGAMENTO' => null,
            'PGD_VALOR_TOTAL' => null,
            'PGD_QUANTIDADE_DEPENDENTES' => null,
            'PGD_VALOR_PLANO' => null,
            'FK_PACIENTES_PAC_ID' => null,
        ];

    }

?>