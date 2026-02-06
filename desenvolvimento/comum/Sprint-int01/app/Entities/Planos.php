<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Planos extends Entity
{

    protected $attributes = [
        'PLN_ID' => null,
        'PLN_INSTITUICAO' => null,
        'PLN_NOME' => null,
        'PLN_PRECO' => null,
    ];
}
