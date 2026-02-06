<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class PlanosBeneficios extends Entity
{

    protected $attributes = [

        'FK_BENEFICIOS_BNF_ID' => null,
        'FK_PLANOS_PLN_ID' => null,
        'PBN_ID' => null,
        'PBN_VALOR_BENEFICIO' => null,
    ];
}
