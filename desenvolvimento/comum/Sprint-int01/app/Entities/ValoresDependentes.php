<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class ValoresDependentes extends Entity
{

    protected $attributes = [
        'VPD_ID' => null,
        'VPD_IDADE_MAXIMA' => null,
        'VPD_IDADE_MINIMA' => null,
        'VPD_VALOR' => null,
        'FK_PLANOS_PLN_ID' => null,
    ];
}
