<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Remedios extends Entity
{

    protected $attributes = [
        'RMD_ID' => null,
        'RMD_NOME' => null,
        'RMD_VIA_DOSAGEM' => null,
        'RMD_INDICACAO' => null,
        'RMD_CONTRAINDICACAO' => null,
        'RMD_DOSAGEM' => null,
        'FK_FORMAS_FARMACEUTICAS_FRM_ID' => null,
    ];
}
