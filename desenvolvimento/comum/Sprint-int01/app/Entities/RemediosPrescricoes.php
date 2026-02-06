<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class RemediosPrescricoes extends Entity
{

    protected $attributes = [
        'RMP_ID' => null,
        'RMP_ESQUEMA_POSOLOGICO' => null,
        'FK_PRESCRICOES_PRC_ID' => null,
        'FK_REMEDIOS_RMD_ID' => null,
    ];
}
